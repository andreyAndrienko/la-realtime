<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/', 'welcome');

Route::view('home', 'home')->name('home')->middleware('auth');

Route::post('message', 'MessagesController@store')->middleware('auth');
