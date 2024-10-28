<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Passport::ignoreRoutes();


        Passport::tokensCan([
            'view-user' => 'View user information',
            'manage-user' => 'Manage user information',
        ]);

        Passport::setDefaultScope(['view-user']);
    }
}
