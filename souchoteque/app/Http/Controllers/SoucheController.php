<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class SoucheController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getData($id){
        foreach (['souche', 'identification', 'pasteur', 'publication', 'brevet_soleau', 'photo_souche', 'exclusivite'] as $table)
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

        return $souche;
    }

    public function show($id){
        $souche = $this->getData($id);

        //gestion projet a faire

        //var_dump($souche);
        return view('souche_home', ['souche' => $souche]);
    }

    public function dump($id){
        $souche = $this->getData($id);
        var_dump($souche);
    }

    public function dd($id){
        $souche = $this->getData($id);
        dd($souche);
    }

    public function ajout(){
        $souches = DB::table('souche')->select('ref')->get();
        return view('souche_ajout', ['souches'=> $souches]);
    }

    public function ajoutPost(){

    }
}
