<?php

namespace App\Support\Keeper;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class KeeperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('keeper', function ($app, $params) {
            $context = isset($params[0]) ? $params[0] : $app->request->path();

            return new Keeper($context, app('Illuminate\Session\Store'));
        });

        Paginator::currentPageResolver(function ($pageName = 'page') {

            $keeper = $this->app->make('keeper', [request()->path()]);

            if (request()->has($pageName)) {

                $currentPage = request()->input($pageName);

                //Persisto o pagina corrente
                $keeper->keep([$pageName => $currentPage]);

                return $currentPage;
            }

            //Utilizo o pagina persistida em algum momento anterior.
            $currentPage = $keeper->get($pageName);

            //Ou retorno 1
            return $currentPage ?: 1;
        });


        $this->app['router']->aliasMiddleware('keep.filters', Middleware\KeepFilters::class);
        $this->app['router']->aliasMiddleware('keeper', Middleware\KeepFilters::class);
    }
}
