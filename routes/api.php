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
| Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/




    Route::post('login', 'APIController@login');
    Route::post('register', 'APIController@register');

    Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'APIController@logout');
    Route::post('cadastrar','imovelController@Cadastrar');
    Route::get('listar','imovelController@Listar');
    Route::get('buscar/{cpf}','imovelController@Consultar');
    Route::put('editar/{id}','imovelController@Editar');

   
});
