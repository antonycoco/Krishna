<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{

    public function showProfilePhoto($id) {
        if (Auth::id()==$id){
            echo('<img src="'.$avatarPath = AvatarUser::set_avatarUserName($id).'/'.$this->showAvatarUser($id).'" />');
            return view ('components.avatar-user',['avatarPath'=>$avatarPath]);
        }
        abort("404");
    }
    public function showAvatarUser($id){
        return AvatarUser::get_avatarUserName($id);
    }
}
