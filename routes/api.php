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
//api test
Route::get('/testApi/{id}','WebController@testApi');
Route::get('/getEquipementByRefBonCommande/{ref_breference_BC}','WebController@getEquipementByRefBonCommande'); //el postman yé5ou wa9t bech yet7al ? nn nn 
