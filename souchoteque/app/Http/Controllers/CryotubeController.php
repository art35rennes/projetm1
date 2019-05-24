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

            //var_dump($historique);
        return view('cryotube', ["user" => $user[0]]);
    }

}
