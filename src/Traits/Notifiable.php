<?php

namespace Laralum\Notifications\Traits;

use Illuminate\Notifications\RoutesNotifications;

trait Notifiable
{
    use HasLaralumNotifications, RoutesNotifications;
}
