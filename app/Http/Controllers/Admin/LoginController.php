<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin(Request $request)
    {
        $uri = $request->headers->get('referer');
        $request->session()->flash('uriback', $uri);
        if (is_null($request->user())) {
            return view('admin.login');
        }

        if ($request->user()->role == config('settings.role_admin')) {
            return redirect()->action('Admin\HomeController@index');
        }

        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email','password','role');
        $data['role'] = config('settings.role_admin');
        if (Auth::attempt($data)) {
            $value = $request->session()->get('uriback');
            if (is_null($value)) {
                return redirect()->route('get.admin.home');
            }

            return redirect($value);
        }

        return redirect()->action('Admin\LoginController@getLogin')->with('message', trans('lang.message.error'));
    }
}
