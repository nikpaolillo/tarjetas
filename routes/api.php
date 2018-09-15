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

Route::post('/operadoras',"ApiController@operadoras")->name("api.operadoras");
Route::post('/login',"ApiController@ingresar")->name("api.ingresar");
Route::post('/new-modelos',"ApiController@nuevasTarjetas")->name("api.new-modelos");