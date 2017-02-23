<?php

namespace Laralum\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'laralum_notifications');
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_notifications');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
