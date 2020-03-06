<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (config('constants.site.env') == 'production') {
            URL::forceScheme('https');
        }

        Blade::directive('naira', function ($amount) {
            return "<?= '₦'. number_format($amount,2);?>";
        });
        Blade::directive('dollar', function ($amount) {
            return "<?= '$'. number_format($amount,2);?>";
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {

    }
}
