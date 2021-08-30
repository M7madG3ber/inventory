<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{vue_capture?}', function ($id) {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');