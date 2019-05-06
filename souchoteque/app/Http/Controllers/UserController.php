<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    ////////////////////////////
    /////////TOOL BOX///////////
    ////////////////////////////

    private function postData(Request $request){
        $posts = $request->all();
        $data = [];
        //alors je sais pas comment ça marche mais ça transforme un "bla-bla = bla" en bla["bla"] = "bla"
        //tant que ça marche ça me va
        foreach ($posts as $keys => $value) {
            $exploded = explode("-", $keys);
            $temp = &$data;
            foreach($exploded as $key) {
                $temp = &$temp[$key];
            }
            $temp = $value;
            unset($temp);
        }
        return $data;
    }

    ////////////////////////////
    ////////////USER////////////
    ////////////////////////////

    private function getUsers($id=null){
        if($id!=null){
            $users['users'] = DB::table('users')
                ->select()
                ->where('id', "=", $id)
                ->get();
        }
        else{
            $users['users'] = DB::table('users')
                ->select()
                ->get();
        }
        return $users;
    }

    public function ajoutView(){
       $accred = $this->getAccreditation();
       return view("user/user_ajout", ['accreditations' => $accred]);
    }

    public function ajout(Request $request){
        Log::info($request->input("password"));
        Log::info($request->input("password-confirm"));

        if (strcmp($request->input("password"), $request->input("password-confirm")) != 0)
            return Log::info('les deux mots de passe ne correspondent pas');
        if (strlen($request->input("password")) <= 6)
            return Log::info('Le mot de passe doit faire plus de 6 caractères');
        foreach (DB::table("users")->select("email")->get() as $mails){
            foreach ($mails as $mail)
                if (strcmp($mail, $request->input("email")) == 0)
                    return Log::info('Ce mail correspond déjà à un utilisateur');
        }
//$request->input("email")
        DB::table("users")->insert([
           'name' => $request->input("name"),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
           'accreditation' => $request->input('souche'),
       ]);

       return redirect()->back()->with(['erreur' => 'test']);
}

    public function logOut(){
       Auth::logout();
       return redirect()->route('login');
    }

    public function showUser(){
       $users = $this->getUsers();
       $accred = $this->getAccreditation();

       return view("user/user_liste", [
           "users" => $users,
           "accreditations" => $accred,
           ]);
    }

    ////////////////////////////
    ///////ACCREDITATION////////
    ////////////////////////////
    private function getAccreditation($id=null){
       if($id!=null){
           $accred['accreditation'] = DB::table('accreditation')
           ->select()
           ->where('id', "=", $id)
           ->get();
       }
       else{
           $accred['accreditation'] = DB::table('accreditation')
           ->select()
           ->get();
       }

       return $accred;
    }
    public function accreditation(){
       $accred = $this->getAccreditation();
       return view("user/user_accreditation", ['accreditations' => $accred]);
    }

    public function ajoutAccreditation(Request $request){

       $niveau = "";
       foreach($request->input("accreditation") as $value){
           $niveau .= $value;
       }
       DB::table("accreditation")->insert([
           "nom" => $request->input("nom"),
           "niveau" => dechex(bindec($niveau)),
           "souche" => $request->input("souche"),
       ]);

       return redirect()->back();
    }

    public function deleteAccreditation(Request $request){
        DB::table("accreditation")->delete($request->input("id_accred"));

        return redirect()->back();
    }

    public function majAccreditation(Request $request){
        $data = $this->postData($request);

        foreach($data["accreditation"] as $accred){
            $accred["niveau"]="";
            foreach ($accred as $value){
                $accred["niveau"] .= $value;
            }
            dd($accred);
            DB::table("accreditation")->update();
        }

        return redirect()->back();
    }
}
