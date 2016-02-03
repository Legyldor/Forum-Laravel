<?php

namespace App\Http\Middleware;

use Closure;
use App\ForumForum;
use App\ForumTopic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RedirectIfNotAuthPost {

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
            }
            if ($urlArray[$i] == 'topic') {
                $topic = ForumTopic::findOrFail($urlArray[$i + 1]);
                
                if ($topic->getVerrouille() == 1) {
                    return new RedirectResponse(url('/forum/' . $forum->getId() . '/topic'));
                }
                if ($forum->getPermissionPost() == 1) {

                    return $next($request);
                }
                if (Auth::user() != NULL) {
                    if (Auth::user()->rang()->first()->getId() >= $forum->getPermissionPost()) {

                        return $next($request);
                    }
                }
            }
        }
        return new RedirectResponse(url('/forum/' . $forum->getId() . '/topic'));
    }

}
