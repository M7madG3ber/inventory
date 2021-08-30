<?php

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {

    Route::post('register', [
        'as'    => 'register',
        'uses'  => 'AuthController@register'
    ]);

    Route::post('login', [
        'as'    => 'login',
        'uses'  => 'AuthController@login'
    ]);

    Route::post('logout', [
        'as'    => 'logout',
        'uses'  => 'AuthController@logout'
    ]);

    Route::post('refresh', [
        'as'    => 'refresh',
        'uses'  => 'AuthController@refresh'
    ]);

    Route::post('me', [
        'as'    => 'me',
        'uses'  => 'AuthController@me'
    ]);
});