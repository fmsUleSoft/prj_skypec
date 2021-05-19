<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('api/login/{id}/{pw}', function(){
	return "OK";
});

Route::group(['middleware' => ['auth:api']], function()
{
    // Lấy danh sách sản phẩm
	Route::get('test', function(){
		return "OK";
	});
});