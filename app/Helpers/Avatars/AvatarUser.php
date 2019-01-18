<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 11/01/2019
 * Time: 19:36
 */

namespace App\Helpers\Avatars;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AvatarUser
{
    public static function get_avatarUserName($id){
        $avatarUser = DB::table('avatars')->where([
            ['user_id',$id],
            ['imageValider','=',true],
        ])->first();
        return (isset ($avatarUser->imageUrl)?$avatarUser->imageUrl:'default.jpg');
    }
    public static function set_avatarUserName($id){
        $user = User::find($id);
        if (Auth::id()==$id) {
            if (isset($user->avatar->imageValider)) {
                $avatarValide = $user->avatar->imageValider;
            } else $avatarValide = false;
            $avatarUser = $user->avatar;
            if ($avatarValide == true) {
                if ($user and isset($avatarUser->imageUrl))// Column where user's photo name is stored in DB
                {
                    $path = asset('storage/imagesUsers/');

                }
            } else {
                $path = asset('storage/imagesDefaults/');
            }
        }return $path;
    }

}
