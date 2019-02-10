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
                ->select(DB::raw('*'))
                ->where('ref','=', $id)
                ->get();

        foreach (['EPS', 'PHA', 'Autre'] as $prod)
            $souche['capacité_'.$prod] = DB::table('capacite_production')
                ->select('nom', 'fichier')
                ->where('ref', '=', $id)
                ->where('type', '=', $prod)
                ->get();

        $souche['projet'] = DB::table("projet")
            ->join("souche_projet", "projet.nom", "=", "souche_projet.projet")
            ->select()
            ->where("souche_projet.ref", "=", $id)->get();
        return $souche;
    }

    public function show($id){
        $souche = $this->getData($id);

        //gestion projet a faire

        //var_dump($souche);
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

    public function ajoutPost(Request $request){

        //-----------------Ref---------------------
        $ref = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }
        elseif (!$request->file("description")->isValid()) {
            return view('souche_feedback', ['error' => true, 'message' => 'Une erreur est survenu sur la description']);
        }
        else {
            $path = Storage::putFileAs($request->post("ref"), $request->file("description"), date("Y-m-d_H-i-s") . "_description." . $request->file("description")->extension());
        }
        echo $path;
        /*
        if (request("isOGM")){
            $insert = DB::insert("INSERT INTO souche (ref, stock, annee_creation, description, texte_hcb, validation_hcb, schema_plasmique)",
                [
                    request("ref"),
                    request("stock"),
                    request("annee_creation"),
                    request("ref")+"/description.docx",
                    request("texte_hcb"),
                    request("validation_hcb"),
                    request("schema_plasmique")
                ]);
        }else{
            $insert = DB::insert("INSERT INTO souche (ref, origine, stock, annee_collecte, description)",
                [
                    request("ref"),
                    request("origine"),
                    request("stock"),
                    request("annee_collecte"),
                    request("ref")+"/description.docx",
                ]);
        }
        */

    }

    public function suppr($id){

    }
}
