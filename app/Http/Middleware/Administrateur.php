<?php

namespace App\Http\Middleware;

use Closure;

class Administrateur {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($request->user()->getRang() == 3) {
            return new RedirectResponse(url('/home'));
        }
        return $next($request);
    }

}
