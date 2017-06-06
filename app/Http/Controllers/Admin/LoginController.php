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

        if ($request->user()->role == 1) {
            return redirect()->action('Admin\HomeController@index');
        }

        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            $value = $request->session()->get('uriback');
            if (is_null($value)) {
                return redirect()->route('get.admin.home');
            }

            return redirect($value);
        }

        return redirect()->action('Admin\LoginController@getLogin')->with('message', trans('lang.message.error'));
    }
}
