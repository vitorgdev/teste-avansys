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

Route::get('operators','App\Http\Controllers\OperatorController@index');
Route::group(['prefix'=> 'operator'],function (){
    Route::post('/add','App\Http\Controllers\OperatorController@addOperator');
    Route::get('/find/{id}', 'App\Http\Controllers\OperatorController@findOperator');
    Route::put('/update/{id}','App\Http\Controllers\OperatorController@update');
    Route::post('/disable/$id','App\Http\Controllers\OperatorController@disable');
    Route::delete('delete/{id}','App\Http\Controllers\OperatorController@destroy');
});
