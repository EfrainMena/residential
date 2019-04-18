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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
Route::resource('usuarios', 'UsersController');
Route::resource('usuarios', 'RolesController');
=======

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 7c627e312379ba8f3425959b2d64e879a0046062
