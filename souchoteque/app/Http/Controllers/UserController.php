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

    public function error($error, $message){
        if ($error) {
            return view("feedback", ["message" => $message, "color" => "danger", "date" => date("H:m:s d/M/Y")]);
        } else {
            return view("feedback", ["message" => $message, "color" => "info", "date" => date("H:m:s d/M/Y")]);
        }
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

    public function deleteUser($id){
        if (DB::table("users")->select("accreditation")->where("id", "=", $id)->get()->first()->accreditation == 1 &&
            DB::table("users")->select(DB::raw('count(*) as count'))->where("accreditation", "=", "1")->first()->count == 1){
            return $this->error(true, "vous ne pouvez pas supporimer le dernier administrateur du site");
        }
        DB::table("users")->where("id", $id)->delete();
        return redirect()->back();
    }

    public function ajoutView(){
       $accred = $this->getAccreditation();
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
       return view("user/user_ajout", ['accreditations' => $accred, "user" => $user]);
    }

    public function ajout(Request $request){

        if (strcmp($request->input("password"), $request->input("password-confirm")) != 0)
            return $this->error(true,'les deux mots de passe ne correspondent pas');
        if (strlen($request->input("password")) <= 6)
            return $this->error(true,'Le mot de passe doit faire plus de 6 caractères');
        foreach (DB::table("users")->select("email")->get() as $mails){
            foreach ($mails as $mail)
                if (strcmp($mail, $request->input("email")) == 0)
                    return $this->error(true,'Ce mail correspond déjà à un utilisateur');
        }
        DB::table("users")->insert([
           'name' => $request->input("name"),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
           'accreditation' => $request->input('souche'),
       ]);

       return redirect()->back();
    }

    public function logOut(){
       Auth::logout();
       return redirect()->route('login');
    }

    public function showUser(){
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
        return view("user/user_liste", ["users" => $this->getUsers(), "user" => $user, "accreditations" => $this->getAccreditation()]);
    }

    public function profilUserView($id){
        //TODO : if ($id == User->id)
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
        return view("user/user_profil", ["userss" => $this->getUsers($id), "user" => $user, "accreditations" => $this->getAccreditation()]);
    }
    public function profilUser(Request $request){
        //TODO : if ($id == User->id)
        DB::table("users")->where("id", $request->input("id"))->update($request->input('user'));
        if ($request->input("password-old") != "" &&
            $request->input("password") != "" &&
            strcmp($request->input("password"), $request->input("password-confirm")) == 0)
            DB::table("users")->where("id", $request->input("id"))->update(["password" => Hash::make($request->input('password'))]);

        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();

        return view("user/user_profil", ["userss" => $this->getUsers($request->input("id")),"user" => $user, "accreditations" => $this->getAccreditation()]);
    }

    public function majUser(Request $request){
        foreach ($request->input("user") as $id => $data){
            DB::table("users")->where("id", $id)->update($data);
        }
        return redirect()->back();
    }

    public function recoverPasswordView($id){
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
        return view("user/user_password", ["users" => $this->getUsers($id), "user" => $user]);
    }
    public function recoverPassword($id, Request $request){
        if (strcmp($request->input("password"), $request->input("password-confirm")) != 0 && strlen($request->input("password")) <= 6)
            return $this->error(true,'les deux mots de passe ne correspondent pas');
        DB::table("users")->where("id", $id)->update(["password" => Hash::make($request->input('password'))]);

        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();

        return view("user/user_liste", ["users" => $this->getUsers(), "user" => $user, "accreditations" => $this->getAccreditation()]);
    }

    ////////////////////////////
    ///////ACCREDITATION////////
    ////////////////////////////
    private function getAccreditation($id=null){
       if($id!=null){
           $accred['accreditation'] = DB::table('accreditation')->select()->where('id', "=", $id)->get();
       }else{
           $accred['accreditation'] = DB::table('accreditation')->select()->get();
       }
       return $accred;
    }

    public function accreditation(){
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
       return view("user/user_accreditation", ['accreditations' => $this->getAccreditation(), "user" => $user]);
    }

    public function ajoutAccreditation(Request $request){
       DB::table("accreditation")->insert($request->input("accreditation"));
       return redirect()->back();
    }

    public function deleteAccreditation(Request $request){
        if ($request->input("id_accred") != 1)
            DB::table("accreditation")->where("id", $request->input("id_accred"))->delete();
        return redirect()->back();
    }

    public function majAccreditation(Request $request){
        foreach($request->input("accreditation") as $numero => $droit){
            DB::table("accreditation")->where("id", $numero)->update($droit);
        }
        return redirect()->back();
    }
}
