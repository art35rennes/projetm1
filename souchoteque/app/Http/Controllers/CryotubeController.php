<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CryotubeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function show(){
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();

        $souches = DB::table("souche")->select("ref", "stock", DB::raw("isnull(annee_creation) AS notogm"))->get();
        $data = array();
        foreach ($souches as $souche){
            $data[$souche->ref]["stock"] = $souche->stock;
            $data[$souche->ref]["notogm"] = $souche->notogm;

            foreach (DB::table("pasteur")->where("ref", "=", $souche->ref)->select("numero", "stock")->get() as $pasteur)
                $data[$souche->ref]["pasteur"][] = json_decode(json_encode($pasteur),true);
        }

            var_dump($data);
        return view('cryotube', ["user" => $user[0], "data" => $data]);
    }

}
