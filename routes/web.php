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
Route::post('/store', 'PlayerController@store')->name('store');
Route::get('/edit/{player}', 'PlayerController@edit')->name('edit');
Route::put('/update/{player}', 'PlayerController@update')->name('update');
Route::delete('/delete/{player}', 'PlayerController@destroy')->name('delete');
