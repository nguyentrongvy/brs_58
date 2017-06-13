<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BaseAdminController extends Controller
{
    protected $dis;

    public static function uploadImage($image)
    {
        $input['image_name'] = config('settings.image_path') . uniqid(time()) . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path();
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['image_name']);

        return $input['image_name'];
    }
}
