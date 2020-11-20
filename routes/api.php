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


//list customers
Route::get('customers', 'CustomerController@index');
Route::get('customer/{id}', 'CustomerController@show');
Route::post('customer', 'CustomerController@store');
Route::put('customer', 'CustomerController@store');
Route::delete('customer/{id}', 'CustomerController@destroy');