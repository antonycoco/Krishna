<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    private $image_cache_expires = "Sat, 01 Jan 2050 00:00:00 GMT";
    public function showProfilePhoto($id) {
        $user = User::find($id);
        echo($id.'<br/>');
        $avatar=$user->avatar;
        $avatarValider = $avatar->imageValider;
        if (isset($avatarValider) and $avatarValider == true){
            $path = base_path() . '/uploads/imagesUser/';
        }
        else {
            $path = base_path() . '/uploads/imagesDefault/';
        }

        if($user and $avatarValider) // Column where user's photo name is stored in DB
        {
            $photo_path = $path . $avatarValider; // eg: "file_name"
            $photo_mime_type = $avatar->photo_mime_type; // eg: "image/jpeg"
            $response = response()->make(File::get($photo_path));
            $response->header("Content-Type", $photo_mime_type);
            $response->header("Expires", $this->image_cache_expires);
            return $response;
        }
        abort("404");
    }
}
