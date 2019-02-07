<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 11/01/2019
 * Time: 19:36
 */

namespace App\Helpers\Avatars;


use App\Models\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AvatarUser
{
    public static function get_avatarUserName($id){
        $avatarUser = DB::table('avatars')->where([
            ['user_id',$id],
            ['estValider','=',true],
        ])->first();
        return (isset ($avatarUser->imageUrl)?$avatarUser->imageUrl:'default.jpg');
    }
    public static function set_avatarUserName($id){
        //$user = Auth::user()->find($id);
        $user = User::find($id);
        if (Auth::id()==$id) {
            if (isset($user->avatar->estValider)) {
                $avatarValide = $user->avatar->estValider;
            } else $avatarValide = false;
            $avatarUser = $user->avatar;
            if ($avatarValide == true) {
                if ($user and isset($avatarUser->sonNom))// Column where user's photo name is stored in DB
                {
                    $path = asset('storage/imagesUsers/');

                }
            } else {
                $path = asset('storage/imagesDefaults/');
            }
        }return $path;
    }
    public static function set_oldAvatarUser($id,$condition){
        $oldAvatarUser=DB::table('avatars')->where('id','=',$id)->value('user_id');
        // avec cet id on supprime le storage local
        AvatarUser::set_deleteAvatarRepository($oldAvatarUser,$condition);
        //suppressio de l'ancien avatars
        DB::table('avatars')->where([['user_id','=',$oldAvatarUser],['estValider','=',$condition],])->delete();
    }
    public static function set_deleteAvatarRepository($userId,$condition){
        $avatar=DB::table('avatars')->where([['user_id','=',$userId],['estValider','=',$condition],])
            ->value('cheminLocal');
        $avatar=explode('/',$avatar)[1];
        Storage::disk('local')->deleteDirectory('avatarRepository/'.$avatar);
    }

}
