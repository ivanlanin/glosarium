<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale(config('app.locale'));
    }

    /**
     * Register any application services.
     */
    public function register()
    {

    }
}
