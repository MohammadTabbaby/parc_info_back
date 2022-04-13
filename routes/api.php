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
//api test
Route::get('/testApi/{id}','WebController@testApi');
Route::get('/getEquipementByRefBonCommande/{ref_breference_BC}','WebController@getEquipementByRefBonCommande');
Route::get('/getEquipementByRefBonLivraison/{ref_BL}','WebController@getEquipementByRefBonLivraison');
Route::get('/getDetailFacture/{reference_facture}','WebController@getDetailFacture');

