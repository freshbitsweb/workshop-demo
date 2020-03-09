<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/insert', 'PlayerController@insert')->name('insert');
Route::get('/store', 'PlayerController@store')->name('store');
Route::get('/edit', 'PlayerController@edit')->name('edit');
Route::get('/update', 'PlayerController@update')->name('update');
Route::get('/delete', 'PlayerController@destroy')->name('delete');
