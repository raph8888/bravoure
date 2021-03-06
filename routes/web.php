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


Route::get('bravoure', 'Bravoure@index');

Route::get('albelli', 'Albelli@index');
Route::post('sendform', 'Albelli@form');

Route::get('messagebird', 'TextMessaging@index');
Route::post('sendsms', 'TextMessaging@sms');
