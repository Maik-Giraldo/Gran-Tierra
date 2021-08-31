<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admincw
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
      if (Auth::guest()){
      return redirect('/login');
     }
      if (Auth::user()->role_id != 4) {
          return redirect('/home');
      }
        return $next($request);
    }
}
