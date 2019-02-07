<?php

namespace App\Providers;

use App\Models\Common\Setting;
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
        setlocale(LC_TIME, 'ru_RU.utf-8');
        Carbon::setLocale(app()->getLocale());

        View::composer(['app.*', 'auth.*'], function () {
            $settings = Setting::query()->get()->groupBy('type');
            View::share('phones', optional(['phones'])->toArray());
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
