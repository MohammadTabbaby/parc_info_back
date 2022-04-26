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

Route::get('/admin/fiche_de_vie/',function()
{
        return view('fiche_de_vie');
});

Route::get
(
    'admin/login1', function()
    {
        return view('login1');
    }
);


Route::get('/admin/fiche_sortie/{id}','WebController@FicheSortie');
//Route::get('/admin/DetailBonDeCommande','WebController@DetailBonDeCommande');
Route::get('/admin/DetailBonDeCommande/{ref_breference_BC}','WebController@DetailBonDeCommande');
Route::get('/admin/DetailBonDeLivraison/{ref_BL}','WebController@DetailBonDeLivraison');
Route::get('/admin/facture/{reference_facture}','WebController@Facture');
Route::get('/admin/inventaire/{id_service}','WebController@inventaire');
Route::post("/addReclamation", "WebController@addReclamation");
Route::get('admin/addReclamation','WebController@getViewAddReclamation');
Route::get('/admin/getConnectedUser','WebController@getConnectedUser');