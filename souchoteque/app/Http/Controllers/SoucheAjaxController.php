<?php
/**
 * Created by PhpStorm.
 * User: zeucny
 * Date: 2019-04-25
 * Time: 13:56
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoucheAjaxController
{
    public function update($id, Request $request){


        $data = $request->json()->all();
        ob_start();
        var_dump($data);
        $result = ob_get_clean();
        return $result;
        if (file_exists('/Users/Shared/soucheAjaxResult.html')) {
            unlink('/Users/Shared/soucheAjaxResult.html');
        }
        $fp = fopen('/Users/Shared/soucheAjaxResult.html', 'w');
        fwrite($fp, date("H:m:s\n"));
        ob_start();
        var_dump($data);
        $result = ob_get_clean();
        fwrite($fp, $result);
        fclose($fp);

        foreach ($data as $ligne){
            $insert = null;
            $table = null;
            if (!isset($ligne["_token"])) {

                switch ($ligne["onglet"]) {
                    case "description" :

                        break;
                    case "identification" :
                        if (isset($ligne["type"]) && $ligne["type"] != null){
                            $table = "identification";
                            $insert["type"] = $this->ajoutString($ligne["type"]);
                            $insert["arbre"] = $this->ajoutFile($id."/".$table, "arbre", $ligne["arbre"]);
                            $insert["sequence"] = $this->ajoutFile($id."/".$table, "sequence", $ligne["sequence"]);
                        }
                        break;
                    case "pasteur" :
                        if (isset($ligne["titre"]) && $ligne["titre"] != null){
                            $table = "pasteur";
                            $insert["date"] = $this->ajoutDate($ligne["date"]);
                            $insert["titre"] = $this->ajoutString($ligne["titre"]);
                            $insert["numero"] = $this->ajoutInt($ligne["numero"]);
                            $insert["validation"] = $this->ajoutFile($id."/".$table, "validation", $ligne["validation"]);
                            $insert["stock"] = $this->ajoutInt($ligne["stock"]);
                            $insert["photo"] = $this->ajoutFile($id."/".$table, "photo", $ligne["photo"]);

                        }
                        break;
                    case "brevet" :
                        if (isset($ligne["titre"]) && $ligne["titre"] != null){
                            $table = "brevet_soleau";
                        }
                        break;
                    case "publication":
                        if (isset($ligne["nom"]) && $ligne["nom"] != null){
                            $table = "brevet_soleau";
                        }
                        break;
                    case "exclusivite" :

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
                if ($table != null) {
                    if (isset($ligne["oldKey"])) {
                        //TODO : update key
                    } elseif ($ligne["new"]) {
                        //TODO : insert
                    } else {
                        //TODO : update
                    }
                }
            }
        }
    }
    public function ajoutFile($chemin, $nom, $fichier) {
        $date = date("Y-m-d_H-i-s_");
        if (!$fichier->isValid()) {
            $this->erreur("Un des fichier que vous avez envoyé a rencontré une erreur");
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
        $this->erreur("Un texte que vous avez saisi a une erreur");
    }
    public function ajoutDate($date){
        if ($this->validateDate($date)){
            return $date;
        }
        $this->erreur("Une date que vous avez saisi a une erreur");

    }
    public function ajoutInt($nb){
        if (is_int($nb)){
            return $nb;
        }
        $this->erreur("Une année ou un nombre que vous avez saisi a une erreur");
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
        $this->erreur("Un type (PHA, EPS, Autre) que vous avez saisi a une erreur");

    }

    public function erreur($message){
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
}