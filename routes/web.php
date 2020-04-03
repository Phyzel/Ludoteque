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

Route::get('/', 'AcceuilController@index')->name('acceuil');;

Route::get('contact', 'ContactController@index');
Route::post('contact-ok', 'ContactController@send');

//Route::get('/search/', 'SearchController@index')->name('search');
//Route::post('/game/', 'GameController@index')->name(npm'games');
Route::post('/game', 'GameController@index')->name('games');
Route::post('/game/addGame', 'GameCollection@add')->name('addCollection');

Route::get('/test/{id}', function($id){
	echo 'Test ';
	echo "$id";
});

Route::get('/cars', 'CarsController@index')->name('cars');
Route::post('/cars-insert', 'CarsController@insert')->name('cars-insert');
Route::get('/cars-update', 'CarsController@update')->name('cars-update');
Route::get('/cars-delete', 'CarsController@delete')->name('cars-delete');
