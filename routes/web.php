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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/{id}', 'IndexController@index');

Route::get('/insert','InsertController@form');
Route::post('/insert/process','InsertController@process');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload', 'HomeController@upload');

Route::get('/regist/restaurant','HomeController@insertRestaurant');
Route::post('/regist/restaurant/insert','HomeController@registerRestaurant');

Route::get('/regist/foods','HomeController@insertFoods');
Route::post('/regist/foods/insert','HomeController@registerFoods');
