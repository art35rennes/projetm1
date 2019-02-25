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

    public function ajoutFile($chemin, $nom, $fichier) {
        $date = date("Y-m-d_H-i-s_");
        if (!$fichier->isValid()) {
            return false;
        }
        else {
            Storage::putFileAs($chemin, $fichier, $date.$nom.".".$fichier->extension());
            return $chemin."/".$date.$nom.".".$fichier->extension();
        }
    }

    public function ajoutPost(Request $request){

        $chemin = $request->post("ref")."/souche";

        //-----------------Ref---------------------
        $insert["ref"] = $request->post("ref");

        //--------------Description----------------
        if (!$request->hasFile("description")) {
            return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }else{
            $insert["description"] = $this->ajoutFile($chemin, $request->file("description"), "description");
            if ($insert["description"] == null)
                return view('souche_feedback', ['error' => true, 'message' => 'Veuillez ajouter une description']);
        }

        //------------------Stock------------------
        $insert["stock"] = $request->post("stock");

        if (request("isOGM")){

            $insert["annee_creation"] = $request->post("annee_creation");

            foreach (["texte_hcb", "validation_hcb", "schema_plasmique"] as $nom){
                if ($request->hasFile($nom)) {
                    $insert[$nom] = $this->ajoutFile($chemin, $request->file($nom), $nom);
                    if ($insert[$nom] == false)
                        return view('souche_feedback', ['error' => true, 'message' => 'Une erreur est survenue avec le fichier '.$nom]);

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

    public function update($id, Request $request){
        $souche = $this->getData($id);
        $posts = $request->all();
        $type_hcb = null;

        foreach ($posts as $key => $value) {
            $key = explode("/", $key);
            switch ($key[0]){
                case "brevet_soleau":
                    switch ($key[1]){
                        case "titre":

                            break;
                        case "type":

                            break;
                        case "date":

                            break;
                        case "activite":

                            break;
                    }
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
                case "oses_new":

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
                    switch ($key[1]){
                        case "origine":
                            DB::table("souche")->where("ref", "=", $id)->update(["origine" => $value]);
                            break;
                        case "annee_collecte":
                            if (is_countable($value))
                                DB::table("souche")->where("ref", "=", $id)->update(["annee_collecte" => $value]);
                            break;
                        case "annee_creation":
                            if (is_countable($value))
                                DB::table("souche")->where("ref", "=", $id)->update(["annee_creation" => $value]);
                            break;
                        case "hcb":
                            switch ($key[3]){
                                case "type" :
                                    $type_hcb = $value;
                                    break;
                                case "doc":
                                    if ($type_hcb == "Autorisation")
                                        DB::table("souche")->where("ref", "=", $id)
                                            ->update(["validation_hcb" =>
                                                $this->ajoutFile($id."/souche", $request->file("souche/hcb/doc"), "validation_hcb")
                                            ]);
                                    if ($type_hcb == "Texte HCB")
                                        DB::table("souche")->where("ref", "=", $id)
                                            ->update(["texte_hcb" =>
                                                $this->ajoutFile($id."/souche", $request->file("souche/hcb/doc"), "texte_hcb")
                                            ]);
                                    if ($type_hcb == "Schema plasmique")
                                        DB::table("souche")->where("ref", "=", $id)
                                            ->update(["schema_plasmique" =>
                                                $this->ajoutFile($id."/souche", $request->file("souche/hcb/doc"), "schema_plasmique")
                                            ]);
                                    break;
                            }
                            break;
                    }
                    break;

            }
        }
        dd($posts);
    }

    public function suppr($id){
        DB::table('souche')
            ->where('ref', "=", $id)
            ->update(['desactive' => 1]);
    }
}
