<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if (Auth::check()) {
            $user = Auth::user();
            //role == 1 xác thực quyền admin
            if ($user->role == config('settings.role_admin')) {
                return $next($request);
            }

            return redirect()->route('get.login.admin');
        }

        return redirect()->route('get.login.admin');
    }
}
