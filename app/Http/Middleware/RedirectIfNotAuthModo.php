<?php

namespace App\Http\Middleware;

use Closure;
use App\ForumForum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\ForumTopic;
use App\ForumPost;
class RedirectIfNotAuthModo {

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
                if ($forum->getPermissionModerer() == 1) {

                    return $next($request);
                }
                if (Auth::user() != NULL) {
                    if (Auth::user()->rang()->first()->getId() >= $forum->getPermissionModerer()) {

                        return $next($request);
                    }
                }
            }
            if ($urlArray[$i] == 'topic' && $urlArray[$i+2] == 'edit') {
                $topic = ForumTopic::findOrFail($urlArray[$i + 1]);
                if (Auth::user() != NULL) {
                    if (Auth::user()->getId() == $topic->createur()->first()->getId()) {

                        return $next($request);
                    }
                }
            }
            if ($urlArray[$i] == 'post' && $urlArray[$i+2] == 'edit') {
                $post = ForumPost::findOrFail($urlArray[$i + 1]);
                if (Auth::user() != NULL) {
                    if (Auth::user()->getId() == $post->createur()->first()->getId()) {

                        return $next($request);
                    }
                }
            }
        }
        return new RedirectResponse(url('/forum/' . $forum->getId() . '/topic'));
    }
}
