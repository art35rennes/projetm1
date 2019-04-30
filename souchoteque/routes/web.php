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


    //View
        Route::get('/souche/{ref}', 'SoucheController@show');
        Route::get('/souche/{ref}/dump', 'SoucheController@dump');
        Route::post('/souche/{ref}/majajax', 'SoucheAjaxController@update');

        //Update
        Route::post('/souche/{ref}/maj', 'SoucheController@update');

        //Delete
        Route::post('/souche/{ref}/suppr', 'SoucheController@suppr');

        //TestArea
        Route::get('/poc', 'SoucheController@poc');

    //UserController
        Route::get('/user/ajout', 'UserController@ajoutView');
        Route::get('/user/accreditation', 'UserController@accreditation');
        Route::get('/user/liste', "UserController@showUser");

        Route::post('/user/ajout', 'UserController@ajout');
        Route::get('/user/logout', 'UserController@logOut');

        Route::post('/user/accreditation/ajout', 'UserController@ajoutAccreditation');
        Route::post('/user/accreditation/delete', 'UserController@deleteAccreditation');
        Route::post('/user/accreditation/maj', 'UserController@majAccreditation');
});

//AuthController
    Auth::routes();

