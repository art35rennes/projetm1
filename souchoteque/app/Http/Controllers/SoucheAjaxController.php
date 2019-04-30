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

            switch($ligne["onglet"]){
                case "#pills-description" :

                    break;
                case "#pills-identification" :

                    break;
                case "#pills-pasteur" :

                    break;
                case "#pills-brevet_soleau" :

                    break;
                case "#pills-publication":

                    break;
                case "#pills-exclisivite" :

                    break;
                case "#pills-projet" :

                    break;
                case "#pills-eps" :

                    break;
                case "#pills-pha" :

                    break;
                case "#pills-autre" :

                    break;
                default :
                    break;
            }
            if ($ligne["new"]){
                //TODO : insert
            }else{
                //TODO : update
            }
        }
    }
}