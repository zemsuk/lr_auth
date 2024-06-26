<?php

namespace Zems\LrAuth;

use Illuminate\Support\ServiceProvider;

class LrAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->LoadViewsFrom(__DIR__.'/views', 'lr_auth');
        $this->app->singleton(ZemsAuth::class, function(){
            return new ZemsAuth();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Route.php');
        $this->publishes([
            __DIR__.'/../assets' => public_path('/'),
        ], 'public');
        $this->app->singleton('command.mycommand', function () {
            return "@php artisan vendor:publish --tag=public --force";
        });
        //php artisan vendor:publish --tag=public --force
    }
}
