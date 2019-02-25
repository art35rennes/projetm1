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

    public function ajoutFile($chemin, $fichier){
        if ($fichier->isValid()) {
            return view('souche_feedback', ['error' => true, 'message' => 'Une erreur est survenu sur la description']);
        }
        else {
            $insert["description"] = Storage::putFileAs($request->post("ref"),
                $request->file("description"),
                date("Y-m-d_H-i-s") . "_description." . $request->file("description")->extension());
        }
    }

    public function ajoutPost(Request $request){

        //-----------------Ref---------------------
        $insert["ref"] = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }
        elseif (!$request->file("description")->isValid()) {
            return view('souche_feedback', ['error' => true, 'message' => 'Une erreur est survenu sur la description']);
        }
        else {
            $insert["description"] = Storage::putFileAs($request->post("ref"),
                $request->file("description"),
                date("Y-m-d_H-i-s") . "_description." . $request->file("description")->extension());
        }

        $insert["stock"] = $request->post("stock");

        if (request("isOGM")){

            $insert["annee_creation"] = $request->post("annee_creation");

            if ($request->hasFile("texte_hcb")) {
                $insert["texte_hcb"] = Storage::putFileAs($request->post("ref"),
                    $request->file("texte_hcb"),
                    date("Y-m-d_H-i-s") . "_texte_hcb." . $request->file("texte_hcb")->extension());
            }

            if ($request->hasFile("validation_hcb")) {
                $insert["validation_hcb"] = Storage::putFileAs($request->post("ref"),
                    $request->file("validation_hcb"),
                    date("Y-m-d_H-i-s") . "_validation_hcb." . $request->file("validation_hcb")->extension());
            }else{
                $validation_hcb = "";
            }

            if ($request->hasFile("schema_plasmique")) {
                $insert["schema_plasmique"] = Storage::putFileAs($request->post("ref"),
                    $request->file("schema_plasmique"),
                    date("Y-m-d_H-i-s") . "_schema_plasmique." . $request->file("schema_plasmique")->extension());
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
        $posts = $request->all();
        foreach ($posts as $key => $value) {
            $key = explode("/", $key);
            switch ($key){
                case "activite":

                    break;
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
