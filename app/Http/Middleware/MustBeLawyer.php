<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Middleware\Authenticate;

class MustBeLawyer
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
        if($request->user() && $request->user()->isLawyer())
        {
            return $next($request);
 
        }else{
            return redirect('/');
        }
    }
}
