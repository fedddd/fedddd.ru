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


Route::get('/dnevnik/{month}/{year}', ['as' => 'apiDnevnik', 'uses' => 'ApiDnevnikController@getData'])->where(['month' => '[0-9]{1,2}','year'=>'[0-9]{4}']);
Route::get('/dnevnik/day/{data}', ['as' => 'apiDnevnik', 'uses' => 'ApiDnevnikController@getDay'])->where(['data' => '[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}']);
