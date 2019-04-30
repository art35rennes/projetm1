<?php
/**
 * Created by PhpStorm.
 * User: zeucny
 * Date: 2019-04-25
 * Time: 13:56
 */

namespace App\Http\Controllers;


class SoucheAjaxController
{
    public function update($id, Request $request){
        $data = $request->input('data');
        foreach ($data as $ligne){
            $data_insert = null;

            switch($ligne["table"]){
                case "activite" :

                    break;
                case "brevet_soleau" :

                    break;
                case "capacite_production" :

                    break;
                case "caracterisation" :

                    break;
                case "caracterisation_oses":

                    break;
                case "criblage" :

                    break;
                case "description" :

                    break;
                case "exclusivite" :

                    break;
                case "fichier_caracterisation" :

                    break;
                case "identification" :

                    break;
                case "objectivation" :

                    break;
                case "oses" :

                    break;
                case "partenaire" :

                    break;
                case "pasteur" :

                    break;
                case "photo_souche" :

                    break;
                case "production" :

                    break;
                case "projet" :

                    break;
                case "publication" :

                    break;
                case "projet" :

                    break;
                case "publication" :

                    break;
                case "souche" :

                    break;
                case "souche_projet" :

                    break;
                default :
                    break;
            }
            if ($ligne["insert"]){
                //TODO : insert
            }else{
                //TODO : update
            }
        }
    }
}