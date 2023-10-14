<?php

namespace Zems\ZemsAuth;

use Illuminate\Support\ServiceProvider;

class ZemsAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->LoadViewsFrom(__DIR__.'/views', 'zems_auth');
        $this->app->singleton(AuthController::class, function(){
            return new AuthController();
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
