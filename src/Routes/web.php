<?php

Route::group([
        'middleware' => [
            'web', 'laralum.base', 'laralum.auth',
        ],
        'prefix'    => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Notifications\Controllers',
        'as'        => 'laralum::',
    ], function () {
        Route::post('notifications/settings', 'NotificationsController@settings')->name('notifications.settings.update');
        Route::resource('notifications', 'NotificationsController', ['only' => ['index', 'show', 'create', 'store']]);
    });

    Route::group([
            'middleware' => [
                'web', 'laralum.base',
            ],
            'prefix'    => '/',
            'namespace' => 'Laralum\Notifications\Controllers',
            'as'        => 'laralum_public::',
        ], function () {
            Route::resource('notifications', 'PublicController', ['only' => ['index', 'show']]);
        });
