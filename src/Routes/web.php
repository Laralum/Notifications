<?php

Route::group([
        'middleware' => ['web', 'laralum.base', 'laralum.auth'],
        'prefix' => config('laralum.settings.base_url'),
        'namespace' => 'Laralum\Permissions\Controllers',
        'as' => 'laralum::'
    ], function () {
        Route::resource('notifications', 'PermissionController', ['only' => ['show', 'create', 'delete']]);
});
