<?php

namespace App\Providers;

use App\Services\Utils\BarcodeUtils;
use App\Services\Utils\ViewUtils;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ViewUtils::class, function (Application $app) {
            return new ViewUtils();
        });

        $this->app->singleton(BarcodeUtils::class, function (Application $app) {
            return new BarcodeUtils();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
