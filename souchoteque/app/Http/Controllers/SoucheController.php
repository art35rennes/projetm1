<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoucheController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //////////////////////////////////////////////////////////////////////////////////
    //                                  Toolbox                                     //
    //////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////Dictionaire/////////////////////////////////////
    public $dbFormat = [
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
            "type" => "type",
            "fichier" => "file"
        ],
        "caracterisation" => [
            "type" => "type",
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
        "identification" => [
            "type" => "string",
            "sequence" => "file",
            "arbre" => "file",
        ],
        "objectivation" => [
            "nom" => "string",
            "protocole" => "file",
            "resultat" => "file",
        ],
        "pasteur" => [
            "titre" => "string",
            "date_depot" => "date",
            "numero" => "int",
            "dossier_depot" => "file",
            "scan_validation" => "file",
            "photo_cryotube" => "file",
            "stock" => "int",
        ],
        "photo_souche" => [
            "fichier" => "file",
            "description" => "string"
        ],
        "production" => [
            "nom" => "string",
            "date" => "date",
            "lieu" => "string",
            "protocole" => "file",
            "rapport" => "file",
            "projet" => "projet"
        ],
        "projet" => [
            "nom" => "string",
            "date" => "date",
            "texte" => "file",
            "activite" => "activite",
            "partenaire" => "partenaire",
        ],
        "publication" => [
            "nom" => "string",
            "date" => "date",
            "fichier" => "file"
        ],
        "souche" => [
            "origine" => "string",
            "annee_collecte" => "int",
            "annee_creation" => "int",
            "description" => "file",
            "texte_hcb" => "file",
            "validation_hcb" => "file",
            "schema_plasmique" => "file"
        ],
        "accreditation" => [
            "id" => "int",
            "nom" => "string",
            "niveau" => "string",
            "souche" => "int",
        ]
    ];

    public $dbCle = [
        "brevet_soleau" => "titre",
        "capacite_production" => "nom",
        "caracterisation" => "type",
        "criblage" => "nom",
        "description" => "texte",
        "exclusivite" => "id",
        "oses" => "nom",
        "fichier_caracterisation" => "nom",
        "identification" => "type",
        "objectivation" => "nom",
        "pasteur" => "titre",
        "photo_souche" => "fichier",
        "production" => "nom",
        "projet" => "nom",
        "publication" => "nom",
        "accreditation" => "id",
    ];

    function feedback($error, $message){
        return view('souche/souche_feedback', ['error' => true, 'message' => "Une des date que vous avez saisi n'est pas conforme", 'date' => date("d/m/Y H:m:s")]);
    }

    /////////////////////////////////////Date/////////////////////////////////////////
    function validateDate($date)
    {
        $date = explode("-", $date);
        return checkdate($date[1], $date[2], $date[1]);
    }
    public function dateDtoV($date){
        return date( "d/m/Y", date_create_from_format("Y-m-d", $date));
    }
    public function dateVtoD($date){
        if ($this->validateDate($date))
            return date( "Y-m-d", date_create_from_format("d/m/Y", $date));
        return view('souche/souche_feedback', ['error' => true, 'message' => "Une des date que vous avez saisi n'est pas conforme"]);
    }

    ////////////////////////////////Gestion ajout/////////////////////////////////////
    public function ajoutFile($chemin, $nom, $fichier) {
        $date = date("Y-m-d_H-i-s_");
        if (!$fichier->isValid()) {
            return view('souche/souche_feedback', ['error' => true, 'message' => "Un des fichier que vous avez envoyé a rencontré une erreur"]);
        }
        else {
            Storage::putFileAs("public/".$chemin, $fichier, $date.$nom.".".$fichier->extension());
            return $chemin."/".$date.$nom.".".$fichier->extension();
        }
    }
    public function ajoutString($text){
        if (sizeof($text) < 255){
            return $text;
        }
        return view('souche/souche_feedback', ['error' => true, 'message' => "Un texte que vous avez saisi a une erreur"]);
    }
    public function ajoutDate($date){
        if ($this->validateDate($date)){
            return $date;
        }
        return view('souche/souche_feedback', ['error' => true, 'message' => "Une date que vous avez saisi a une erreur"]);

    }
    public function ajoutInt($nb){
        if (is_int($nb)){
            return $nb;
        }
        return view('souche/souche_feedback', ['error' => true, 'message' => "Une année ou un nombre que vous avez saisi a une erreur"]);
    }

    public function ajoutPartenaire($part){
        if (DB::table("partenaire")->where("nom", "=", $part)->count() == 1)
            return $part;
        DB::table(partenaire)->insert(['nom' => $part]);
        return $part;
    }

    public function ajoutActivite($act){
        if (DB::table("activite")->where("nom", "=", $act)->count() == 1)
            return $act;
        DB::table(partenaire)->insert(['nom' => $act]);
        return $act;
    }

    public function ajoutType($type){
        if (in_array($type, ['PHA', 'EPS', 'Autre'])){
            return $type;
        }
        return view('souche/souche_feedback', ['error' => true, 'message' => "Un type (PHA, EPS, Autre) que vous avez saisi a une erreur"]);

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
        return view('souche/souche_home', ['souche' => $this->getData($id)]);
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
        return view('souche/souche_ajout', ['souches'=> $souches]);
    }

    public function ajoutPost(Request $request){

        $chemin = $request->post("ref")."/souche";

        //-----------------Ref---------------------
        $insert["ref"] = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche/souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }else{
            $insert["description"] = $this->ajoutFile($chemin, "description", $request->file("description"));
            if ($insert["description"] == null)
                return view('souche/souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
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
            return view('souche/souche_feedback', ['error' => false, 'message' => 'Ajout de la souche réussi']);
        }else{
            return view('souche/souche_feedback', ['error' => true, 'message' => 'Ajout de la souche raté']);
        }
    }

    //////////////////////////////////////////////////////////////////////////////////
    //                                mise a jour                                   //
    //////////////////////////////////////////////////////////////////////////////////

    public function update($id, Request $request){
        $posts = $request->all();
        $type_hcb = null;
        $data = [];

        foreach ($posts as $keys => $value) {
            $exploded = explode("/", $keys);
            $temp = &$data;
            foreach($exploded as $key) {
                $temp = &$temp[$key];
            }
            $temp = $value;
            unset($temp);
        }


        foreach ($data as $table => $lines){
            switch ($table) {
                case "souche":
                    $db = DB::table("souche")->where("ref", "=", $id);
                    if (isset($data["souche"]["origine"])){
                        $db->update(["origine" => $data["souche"]["origine"]]);
                    }
                    if (isset($data["souche"]["annee_collecte"]) && is_int($data["souche"]["annee_collecte"])){
                        $db->update(["annee_collecte" => $data["souche"]["annee_collecte"]]);
                    }
                    if (isset($data["souche"]["annee_creation"]) && is_int($data["souche"]["annee_creation"])){
                        $db->update(["annee_creation" => $data["souche"]["annee_creation"]]);
                    }
                    if (isset($data["souche"]["description"]))
                        $db->update(["description" => $this->ajoutFile($id."/souche", "description", $data["souche"]["description"])]);

                    if (isset($data["souche"]["hcb"]["doc"]))
                        $db->update([$data["souche"]["hcb"]["type"] => $this->ajoutFile($id."/souche",
                            $data["souche"]["hcb"]["type"],
                            $data["souche"]["hcb"]["doc"])]);

                    break;
                case "description":
                    if (isset($data["description"]["texte"]) && isset($data["description"]["fichier"]))
                        DB::table("description")->insert([
                            "fichier" => $this->ajoutFile($id."/souche", "", $data["description"]["fichier"]),
                            "texte" => $data["description"]["texte"],
                            "ref" => $id
                        ]);
                    break;
                case "photo_souche":
                    if (isset($data["photo_souche"]["fichier"]) && isset($data["photo_souche"]["description"]))
                    DB::table("photo_souche")->insert([
                        "fichier" => $this->ajoutFile($id."/souche", "", $data["photo_souche"]["fichier"]),
                        "description" => $data["photo_souche"]["description"],
                        "ref" => $id
                    ]);
                    break;
                case "oses":

                    break;
                case "projet":

                    break;
                case "eps":

                    break;
                case "pha":

                    break;
                case "autre":

                    break;
                default :
                    if (isset($data[$table]) && sizeof($data[$table])>1)
                        foreach ($data[$table] as $rows) {
                            if ($rows != null && $rows != ""){
                                if (DB::table($table)
                                        ->where($this->dbCle[$table], "=", $rows[$this->dbCle[$table]])
                                        ->where("ref", "=", $id)
                                        ->count() == 1) {
                                    $update = [];
                                    foreach ($rows as $row => $value) {
                                        if ($value != null && $value != "") {
                                            switch ($this->dbFormat[$table][$row]) {
                                                case "file":
                                                    if ($value["size"] > 0)
                                                        $update[$row] = $this->ajoutFile($id . "/" . $table, $rows[$this->dbCle[$table]] . "_" . $row, $value);
                                                    break;
                                                case "string":
                                                    $update[$row] = $this->ajoutString($value);
                                                    break;
                                                case "date":
                                                    $update[$row] = $this->ajoutDate($value);
                                                    break;
                                                case "int":
                                                    $update[$row] = $this->ajoutInt($value);
                                                    break;
                                                case "activite":
                                                    $update[$row] = $this->ajoutActivite($value);
                                                    break;
                                                case "partenaire":
                                                    $update[$row] = $this->ajoutPartenaire($value);
                                                    break;
                                                case "type":
                                                    $update[$row] = $this->ajoutType($value);
                                                    break;

                                            }
                                        }
                                    }
                                    DB::table($table)
                                        ->where($this->dbCle[$table], "=", $rows[$this->dbCle[$table]])
                                        ->where("ref", "=", $id)
                                        ->update($update);
                                } else {
                                    $insert["ref"] = $id;
                                    foreach ($rows as $row => $value) {
                                        if ($value != null && $value != "") {
                                            switch ($this->dbFormat[$table][$row]) {
                                                case "file":
                                                    echo "file ";
                                                    if ($value["size"] > 0)
                                                        $insert[$row] = $this->ajoutFile($id . "/" . $table, $rows[$this->dbCle[$table]] . "_" . $row, $value);
                                                    break;
                                                case "string":
                                                    echo "string ";

                                                    $insert[$row] = $this->ajoutString($value);
                                                    break;
                                                case "date":
                                                    echo "date ";

                                                    $insert[$row] = $this->ajoutDate($value);
                                                    break;
                                                case "int":
                                                    echo "int ";

                                                    $insert[$row] = $this->ajoutInt($value);
                                                    break;
                                                case "activite":
                                                    echo "activite ";

                                                    $insert[$row] = $this->ajoutActivite($value);
                                                    break;
                                                case "partenaire":
                                                    echo "partenaire ";

                                                    $insert[$row] = $this->ajoutPartenaire($value);
                                                    break;
                                                case "type":
                                                    $insert[$row] = $this->ajoutType($value);
                                                    break;
                                            }
                                        }
                                    }
                                    DB::table($table)->insert($insert);
                                }
                            }
                        }
                    break;
            }
        }
        //var_dump($data);

    }



    public function suppr($id){
        DB::table('souche')
            ->where('ref', "=", $id)
            ->update(['desactive' => 1]);
    }

    public function poc(){
        $souche = $this->getData('432');
        return view('souche/old_souche_home', ['souche' => $souche]);
    }
}
