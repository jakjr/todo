<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->booted(function () {
            View::share(
                'config', json_encode([
                    'layout' => [
                        'app_title1' => config('layout.appTitle1'),
                        'app_title2' => config('layout.appTitle2'),
                        'app_title3' => config('layout.appTitle3'),
                        'logo' => config('layout.appLogo'),
                    ],
                    'app' => [
                        'env' => config('app.env'),
                        'name' => config('app.name'),
                    ],
                ])
            );

            View::share(
                'auth', json_encode([
                    'user' => Auth::check() ? [
                        'id' => Auth::user()->id,
                        'nome' => Auth::user()->nome,
                        'email' => Auth::user()->email
                    ] : null
                ])
            );

            /**
             * Para o Menu:
             * @see RouteServiceProvider::register()
             */

        });
    }
}
