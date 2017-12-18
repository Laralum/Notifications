<?php

return [
    [
        'text'    => __('laralum_notifications::general.my_notifications'),
        'url'     => route('laralum::notifications.index'),
        'counter' => Laralum\Users\Models\User::findOrFail(Auth::id())->unreadNotifications->count(),
    ],
    [
        'text'       => __('laralum_notifications::general.create_notification'),
        'url'        => route('laralum::notifications.create'),
        'permission' => 'laralum::notifications.create',
    ],
];
