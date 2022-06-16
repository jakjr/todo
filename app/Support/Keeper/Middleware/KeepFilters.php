<?php

namespace App\Support\Keeper\Middleware;

use Closure;
use Illuminate\Support\Arr;

class KeepFilters
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $keeper = \App::make('keeper');

        $keeper->keep(
            $request->except('_method', '_token')
        );

        //Re-iniciando a paginação, quando houver uma nova filtragem
        if ($keeper->has('page')) {
            $keeper->keep(['page' => 1]);
        }

        return $next($request);
    }
}
