<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Empeche l'utilisation des routes si l'utilisateur n'est pas connecté
Route::group(['middleware' => ['auth']], function() {
    //HomeController

        Route::get('/', 'HomeController@show');
        Route::get('/home', 'HomeController@show');

    //SoucheController

        //Add
        Route::get('/souche/ajout', 'SoucheController@ajout');
        Route::post('/souche/ajout', 'SoucheController@ajoutPost');
        Route::post('/souche/ajout', 'SoucheController@ajoutPost');


        //historique
        Route::get('/historique/', "HistoriqueControlleur@show");

    //View
        Route::get('/souche/{ref}', 'SoucheController@show');
        Route::get('/souche/{ref}/dump', 'SoucheController@dump');

        //Update
        Route::post('/souche/{ref}/maj', 'SoucheController@update');
        Route::post('/souche/{ref}/update', 'SoucheAjaxController@update');

        //Delete
        Route::post('/souche/{ref}/suppr', 'SoucheAjaxController@suppr');
        Route::post('/souche/{ref}/suppr/file', 'SoucheAjaxController@supprFile');

        //TestArea
        Route::get('/poc', 'SoucheController@poc');

        //UserController
        Route::get('/user/ajout', 'UserController@ajoutView');
        Route::get('/user/accreditation', 'UserController@accreditation');
        Route::get('/user/liste', "UserController@showUser");
        Route::get('/user/profil/{id}', "UserController@profilUserView");
        Route::post('/user/profil', "UserController@profilUser");


        Route::post('/user/ajout', 'UserController@ajout');
        Route::post('/user/maj', 'UserController@majUser');
        Route::get('/user/suppr/{id}', 'UserController@deleteUser');
        Route::get('/user/logout', 'UserController@logOut');

        Route::get('/user/recoverpassword/{id}', 'UserController@recoverPasswordView');
        Route::post('/user/recoverpassword/{id}', 'UserController@recoverPassword');

        Route::post('/user/accreditation/ajout', 'UserController@ajoutAccreditation');
        Route::post('/user/accreditation/delete', 'UserController@deleteAccreditation');
        Route::post('/user/accreditation/maj', 'UserController@majAccreditation');
});

//AuthController
    Auth::routes();

