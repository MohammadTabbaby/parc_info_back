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

Route::get('/admin/fiche_sortie/{id}','WebController@FicheSortie');
Route::get('/admin/DetailBonDeCommande','WebController@DetailBonDeCommande');
