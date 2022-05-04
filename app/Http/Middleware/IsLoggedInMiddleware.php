<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sessionData =   Session::get('userData');
        //echo $sessionData['email'];
        //dd($sessionData);
        if(!isset($sessionData['email'])){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
