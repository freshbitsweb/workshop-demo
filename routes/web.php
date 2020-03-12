<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'PlayerController@index')->name('home');
    Route::view('/insert', 'create')->name('insert');
    Route::post('/store', 'PlayerController@store')->name('store');
    Route::get('/edit/{player}', 'PlayerController@edit')->name('edit');
    Route::put('/update/{player}', 'PlayerController@update')->name('update');
    Route::delete('/delete/{player}', 'PlayerController@destroy')->name('delete');
    Route::get('/file/{fileName}', 'PlayerController@getFileName')->name('file_name');
});
