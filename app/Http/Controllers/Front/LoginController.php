<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;

class LoginController extends Controller
{
    public function getLogin(Request $request)
    {
        $uri = $request->headers->get('referer');
        $request->session()->flash('uriback', $uri);

        if (is_null($request->user())) {
            return view('front.auth.login');
        }

        if ($request->user()->role == config('settings.role_user')) {
            return redirect()->action('Front\HomeController@index');
        }
    }

    public function postLogin(UserLoginRequest $request)
    {
        $data = $request->only('email', 'password');
        $data['role'] = config('settings.role_user');

        if (Auth::attempt($data)) {
            $value = $request->session()->get('uriback');

            if (is_null($value)) {
                return redirect()->action('Front\HomeController@index');
            }

            return redirect($value);
        }

        return redirect()->action('Front\LoginController@getLogin')->with('message', trans('lang.message.error'));
    }
}
