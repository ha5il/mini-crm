<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $langToSet = session()->get('lang', 'en');

        if (!in_array($langToSet, ['en', 'np'])) {
            $langToSet = 'en';
        }

        App::setLocale($langToSet);

        return $next($request);
    }
}
