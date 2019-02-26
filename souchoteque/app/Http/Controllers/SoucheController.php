<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Array_;

class SoucheController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //////////////////////////////////////////////////////////////////////////////////
    //                                  Toolbox                                     //
    //////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////Dictionaire/////////////////////////////////////
    public $dbFormat = [[
        "brevet_soleau" => [
            "titre" => "string",
            "date" => "date",
            "scan" => "file",
            "numero" => "int",
            "inpi" => "file",
            "activite" => "activite"
        ],
        "capacite_production" => [
            "nom" => "string",
            "type" => "PHA/EPS/Autre",
            "fichier" => "file"
        ],
        "caracterisation" => [
            "type" => "PHA/EPS/Autre",
            "poids_moleculaire" => "float"
        ],
        "criblage" => [
            "nom" => "string",
            "condition" => "file",
            "rapport" => "file",
        ],
        "description" => [
            "texte" => "string",
            "fichier" => "file",
        ],
        "exclusivite" => [
            "id" => "int",
            "date_debut" => "date",
            "date_fin" => "date",
            "activite" => "activite",
            "partenaire" => "partenaire"
        ],
        "fichier caracterisation" => [
            "nom" => "string",
            "fichier" => "file",
            "type" => "PHA/EPS/Autre"
        ],
        "identification" =>
    ]];

    /////////////////////////////////////Date/////////////////////////////////////////
    function validateDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    public function dateDtoV($date){
        return date( "d/m/Y", date_create_from_format("Y-m-d", $date));
    }
    public function dateVtoD($date){
        if ($this->validateDate($date))
            return date( "Y-m-d", date_create_from_format("d/m/Y", $date));
        return view('souche_feedback', ['error' => true, 'message' => "Une des date que vous avez saisi n'est pas conforme"]);
    }

    /////////////////////////////////////Check////////////////////////////////////////
    public function SandNN($data){
        return (isset($data) && $data != 0);
    }

    ////////////////////////////////Gestion fichier///////////////////////////////////
    public function ajoutFile($chemin, $nom, $fichier) {
        $date = date("Y-m-d_H-i-s_");
        if (!$fichier->isValid()) {
            return view('souche_feedback', ['error' => true, 'message' => "Un des fichier que vous avez envoyé a rencontré une erreur"]);
        }
        else {
            Storage::putFileAs("public/".$chemin, $fichier, $date.$nom.".".$fichier->extension());
            return $chemin."/".$date.$nom.".".$fichier->extension();
        }
    }

    ///////////////////////////////////Activite///////////////////////////////////////
    public function getActivite(){
        $in = DB::table("activite")->select()->get();
        $out = array();
        foreach ($in as $value) $out[] = $value->nom;
        return $out;
    }
    public function activite($activite){
        if (!in_array($activite, $this->getActivite()))
            DB::table("activite")->insert($activite);
    }

    ///////////////////////////////////Partenaire/////////////////////////////////////
    public function getPartenaire(){
        $in = DB::table("partenaire")->select()->get();
        $out = array();
        foreach ($in as $value) $out[] = $value->nom;
        return $out;
    }
    public function partenaire($partenaire){
        if (!in_array($partenaire, $this->getPartenaire()))
            DB::table("partenaire")->insert($partenaire);
    }

    ///////////////////////////////////Select All/////////////////////////////////////
    public function getData($id){
        foreach (['souche',
                     'identification',
                     'pasteur',
                     'publication',
                     'brevet_soleau',
                     'photo_souche',
                     'exclusivite',
                     'caracterisation',
                     'objectivation',
                     'criblage',
                     'production',
                     'description',
                     'photo_souche',
                     'fichier_caracterisation',
                     ] as $table)
            $souche[$table] = DB::table($table)
                ->select()
                ->where('ref','=', $id)
                ->get();

        foreach (['EPS', 'PHA', 'Autre'] as $prod)
            $souche['capacité_'.$prod] = DB::table('capacite_production')
                ->select('nom', 'fichier')
                ->where('ref', '=', $id)
                ->where('type', '=', $prod)
                ->get();

        $souche['projet_souche'] = DB::table("projet")
            ->join("souche_projet", "projet.nom", "=", "souche_projet.projet")
            ->select()
            ->where("souche_projet.ref", "=", $id)->get();

        $souche['caracterisation_oses'] = DB::table('caracterisation_oses')
            ->join('oses', 'caracterisation_oses.oses', '=', 'oses.nom')
            ->select()->where("caracterisation_oses.ref" ,"=", $id)->get();

        $souche['projet'] = DB::table("projet")->select()->get();
        $souche['oses'] = DB::table("oses")->select()->get();

        $souche['activite'] = DB::table("activite")->select()->get();
        $souche['partenaire'] = DB::table("partenaire")->select()->get();

        return $souche;
    }

    //////////////////////////////////////////////////////////////////////////////////
    //                               visualisation                                  //
    //////////////////////////////////////////////////////////////////////////////////
    public function show($id){
        $souche = $this->getData($id);
        return view('souche_home', ['souche' => $souche]);
    }

    public function dump($id){
        var_dump($this->getData($id));
    }

    public function dd($id){
        dd($this->getData($id));
    }

    //////////////////////////////////////////////////////////////////////////////////
    //                                 creation                                     //
    //////////////////////////////////////////////////////////////////////////////////
    public function ajout(){
        $souches = DB::table('souche')->select('ref')->get();
        return view('souche_ajout', ['souches'=> $souches]);
    }

    public function ajoutPost(Request $request){

        $chemin = $request->post("ref")."/souche";

        //-----------------Ref---------------------
        $insert["ref"] = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }else{
            $insert["description"] = $this->ajoutFile($chemin, "description", $request->file("description"));
            if ($insert["description"] == null)
                return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }

        //------------------Stock------------------
        $insert["stock"] = $request->post("stock");

        if (request("isOGM")){

            $insert["annee_creation"] = $request->post("annee_creation");

            foreach (["texte_hcb", "validation_hcb", "schema_plasmique"] as $nom){
                if ($request->hasFile($nom)) {
                    $insert[$nom] = $this->ajoutFile($chemin, $nom, $request->file($nom));
                }
            }
        }else{

            $insert["origine"] = $request->post("origine");
            $insert["annee_collecte"] = $request->post("annee_collecte");

        }

        $insert = DB::table("souche")->insert($insert);

        if ($insert == true){
            return view('souche_feedback', ['error' => false, 'message' => 'Ajout de la souche réussi']);
        }else{
            return view('souche_feedback', ['error' => true, 'message' => 'Ajout de la souche raté']);
        }
    }

    //////////////////////////////////////////////////////////////////////////////////
    //                                mise a jour                                   //
    //////////////////////////////////////////////////////////////////////////////////

    public function update($id, Request $request){
        $souche = $this->getData($id);
        $posts = $request->all();
        $type_hcb = null;
        $data = [];
        //alors je sais pas comment ça marche mais ça transforme un "/bla/bla = bla" en [bla][bla] = bla
        //tant que ça marche ça me va
        foreach ($posts as $keys => $value) {
            $exploded = explode("/", $keys);
            $temp = &$data;
            foreach($exploded as $key) {
                $temp = &$temp[$key];
            }
            $temp = $value;
            unset($temp);
        }
        if ($this->SandNN($data["activite"])){

        }
        if ($this->SandNN($data["brevet_soleau"]) && $this->SandNN($data["brevet_soleau"]["titre"])){
            $db = DB::table("brevet_soleau");
            if (DB::table("brevet_soleau")->count()->where("titre", "=", $data["brevet_soleau"]["titre"]) == 1){
                $db->where("titre", "=", $data["brevet_soleau"]["titre"]);
                $update = [];
                if ($this->SandNN($data["brevet_soleau"]["date"]) && $this->validateDate($data["brevet_soleau"]["date"])){
                    $update["date"] = $this->dateVtoD($data["brevet_soleau"]["date"]);
                }
                foreach (["scan", "inpi"] as $nom)
                    if ($this->SandNN($data["brevet_soleau"][$nom])){
                        $update[$nom] = $this->ajoutFile($id."/brevet_soleau", $nom, $data["brevet_soleau"][$nom]);
                    }
            }

        }
        if ($this->SandNN($data["capacite_production"])){

        }
        if ($this->SandNN($data["caracterisation"])){

        }
        if ($this->SandNN($data["criblage"])){

        }
        if ($this->SandNN($data["description"])){

        }
        if ($this->SandNN($data["exclusivite"])){

        }
        if ($this->SandNN($data["oses"])){

        }
        if ($this->SandNN($data["fichier_caracterisation"])){

        }
        if ($this->SandNN($data["identification"])){

        }
        if ($this->SandNN($data["objectivation"])){

        }
        if ($this->SandNN($data["pasteur"])){

        }
        if ($this->SandNN($data["photo_souche"])){

        }
        if ($this->SandNN($data["production"])){

        }
        if ($this->SandNN($data["projet"])){

        }
        if ($this->SandNN($data["publication"])){

        }
        if ($this->SandNN($data["souche"])){
            $db = DB::table("souche")->where("ref", "=", $id);
            if ($this->SandNN($data["souche"]["origine"])){
                $db->update(["origine" => $data["souche"]["origine"]]);
            }
            if ($this->SandNN($data["souche"]["annee_collecte"]) && is_int($data["souche"]["annee_collecte"])){
                $db->update(["annee_collecte" => $data["souche"]["annee_collecte"]]);
            }
        }

        dd($data);
    }

    public function suppr($id){
        DB::table('souche')
            ->where('ref', "=", $id)
            ->update(['desactive' => 1]);
    }
}
