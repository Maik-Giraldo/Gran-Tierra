<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
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

      if (Auth::user()->Tipo != 11) {
          return redirect('/home');
      }
        return $next($request);
    }
}
