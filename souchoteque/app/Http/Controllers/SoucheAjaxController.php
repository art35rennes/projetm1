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
    public function update($id, Request $request){

        $data = $request->json()->all();
        $update = null;
        //return var_export($data);
        switch ($data[1]["onglet"]){
            case "description" :

                break;
            case "identification" :
                for($i = 1; $i<count($data); $i++) {
                    if ($data[$i]["oldKey"] == null) {
                        unset($update);
                        $update["ref"] = $id;
                        $update["type"] = $this->ajoutString($data[$i]["type"]);
                        if ($data[$i]["arbre"] != null)
                            $update["arbre"] = $this->ajoutFile($id . "/identification", "arbre", $data[$i]["arbre"]);
                        elseif ($data[$i]["new"])
                            $update["arbre"] = "";

                        if ($data[$i]["sequence"] != null)
                            $update["sequence"] = $this->ajoutFile($id . "/identification", "sequence", $data[$i]["sequence"]);
                        elseif ($data[$i]["new"])
                            $update["sequence"] = "";
                        DB::table("identification")->updateOrInsert(
                            ['ref' => $id, 'type' => $update["type"]],
                            $update
                        );
                    }else{
                        //TODO
                    }
                }
                break;
            case "pasteur" :
                for($i = 1; $i<count($data); $i++) {
                    if ($data[$i]["oldKey"] == null) {
                        unset($update);
                        $update["ref"] = $id;
                        $update["date_depot"] = $this->ajoutDate($data[$i]["date"]);
                        $update["titre"] = $this->ajoutString($data[$i]["titre"]);
                        $update["numero"] = $this->ajoutInt($data[$i]["numero"]);

                        if ($data[$i]["dossier"] != null)
                            $update["dossier_depot"] = $this->ajoutFile($id . "/pasteur", "dossier", $data[$i]["dossier"]);
                        elseif ($data[$i]["new"])
                            $update["dossier_depot"] = "";

                        if ($data[$i]["validation"] != null)
                            $update["scan_validation"] = $this->ajoutFile($id . "/pasteur", "validation", $data[$i]["validation"]);
                        elseif ($data[$i]["new"])
                            $update["scan_validation"] = "";

                        $update["stock"] = $this->ajoutInt($data[$i]["stock"]);

                        if ($data[$i]["photo"] != null)
                            $update["photo_cryotube"] = $this->ajoutFile($id . "/pasteur", "photo", $data[$i]["photo"]);
                        elseif ($data[$i]["new"])
                            $update["photo_cryotube"] = "";

                        DB::table("pasteur")->updateOrInsert(
                            ['ref' => $id, 'titre' => $update["titre"]],
                            $update
                        );
                    }else{
                        //TODO
                    }
                }
                break;
            case "brevet" :
                for($i = 1; $i<count($data); $i++) {
                    if ($data[$i]["oldKey"] == null) {
                        unset($update);
                        $update["ref"] = $id;
                        $update["numero"] = $this->ajoutInt($data[$i]["numero"]);
                        $update["titre"] = $this->ajoutString($data[$i]["titre"]);
                        $update["date"] = $this->ajoutDate($data[$i]["demande"]);
                        $update["activite"] = $this->ajoutActivite($data[$i]["secteur"]);
                        if ($data[$i]["texte"] != null)
                            $update["scan"] = $this->ajoutFile($id . "/brevet", "texte", $data[$i]["texte"]);
                        elseif ($data[$i]["new"])
                            $update["scan"] = "";

                        if ($data[$i]["inpi"] != null)
                            $update["inpi"] = $this->ajoutFile($id . "/brevet", "inpi", $data[$i]["inpi"]);
                        elseif ($data[$i]["new"])
                            $update["inpi"] = "";


                        DB::table("brevet")->updateOrInsert(
                            ['ref' => $id, 'titre' => $update["titre"]],
                            $update
                        );
                    }else{
                        //TODO
                    }
                }
                break;
            case "publication":

                break;
            case "exclusivite" :
                return var_export($data);

                break;
            case "projet" :

                break;
            case "eps" :

                break;
            case "pha" :

                break;
            case "autre" :

                break;
            default :
                break;
        }


    }
    public function ajoutFile($chemin, $nom, $fichier) {
        //mkdir("./storage/".$chemin."/", "777");
        $name = explode('.',$fichier["name"]);
        $dest = "public/".$chemin."/".date("Y-m-d_H-i-s_").$nom.".".end($name);
        Storage::disk('local')->put($dest, base64_decode(explode(',', $fichier["data"])[1]));
        //TODO : try
        //$fp = fopen("storage/".$chemin."/".$dest, "w");
        //fwrite($fp, base64_decode(explode(',', $fichier["data"])[1]));
        //fclose($fp);
        return $dest;

    }
    public function ajoutString($text){
        if (sizeof($text) < 255){
            return $text;
        }
        $this->erreur("Un texte que vous avez saisi a une erreur");
    }
    public function ajoutDate($date){
        if ($this->validateDate($date)){
            return $date;
        }
        $this->erreur("Une date que vous avez saisi a une erreur");

    }
    public function ajoutInt($nb){
        if (is_int((int)$nb)){
            return $nb;
        }
        $this->erreur("Une année ou un nombre que vous avez saisi a une erreur");
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
        DB::table("partenaire")->insert(['nom' => $act]);
        return $act;
    }

    public function ajoutType($type){
        if (in_array($type, ['PHA', 'EPS', 'Autre'])){
            return $type;
        }
        $this->erreur("Un type (PHA, EPS, Autre) que vous avez saisi a une erreur");

    }

    public function erreur($message, $error = true){
        // TODO : feedback error
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

    public function isUpdate($fromTable, $update){
        sort ($update);
        foreach ($fromTable as $ligne){
            sort ($ligne);
            if ($ligne != $update)
                return true;
        }
        return false;
    }

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
}
