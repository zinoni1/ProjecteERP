<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('idioma')) {
            app()->setLocale($request->session()->get('idioma'));
        }

        return $next($request);
    }
}
