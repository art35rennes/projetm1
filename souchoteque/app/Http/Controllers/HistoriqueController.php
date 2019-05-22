<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HistoriqueController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function show(){
        $historique = DB::table('historique')->select('*')->orderBy("date")->limit(500)->get();
        return view('historique', ['historique' => $historique]);
    }

}
