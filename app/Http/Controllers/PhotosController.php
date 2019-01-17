<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{

    public function showProfilePhoto() {
        //if (Auth::id()==$id){
        $id=(Auth::id());
        $avatarPathPhoto = AvatarUser::set_avatarUserName($id).'/'.$this->showAvatarUser($id);
        return $avatarPathPhoto;
       // }
        //abort("404");
    }
    public function showAvatarUser($id){
        return AvatarUser::get_avatarUserName($id);
    }
}
