<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLoginMiddleware
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
        if (Auth::user()) {
            $user = Auth::user();
            if ($user->role == 0) {
                return $next($request);
            } else {
                return redirect()->route('get.login.front');
            }
        }
        return redirect()->route('get.login.front');
    }
}
