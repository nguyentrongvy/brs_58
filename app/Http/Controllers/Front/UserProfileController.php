<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Image;
use Hash;
use Illuminate\Support\Facades\Input;

class UserProfileController extends BaseFrontController
{
    public function getProfile($id)
    {
        return view('front.profile.profile');
    }

    public function updateProfile(Request $request,$id)
    {
        $user = User::find($id);
        $requestAll = $request->all();
        $image = $request->file('image');

        if (!$image) {
            $requestAll['image'] =  $user->image;
        } else {
            $requestAll['image'] = $this->uploadImage($image);
        }

        $user->update($requestAll);
        return redirect()->back();
    }

    public function getPassWord($id)
    {
        return view('front.changePassword.edit');
    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);

        if (!(Hash::check(Input::get('password_old'), $user['password']))) {
            return redirect()->back()->with('error', trans('lang.register.error'));
        }

        $user['password'] = Input::get('password');
        $user->save();
        return redirect()->back()->with('message', trans('lang.register.message'));
    }

}
