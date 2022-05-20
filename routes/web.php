<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get
(
    'admin/dashbord', function()
    {
        return view('dashbord');
    }
);


Route::get('/admin/fiche_sortie/{id}','WebController@FicheSortie');
Route::get('/admin/FicheDeVie/{id}','WebController@FicheDeVie');
Route::get('/admin/DetailBonDeCommande/{ref_breference_BC}','WebController@DetailBonDeCommande');
Route::get('/admin/DetailBonDeLivraison/{ref_BL}','WebController@DetailBonDeLivraison');
Route::get('/admin/facture/{reference_facture}','WebController@Facture');
Route::get('/admin/inventaire/{id_service}','WebController@inventaire');
//reclamation
Route::post("/addReclamation", "WebController@addReclamation");
Route::get('admin/addReclamation','WebController@getViewAddReclamation');
//demande 
Route::post("/demandeAchat", "WebController@demandeAchat");
Route::get('admin/demandeAchat','WebController@getViewAddDemandeAchat');

Route::get('/admin/getConnectedUser','WebController@getConnectedUser');
Route::get('/admin/displayhistory/{reference}', 'WebController@displayhistory');
//Route::get('/admin/dashboards','WebController@HELLO');
