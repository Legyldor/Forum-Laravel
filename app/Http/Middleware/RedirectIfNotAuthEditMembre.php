<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class RedirectIfNotAuthEditMembre {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $urlArray = explode('/', $request->url());
        for ($i = 0; $i < count($urlArray); $i++) {
            if ($urlArray[$i] == 'membre') {
                $membre = User::findOrFail($urlArray[$i + 1]);
                if (Auth::user() != NULL) {
                    if (Auth::user()->getId() == $membre->getId()) {
                        return $next($request);
                    }
                }
            }
        }
        return new RedirectResponse(url('/forum'));
    }

}
