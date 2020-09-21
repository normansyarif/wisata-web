<?php

use Illuminate\Http\Request;

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


Route::get('/getDestinasi/{id}', 'APIDetailContent@getDestinasi');
Route::get('/getHomestay/{id}', 'APIDetailContent@getHomestay');
Route::get('/getEvent/{id}', 'APIDetailContent@getEvent');
Route::get('/getSouvenir/{id}', 'APIDetailContent@getSouvenir');
Route::get('/getGuide/{id}', 'APIDetailContent@getGuide');
Route::get('/getArt/{id}', 'APIDetailContent@getArt');
Route::get('/getRM/{id}', 'APIDetailContent@getRM');
Route::get('/getTani/{id}', 'APIDetailContent@getTani');
Route::get('/getUMKM/{id}', 'APIDetailContent@getUMKM');
Route::get('/getKendaraan/{id}', 'APIDetailContent@getKendaraan');

Route::post('/rating', 'APISendMessage@rating');
Route::post('/kontakAdmin', 'APISendMessage@kontakAdmin');
