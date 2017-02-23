<?php

Route::group([
        'middleware' => ['web', 'laralum.base', 'laralum.auth'],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Permissions\Controllers',
        'as' => 'laralum::'
    ], function () {
        Route::get('/test', function() {
            Laralum\Users\Models\User::first()->notify(new Laralum\Notifications\Notifications\MessageNotification('Hey bois'));
        });
        Route::resource('notifications', 'PermissionController', ['only' => ['show', 'create', 'delete']]);
});
