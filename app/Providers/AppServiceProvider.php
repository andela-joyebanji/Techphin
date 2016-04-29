<?php

namespace Pyjac\Techphin\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * This forces links to https in production.
         *
         * Reference: http://www.jeffmould.com/2016/01/31/laravel-5-2-forcing-https-routes-when-using-ssl/
         */
        if (!\App::environment('local')) {
              \URL::forceSchema('https');
         }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
