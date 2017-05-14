<?php

namespace Laralum\Notifications;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laralum\Notifications\Models\Notification;
use Laralum\Notifications\Models\Settings;
use Laralum\Notifications\Policies\NotificationsPolicy;
use Laralum\Notifications\Policies\SettingsPolicy;
use Laralum\Permissions\PermissionsChecker;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Notification::class => NotificationsPolicy::class,
        Settings::class     => SettingsPolicy::class,
    ];

    /**
     * The mandatory permissions for the module.
     *
     * @var array
     */
    protected $permissions = [
        [
            'name' => 'Create Notifications',
            'slug' => 'laralum::notifications.create',
            'desc' => 'Allows creating notifications',
        ],
        [
            'name' => 'Edit Notifications Settings',
            'slug' => 'laralum::notifications.settings',
            'desc' => 'Allows edititing the notification settings',
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadTranslationsFrom(__DIR__.'/Translations', 'laralum_notifications');

        $this->loadViewsFrom(__DIR__.'/Views', 'laralum_notifications');

        $this->publishes([
            __DIR__.'/Views/public' => resource_path('views/vendor/laralum_notifications/public'),
        ], 'laralum_notifications');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // Make sure the permissions are OK
        PermissionsChecker::check($this->permissions);
    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider.
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
