<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ApiAuthenticate
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
      if(!$request->header("auth-token")){
        return \Response::json([
          "code" => 401,
          "message" => "You must be logged in to continue.",
        ], 401);
      }else{
        // be sure to check the fucking token
        return $next($request);
      }
    }
}
