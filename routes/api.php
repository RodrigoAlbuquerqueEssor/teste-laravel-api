<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request){
   return $request->user();
});


    Route::get("tasks", "TasksController@index" );
    Route::get("tasks/{task}", "TasksController@show" );
    Route::post("tasks", "TasksController@store" );
    Route::patch("tasks/{task}", "TasksController@update" );
    Route::delete("tasks/{task}", "TasksController@delete" );

Route::middleware(['jwt.auth'])->group(function (){
});

Route::post('login', 'AuthenticateController@authenticate')->name('login');
