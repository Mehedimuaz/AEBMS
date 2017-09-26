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
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('storeUserData', 'ConsumptionController@store');
Route::get('getUserData', 'ConsumptionController@retrieve');
Route::get('getUserStat/{date}/{user_id}', 'ConsumptionController@retrieveStat');
Route::get('getUserStatDate/{date}/{user_id}', 'ConsumptionController@retrieveStatDate');
Route::get('getUserSumDate/{user_id}', 'ConsumptionController@retrieveStatSum');
Route::get('/', 'ConsumptionController@index');
