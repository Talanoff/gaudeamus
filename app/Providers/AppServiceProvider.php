<?php

namespace App\Providers;

use App\Models\Common\Setting;
use App\Services\Navigation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
		Schema::defaultStringLength(191);

        app()->singleton('settings', function () {
            return Setting::whereNotNull('value')->get()->groupBy('type');
        });

        app()->singleton('nav', function() {
            return new Navigation();
        });
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
