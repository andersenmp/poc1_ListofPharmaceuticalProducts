<?php

namespace App\Http\Middleware;

use \App\Library\SentryUtils;
use Closure;


class SentryGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $feature)
    {
      $user = auth()->user();
      $sentry = new SentryUtils($user);

      if($sentry->hasAccessToFeature($feature)){
        return $next($request);
      }else{
        return response('Unauthorized.', 401);
      }
      return $next($request);
    }
}
