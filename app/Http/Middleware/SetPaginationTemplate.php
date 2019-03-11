<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Pagination\Paginator;

class SetPaginationTemplate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app('router')->currentRouteNamed('admin.*')) {
            Paginator::defaultView('vendor.pagination.admin');
            Paginator::defaultSimpleView('vendor.pagination.admin');
        }
        return $next($request);
    }
}
