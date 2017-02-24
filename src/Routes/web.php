<?php

Route::group([
        'middleware' => [
            'web', 'laralum.base', 'laralum.auth',
            'can:access,Laralum\Notifications\Models\Notification',
        ],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Notifications\Controllers',
        'as' => 'laralum::'
    ], function () {
        Route::resource('notifications', 'NotificationsController', ['only' => ['index', 'show', 'create', 'store']]);
});
