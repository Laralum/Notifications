<?php

namespace Laralum\Notifications\Traits;

use Illuminate\Notifications\HasDatabaseNotifications;
use Laralum\Notifications\DatabaseNotification;
use Laralum\Notifications\Models\Notification;

trait HasLaralumNotifications
{
    use HasDatabaseNotifications;

    /**
     * Get the entity's notifications.
     */
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')
                            ->orderBy('created_at', 'desc');
    }

}
