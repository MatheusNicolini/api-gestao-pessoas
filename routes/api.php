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

Route::prefix('funcionarios')->group(function(){
    Route::get('/list', 'FuncionariosController@index');
    Route::get('/show/{id}', 'FuncionariosController@show');
    Route::post('/create', 'FuncionariosController@store');
    Route::post('/update/{id}', 'FuncionariosController@update');
    Route::post('/destroy/{id}', 'FuncionariosController@destroy');
});