<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BaseFrontController extends Controller
{
    protected $dis = [];

    public static function uploadImage($image)
    {
        $input['imageName'] = config('settings.image_path') . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path();
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imageName']);

        return $input['imageName'];
    }
}
