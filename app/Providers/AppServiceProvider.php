<?php

namespace App\Providers;

use App\Helpers\Blackwolf;
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
        //
        $this->app['view']->directive('auto_version', function ($expression, $compiler) {
            return $compiler->wrap("echo autoVersionAsset('{$expression}')");
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
