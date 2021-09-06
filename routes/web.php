<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{vue_capture?}', function ($id) {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');