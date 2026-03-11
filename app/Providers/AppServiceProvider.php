<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\Social;
use App\Models\About;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $socials = Social::all();
            $view->with('socials', $socials);
        });

        view()->composer('*', function ($view) {
            $logo = About::first();
            $view->with('logo', $logo);
        });

        Schema::defaultStringLength(191);
        if( env('APP_NAME') != "Laravel") 
            URL::forceScheme('https'); 
    }
}
