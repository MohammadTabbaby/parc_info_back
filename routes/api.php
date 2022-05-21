<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test','WebController@test');
Route::post('/verifReferenceReparationExterne','WebController@verifReferenceReparationExterne');
Route::post('/verifReferenceEquipements','WebController@verifReferenceEquipements');
Route::post('/verifReferenceBondeLivraison','WebController@verifReferenceBondeLivraison');
Route::post('/verifReferenceBondeCommande','WebController@verifReferenceBondeCommande');
Route::post('/verifReferenceDevis','WebController@verifReferenceDevis');
Route::post('/verifReferencePieceDeRechange','WebController@verifReferencePieceDeRechange');
Route::post('/verifReferenceFacture','WebController@verifReferenceFacture');
Route::post('/VerifDetailBondecommande','WebController@VerifDetailBondecommande');
Route::post('/VerifDetailBondeLivraison','WebController@VerifDetailBondeLivraison');
Route::post('/VerifDetailFacture','WebController@VerifDetailFacture');
//api test
Route::get('/testApi/{id}','WebController@testApi');
Route::get('/getEquipementByRefBonCommande/{ref_breference_BC}','WebController@getEquipementByRefBonCommande');
Route::get('/getEquipementByRefBonLivraison/{ref_BL}','WebController@getEquipementByRefBonLivraison');
Route::get('/getDetailFacture/{reference_facture}','WebController@getDetailFacture');
Route::get('/getEquipmentService/{id_service}','WebController@getEquipmentService');
Route::get('/getConnectedUser','WebController@getConnectedUser');
Route::get('/gethistory/{reference}', 'WebController@gethistory');
Route::get('/getReclamationByUser/{idUser}', 'WebController@getReclamationByUser');
Route::get('/getDemandeByUser/{idUser}', 'WebController@getDemandeByUser');
//api pour la partie front reactjs
Route::get('/getAllService','ApiController@getAllService');
Route::get('/AboutUs','ApiController@AboutUs');
Route::post('/ContactUs','ApiController@ContactUs');
Route::get('/getAmortissementOfAllServices','WebController@getAmortissementOfAllServices');
//dashboard
//Route::get('Widgets/run','Equipement@run');
Route::get('/UpdateEtatReparationExterne','WebController@UpdateEtatReparationExterne');
Route::get('/run','WebController@run');
Route::get('/getReclamationsEnattente','WebController@getReclamationsEnattente');
Route::get('/getBesoinsEnattente','WebController@getBesoinsEnattente');
Route::get('/getCountForEachCategorie','WebController@getCountForEachCategorie');
Route::get('/getUsedPiece','WebController@getUsedPiece');



