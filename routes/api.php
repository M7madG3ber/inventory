<?php

Route::group(['middleware' => 'api'], function () {

    Route::prefix('auth')->group(function () {

        Route::post('login', [
            'as'    => 'login',
            'uses'  => 'AuthController@login'
        ]);

        Route::post('logout', [
            'as'    => 'logout',
            'uses'  => 'AuthController@logout'
        ]);
    });

    Route::get('home/info', [
        'as'    => 'home.info',
        'uses'  => 'Api\HomeController@index'
    ]);

    Route::resource('employees', 'Api\EmployeeController');
});