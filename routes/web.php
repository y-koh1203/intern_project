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

Route::get('/', 'IndexController@index');
Route::get('/japanese', 'IndexController@sortJapanese');
Route::get('/western', 'IndexController@sortWestern');
Route::get('/chinese', 'IndexController@sortChinese');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/delete/foods','HomeController@deleteFoods');
Route::post('/delete/foods/exec','HomeController@execDelete');

Route::get('/regist/restaurant','HomeController@insertRestaurant');
Route::post('/regist/restaurant/insert','HomeController@registerRestaurant');

Route::get('/regist/foods','HomeController@insertFoods');
Route::post('/regist/foods/insert','HomeController@registerFoods');