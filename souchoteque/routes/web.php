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


//HomeController

Route::get('/', 'HomeController@show');
Route::get('/home', 'HomeController@show');

//SoucheController

//Add
Route::get('/souche/ajout', 'SoucheController@ajout');
Route::post('/souche/ajout', 'SoucheController@ajoutPost');

//View
Route::get('/souche/{ref}', 'SoucheController@show');
Route::get('/souche/{ref}/dump', 'SoucheController@dump');
Route::get('/souche/{ref}/dd', 'SoucheController@dd');

//Update
Route::post('/souche/{ref}', 'SoucheController@update');

//Delete
Route::post('/souche/{ref}/suppr', 'SoucheController@suppr');