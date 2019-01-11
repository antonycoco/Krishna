<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{

    public function showProfilePhoto($id) {

        $user = User::find($id);
        echo $this->showAvatarUser($id);
        echo (Auth::id());
        if (Auth::id()==$id){
            if (isset($user->avatar->imageValider)){
                $avatarValide = $user->avatar->imageValider;
            }
            else $avatarValide = false;
            $avatarUser = $user->avatar;
            if ($avatarValide == true){
                $path =asset('storage/imagesUser/');
                if($user and isset($avatarUser->imageUrl))// Column where user's photo name is stored in DB
                {
                    $photo_path = $path .'/'. $this->showAvatarUser($id); // eg: "file_name"
                    echo $photo_path;
                    echo '<br/>';
                    echo ('<img src="'.$photo_path.'" border="1"/>');
                    echo '<br/>';

                }
            }
            else {
                $photo_path = asset('storage/imagesDefault/'.$this->showAvatarUser($id));
            }
            return  $photo_path;
        }
        abort("404");
    }
    public function showAvatarUser($id){
        return AvatarUser::get_avatarUserName($id);
    }
}
