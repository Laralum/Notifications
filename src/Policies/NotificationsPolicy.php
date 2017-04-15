<?php

namespace Laralum\Notifications\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Laralum\Notifications\Models\Notification;
use Laralum\Users\Models\User;

class NotificationsPolicy
{
    use HandlesAuthorization;

    /**
     * Filters the authoritzation.
     *
     * @param mixed $user
     * @param mixed $ability
     */
    public function before($user, $ability)
    {
        if (User::findOrFail($user->id)->superAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the current user can access notifications module.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function access($user)
    {
        return User::findOrFail($user->id)->hasPermission('laralum::notifications.access');
    }

    /**
     * Determine if the current user can view the notifications.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function view($user, Notification $notification)
    {
        $user = User::findOrFail($user->id);

        if (!$user->hasPermission('laralum::notifications.view')) {
            return false;
        }

        if ($notification->notifiable_id != $user->id) {
            return false;
        }

        return true;
    }

    /**
     * Determine if the current user can create notifications.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function create($user)
    {
        return User::findOrFail($user->id)->hasPermission('laralum::notifications.create');
    }
}
