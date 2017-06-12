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

            if ($user->role == config('settings.role_user')) {
                return $next($request);
            }
        }

        return redirect()->action('Front\LoginController@getLogin');
    }
}
