<?php

namespace App\Http\Middleware;

use \App\Library\SentryUtils;
use Closure;
use Illuminate\Support\Facades\Auth;

class CasLogin
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
      if( ! cas()->checkAuthentication() )
      {
        if ($request->ajax()) {
          return response('Unauthorized.', 401);
        }
        cas()->authenticate();
      }

      if (!Auth::check()) {

        session()->put('cas_user',  cas()->user());

        $user = \App\User::firstOrCreate(['username'=>cas()->user()]);

        $sentry = new SentryUtils($user);
        $user->last_name = $sentry->getLastName();
        $user->first_name = $sentry->getFirstName();
        $user->email = $sentry->getEmail();
        $user->save();

        Auth::login($user);

      }



      return $next($request);
    }
}
