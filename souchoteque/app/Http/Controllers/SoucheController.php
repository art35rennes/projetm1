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

    function feedback($error, $message){
        return view('souche/souche_feedback', ['error' => true, 'message' => "Une des date que vous avez saisi n'est pas conforme", 'date' => date("d/m/Y H:m:s")]);
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

    public function poc(){
        $souche = $this->getData('432');
        return view('souche/old_souche_home', ['souche' => $souche]);
        //return view('poc', ['souche' => $souche]);
    }
}
