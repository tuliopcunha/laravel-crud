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

Route::get("client", "ClientsController@findBy");
Route::post("client", "ClientsController@save");
Route::put("client", "ClientsController@update");
Route::delete("client/{id}", "ClientsController@destroy");

Route::get("product", "ProductsController@findBy");
Route::post("product", "ProductsController@save");
Route::put("product", "ProductsController@update");
Route::delete("product/{id}", "ProductsController@destroy");
