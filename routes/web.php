<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::group(['prefix' => 'dnevnik'], function(){	
	Route::get('/{any?}', ['as' => 'dnevnik', 'uses' => 'DnevnikController@getDay'])->where('any', '.*');
});	


Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

Route::get('/home', function(){return view('home');});

Route::group(['prefix' => 'admin'], function(){

   Route::get('/insert', ['as' => 'Insert', 'middleware' =>'auth', 'uses' => 'admin\InsertController@insertPost']);
   Route::post('/insert', ['as' => 'Insert', 'middleware'=>'auth', 'uses' => 'admin\InsertController@insertPost']);
   Route::get('/update/{id}', ['as' => 'update', 'middleware' =>'auth', 'uses' => 'admin\InsertController@updatePost'])->where(['id' => '[0-9]+']);
   Route::post('/update/{id}', ['as' => 'update', 'middleware'=>'auth', 'uses' => 'admin\InsertController@updatePost'])->where(['id' => '[0-9]+']);
  Route::get('/dnevnik', ['as' => 'dnevnikAdmin', 'middleware'=>'auth', 'uses' => 'admin\DnevnikAdminController@getDnevnikAdmin']);
   
  Route::auth(); 
      
});

Route::group(['prefix' => 'post'], function(){
Route::get('/{tema}', ['as' => 'Tema', 'uses' => 'PostController@Tema'])->where('tema', '[a-z]+');
Route::get('/{tema}/{podtema}', ['as' => 'Podtema', 'uses' => 'PostController@Podtema'])->where(['tema' => '[a-z]+', 'podtema' => '[a-z]+']);
Route::get('/{tema}/{podtema}/{id}', ['as' => 'posts', 'uses' => 'PostController@Post'])->where(['tema' => '[a-z]+', 'podtema' => '[a-z]+', 'id' => '[0-9]+']);
Route::get('/{tema}/{id}', ['as' => 'posts', 'uses' => 'PostController@Post'])->where(['tema' => '[a-z]+', 'id' => '[0-9]+']);

});





//Auth::routes();
//Route::auth();




