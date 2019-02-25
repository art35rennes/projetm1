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

        $souche['projet'] = DB::table("projet")->select()->get();

        $souche['activite'] = DB::table("activite")->select()->get();
        
        $souche['oses'] = DB::table("oses")->select()->get();

        $souche['caracterisation_oses'] = DB::table('caracterisation_oses')
            ->join('oses', 'caracterisation_oses.oses', '=', 'oses.nom')
            ->select()->where("caracterisation_oses.ref" ,"=", $id)->get();

        return $souche;
    }

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

    public function ajout(){
        $souches = DB::table('souche')->select('ref')->get();
        return view('souche_ajout', ['souches'=> $souches]);
    }

    public function ajoutFile($chemin, $nom, $fichier){
        if (!$fichier->isValid()) {
            return false;
        }
        else {
            Storage::putFileAs($chemin, $fichier, $nom.".".$fichier->extension());
            return true;
        }
    }

    public function ajoutPost(Request $request){

        $chemin = $request->post("ref")."/souche";
        $date = date("Y-m-d_H-i-s_");

        //-----------------Ref---------------------
        $insert["ref"] = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }
        if (!$this->ajoutFile($chemin, $request->file("description"), $date."description")){
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }else{
            $insert["description"] = $chemin."/".$date."description.".$request->file("description")->extension();
        }

        //------------------Stock------------------
        $insert["stock"] = $request->post("stock");

        if (request("isOGM")){

            $insert["annee_creation"] = $request->post("annee_creation");

            foreach (["texte_hcb", "validation_hcb", "schema_plasmique"] as $nom){
                if ($request->hasFile($nom)) {
                    $this->ajoutFile($chemin, $request->file($nom), $date.$nom);
                    $insert[$nom] = $chemin."/".$date.$nom.".".$request->file($nom)->extension();
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

    public function suppr($id){
        DB::table('souche')
            ->where('ref', "=", $id)
            ->update(['desactive' => 1]);
    }

    public function update($id, Request $request){
        $souche = $this->getData($id);
        $posts = $request->all();

        foreach ($posts as $key => $value) {
            $key = explode("/", $key);
            switch ($key[0]){
                case "brevet_soleau":

                    break;
                case "capacite_production":

                    break;
                case "caracterisation":

                    break;
                case "criblage":

                    break;
                case "description":

                    break;
                case "exclusivite":

                    break;
                case "oses":

                    break;
                case "fichier_caracterisation":

                    break;
                case "identification":

                    break;
                case "objectivation":

                    break;
                case "pasteur":

                    break;
                case "photo_souche":

                    break;
                case "production":

                    break;
                case "projet":

                    break;
                case "publication":

                    break;
                case "souche":

                    break;

            }
        }
        dd($posts);
    }
}
