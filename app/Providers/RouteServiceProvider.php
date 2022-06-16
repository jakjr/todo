<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    public function register()
    {
        parent::register();

        /**
         * O compartilhamento do menu ocorre neste ServiceProvider pois,
         * para utilizar as named routes dentro do arquivo menu.php, é necessário que este ServiceProvider
         * esteja inicializado.
         */
        $this->booted(function () {
            $menu = collect(include_once(app_path('menu.php')));

            $filtered = $menu->filter(function ($item) {
                return (isset($item['can']) && ($item['can']));
            });

            foreach ($filtered as $k => $menu) {
                if (!isset($menu['subitems'])) {
                    continue;
                }

                $subitems = [];
                foreach ($menu['subitems'] as $subitem) {
                    if (isset($subitem['can']) && ($subitem['can'])) {
                        $subitems[] = $subitem;
                    }
                }

                $menu['subitems'] = $subitems;

                $filtered->put($k, $menu);
            }

            //dd($filtered);

            View::share(
                'menu', json_encode(
                    $filtered->toArray()
                )
            );
        });
    }
}
