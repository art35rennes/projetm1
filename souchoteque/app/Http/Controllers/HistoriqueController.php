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
        //echo asset('storage/file.txt');
        $historique = DB::table('historique')->join('users', 'historique.user', '=', 'users.id')
            ->select('historique.date', 'historique.type', 'historique.cle', 'historique.old_value', 'users.name')
            ->orderBy("historique.date")->limit(500)->get();
        //var_dump($historique);
        return view('historique', ['historique' => $historique]);
    }

}
