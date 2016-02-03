<?php

namespace App\Http\Middleware;

use Closure;
use App\ForumForum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class RedirectIfNotAuthTopic {

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
            if ($urlArray[$i] == 'forum') {
                $forum = ForumForum::findOrFail($urlArray[$i + 1]);
                if ($forum->getPermissionTopic() == 1) {

                    return $next($request);
                }
                if (Auth::user() != NULL) {
                    if (Auth::user()->rang()->first()->getId() >= $forum->getPermissionTopic()) {

                        return $next($request);
                    }
                }
            }
        }
        return new RedirectResponse(url('/forum/'.$forum->getId().'/topic'));
    }

}
