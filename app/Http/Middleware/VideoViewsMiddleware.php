<?php

namespace Pyjac\Techphin\Http\Middleware;

use Closure;

class VideoViewsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->video->incrementViews();

        return $next($request);
    }
}
