<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   public function ajoutView(){
       return view("user/user_ajout");
   }

   public function profil($user){

   }

   public function maj($user){

   }

   public function accreditation(){
       return view("user/user_accreditation");
   }
}
