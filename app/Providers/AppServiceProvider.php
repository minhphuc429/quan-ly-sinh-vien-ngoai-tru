<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/*use Illuminate\Support\Facades\Schema;*/

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // fix Laravel 5.4: Specified key was too long error
        /*Schema::defaultStringLength(191);*/
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
