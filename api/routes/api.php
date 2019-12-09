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


Route::prefix('v1')->namespace('Api')->group(function(){

	//Realizar validacao de token
	Route::post('login', 'Auth\\LoginJwtController@login')->name('login');
	Route::get('logout', 'Auth\\LoginJwtController@logout')->name('logout');
	Route::get('refrest', 'Auth\\LoginJwtController@refrest')->name('refrest');

	//Realizar busca
	Route::get('/busca', 'EstadoBuscaController@index')->name('busca');

	//Validar token em endpoint
	Route::group(['middleware' => ['jwt.auth']], function(){

		//Endpoint para imoveis
		Route::name('imovel.')->group(function(){
			Route::resource('imovel', 'ImovelController');
		});

		//Endpoint para usuarios
		Route::name('users.')->group(function(){

			Route::post('users/buscaImoveis', 'UserController@buscaImoveis');
			
			Route::resource('users', 'UserController');
		});
	});
});
