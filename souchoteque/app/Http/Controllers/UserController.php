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

class UserController extends Controller
{
    ////////////////////////////
    /////////TOOL BOX///////////
    ////////////////////////////

    private function postData(Request $request){
        $posts = $request->all();
        $data = [];
        //alors je sais pas comment ça marche mais ça transforme un "/bla/bla = bla" en [bla][bla] = bla
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

    private $dbFormat = [
        "accreditation" => [
            "id" => "int",
            "nom" => "string",
            "niveau" => "string",
            "souche" => "int",
        ],
        "users" =>[
            "id" => "int",
            "name" => "string",
            "email" => "string",
            "email_verified_at" => "int",
            "password" => "string",
            "remenber_token" => "string",
            "created_at" => "int",
            "updated_at" => "int",
            "accreditation" => "int",
        ],

    ];
    private $dbCle = [
        "accreditation" => "id",
        "users" => "id",
    ];

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
       $data = $this->postData($request);

       User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
           'accreditation' => $data['souche'],
       ]);

       return redirect()->back();
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
       $data = $this->postData($request);

       $data["niveau"] = "";
       foreach($data["accreditation"] as $value){
           $data["niveau"] .= $value;
       }
       DB::table("accreditation")->insert([
           "nom" => $data["nom"],
           "niveau" => dechex(bindec($data["niveau"])),
           "souche" => $data["souche"],
       ]);

       return redirect()->back();
    }

    public function deleteAccreditation(Request $request){
        $data = $this->postData($request);

        DB::table("accreditation")->delete($data["id_accred"]);

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
