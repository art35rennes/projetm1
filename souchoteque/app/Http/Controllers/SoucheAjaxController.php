<?php
/**
 * Created by PhpStorm.
 * User: zeucny
 * Date: 2019-04-25
 * Time: 13:56
 */

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SoucheAjaxController
{

    public $erreur = array();

    //Fonction principale de mise à jour des données
    public function update($id, Request $request){

        $datas = $request->json()->all();
        //return var_export($datas);

        $update = null;
        foreach ($datas as $data){
            //return var_export($data);
            if (isset($data["onglet"])) {
                switch ($data["onglet"]) {
                    case "description":
                        return var_export($datas);
                        //TODO
                        break;
                    case "identification":
                        if ($data["oldKey"] == null) {
                            unset($update);
                            $update["ref"] = $id;
                            $update["type"] = $this->ajoutString($data["type"]);
                            if ($data["arbre"] != null)
                                $update["arbre"] = $this->ajoutFile($id . "/identification", "arbre", $data["arbre"]);
                            elseif ($data["new"])
                                $update["arbre"] = "";

                            if ($data["sequence"] != null)
                                $update["sequence"] = $this->ajoutFile($id . "/identification", "sequence", $data["sequence"]);
                            elseif ($data["new"])
                                $update["sequence"] = "";
                            $this->updateDatabase(
                                "identification",
                                ['ref' => $id, 'type' => $update["type"]],
                                $update
                            );
                        } else {
                            //TODO
                        }
                        break;
                    case "pasteur":
                        if ($data["oldKey"] == null) {
                            unset($update);
                            $update["ref"] = $id;
                            $update["date_depot"] = $this->ajoutDate($data["date"]);
                            $update["titre"] = $this->ajoutString($data["titre"]);
                            $update["numero"] = $this->ajoutInt($data["numero"]);

                            if ($data["dossier"] != null)
                                $update["dossier_depot"] = $this->ajoutFile($id . "/pasteur", "dossier", $data["dossier"]);
                            elseif ($data["new"])
                                $update["dossier_depot"] = "";

                            if ($data["validation"] != null)
                                $update["scan_validation"] = $this->ajoutFile($id . "/pasteur", "validation", $data["validation"]);
                            elseif ($data["new"])
                                $update["scan_validation"] = "";

                            $update["stock"] = $this->ajoutInt($data["stock"]);

                            if ($data["photo"] != null)
                                $update["photo_cryotube"] = $this->ajoutFile($id . "/pasteur", "photo", $data["photo"]);
                            elseif ($data["new"])
                                $update["photo_cryotube"] = "";

                            $this->updateDatabase("pasteur",
                                ['ref' => $id, 'titre' => $update["titre"]],
                                $update
                            );
                            return;
                        } else {
                            //TODO
                        }
                        break;
                    case "brevet":
                        if ($data["oldKey"] == null) {
                            unset($update);
                            $update["ref"] = $id;
                            $update["numero"] = $this->ajoutInt($data["numero"]);
                            $update["titre"] = $this->ajoutString($data["titre"]);
                            $update["date"] = $this->ajoutDate($data["demande"]);
                            $update["activite"] = $this->ajoutActivite($data["secteur"]);

                            if ($data["texte"] != null)
                                $update["scan"] = $this->ajoutFile($id . "/brevet", "texte", $data["texte"]);
                            elseif ($data["new"])
                                $update["scan"] = "";

                            if ($data["inpi"] != null)
                                $update["inpi"] = $this->ajoutFile($id . "/brevet", "inpi", $data["inpi"]);
                            elseif ($data["new"])
                                $update["inpi"] = "";


                            $this->updateDatabase("brevet_soleau",
                                ['ref' => $id, 'titre' => $update["titre"]],
                                $update
                            );
                        } else {
                            //TODO
                        }
                        break;
                    case "publication":
                        //TODO
                        break;
                    case "exclusivite":
                        if ($data["oldKey"] == null) {
                            unset($update);
                            $update["date_debut"] = $this->ajoutDate($data["debut"]);
                            $update["date_fin"] = $this->ajoutDate($data["fin"]);

                            $update["activite"] = $this->ajoutActivite($data["secteur"]);
                            $update["partenaire"] = $this->ajoutPartenaire($data["partenaire"]);

                            $this->updateDatabase("brevet",
                                ['ref' => $id, 'titre' => $update["titre"]],
                                $update
                            );
                        } else {
                            //TODO
                        }
                        break;
                    case "oses":
                        $this->updateDatabase("oses",
                            ['nom' => $data["nom"], "type" => $data["type"]],
                            ['nom' => $data["nom"], "type" => $data["type"]]
                        );
                        $this->updateDatabase("caracterisation_oses",
                            [],
                            []
                        );
                        //TODO
                        break;
                    case "caracterisation" :
                        //TODO
                        return var_export($data);
                        break;
                    case "objectivation":
                        unset($update);
                        $update["ref"] = $id;
                        $update["nom"] = $this->ajoutString($data["nom"]);
                        $update["type"] = $data["type"];

                        if ($data["protocole"] != null)
                            $update["protocole"] = $this->ajoutFile($id . "/objectivation", $update["nom"]."_protocole", $data["protocole"]);
                        elseif ($data["new"])
                            $update["protocole"] = "";

                        if ($data["resultat"] != null)
                            $update["resultat"] = $this->ajoutFile($id . "/objectivation", $update["nom"]."_resultat", $data["resultat"]);
                        elseif ($data["new"])
                            $update["resultat"] = "";
                        $this->updateDatabase("objectivation",
                            ['ref' => $id, 'nom' => $update["nom"]],
                            $update
                        );
                        break;
                    case "industriel" :
                        $update["ref"] = $id;
                        $update["type"] = $data["type"];
                        $update["nom"] = $this->ajoutString($data["nom"]);
                        $update["date"] = $this->ajoutDate($data["date"]);
                        $update["lieu"] = $this->ajoutString($data["lieu"]);
                        if ($data["protocole"] != null)
                            $update["protocole"] = $this->ajoutFile($id . "/industriel", $update["nom"]."_protocole", $data["protocole"]);
                        elseif ($data["new"])
                            $update["protocole"] = "";
                        if ($data["resultat"] != null)
                            $update["rapport"] = $this->ajoutFile($id . "/industriel", $update["nom"]."_rapport", $data["resultat"]);
                        elseif ($data["new"])
                            $update["rapport"] = "";
                        //$update["projet"] =
                        $this->updateDatabase("objectivation",
                            ['nom' => $update["nom"], 'ref' => $id],
                            $update
                        );
                        break;
                    case "caracterisation":
                        $this->updateDatabase("caracterisation",
                            ["ref" => $id, "type" => $data['type']],
                            ["ref" => $id, "type" => $data['type'], "poids_moleculaire" => $data["poid"]]
                        );
                        if ($data["fichier"] != null){
                            $update["nom"] = $this->ajoutString($data["nom"]);
                            $update["ref"] = $id;
                            $update["type"] = $data["type"];
                            $update["fichier"] = $this->ajoutFile($id . "/caracterisation", $update["type"]."_".$update["nom"], $data["fichier"]);
                            $this->updateDatabase("fichier_caracterisation",
                                ["nom" => $update["nom"], "ref" => $id, "type" => $update["type"]],
                                [$update]
                            );
                        }
                        break;
                    case "criblage":
                        $update["ref"] = $id;
                        $update["type"] = $data["type"];
                        $update["nom"] = $this->ajoutString($data["nom"]);
                        if ($data["protocole"] != null)
                            $update["conditions"] = $this->ajoutFile($id . "/criblage", $update["nom"]."_condition", $data["condition"]);
                        elseif ($data["new"])
                            $update["conditions"] = "";
                        if ($data["rapport"] != null)
                            $update["rapport"] = $this->ajoutFile($id . "/criblage", $update["nom"]."_rapport", $data["rapport"]);
                        elseif ($data["new"])
                            $update["rapport"] = "";
                        $this->updateDatabase("criblage",
                            ['nom' => $update["nom"], 'ref' => $id],
                            $update
                        );
                        break;
                    default:
                        return var_export($datas);
                        //TODO
                        break;
                }
            }
        }
        if (count($this->erreur) > 0)
            die(json_encode(["alert" => "danger"],$this->erreur));
        else
            die(json_encode([["alert" => "success"],"Les modifications ont bien été enregistré"]));

    }

    //CONTROLE DE DONNEE

    public function ajoutFile($chemin, $nom, $fichier) {
        $name = explode('.',$fichier["name"]);
        $dest = "public/".$chemin."/".date("Y-m-d_H-i-s_").$nom.".".end($name);
        try{
            Storage::disk('local')->put($dest, base64_decode(explode(',', $fichier["data"])[1]));
        }catch(Exception $e){}
        return $dest;

    }
    public function ajoutString($text){
        if (sizeof($text) < 255){
            return $text;
        }
        $this->erreur("Le champ où vous avez saisi \"".$text."\" contient une erreur");
        return "";
    }
    public function ajoutDate($date){
        if ($this->validateDate($date)){
            return $date;
        }
        $this->erreur("Le champ où vous avez saisi \"".$date."\" contient une erreur");
        return "";
    }
    public function ajoutInt($nb){
        if (is_int((int)$nb)){
            return $nb;
        }
        $this->erreur("Le champ où vous avez saisi \"".$nb."\" contient une erreur");
    }

    public function ajoutPartenaire($part){
        if (DB::table("partenaire")->where("nom", "=", $part)->count() == 1)
            return $part;
        DB::table("partenaire")->insert(['nom' => $part]);
        return $part;
    }

    public function ajoutActivite($act){
        if (DB::table("activite")->where("nom", "=", $act)->count() == 1)
            return $act;
        DB::table("activite")->insert(['nom' => $act]);
        return $act;
    }

    public function ajoutType($type){
        if (in_array($type, ['PHA', 'EPS', 'Autre'])){
            return $type;
        }
        $this->erreur("Un type (PHA, EPS, Autre) que vous avez saisi a une erreur");

    }

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
        $this->erreur("Une des date que vous avez saisi n'est pas conforme");
    }

    //Gestion des erreurs

    public function erreur($message, $error = true){
        $this->erreur[] = $message;
    }

    //DELETE
    public function suppr($id, Request $request){

    }

    public function supprSouche($id){
        DB::table('souche')
            ->where('ref', "=", $id)
            ->update(['desactive' => 1]);
    }

    public function supprFile($id, Request $request){
        return "vtff";
    }

    //Ajout en base et archivage des modifications

    public function updateDatabase($table, $cle, $data, $oldcle = null){

        //Si gestion d'une ancienne cle
        if ($oldcle != null){
            $dataBase = json_decode(json_encode(DB::table($table)->where($oldcle)->select()->get()),true);
            DB::table("historique")->insert([
                "user" => 0,
                "cle" => json_encode($cle),
                "table" => $table,
                "old_value" => json_encode($dataBase)
            ]);
            DB::table($table)->updateOrInsert($oldcle, $cle);
        }

        //Selectionne l'élément déjà en base et le compare pour savoir si il y a eu une modif

        $dataBase = json_decode(json_encode(DB::table($table)->where($cle)->select()->get()),true);
        if (count($dataBase) != 0) {//si update
            $dataBase = $dataBase[0];
            $ischanged = false;
            foreach ($data as $key => $value) {
                if (strcmp($dataBase[$key], (string)$value) != 0) {
                    $ischanged = true;
                }
            }
            //Si pas de changement c'est pas la peine de continuer
            if (!$ischanged)
                return;

            DB::table("historique")->insert([
                "user" => 0,
                "cle" => json_encode($cle),
                "table" => $table,
                "old_value" => json_encode($dataBase)
            ]);
        }

        DB::table($table)->updateOrInsert($cle, $data);
    }
}