<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
        if ($wanted = $request->get('lang')) {

            session()->put('lang', $wanted);

        } else {

            $wanted = session()->get('lang');
        }

        if (in_array($wanted, config('app.available_locales'))) {

            app()->setLocale($wanted);
        }

        return $next($request);
    }
}
