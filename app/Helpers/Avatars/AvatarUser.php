<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 11/01/2019
 * Time: 19:36
 */

namespace App\Helpers\Avatars;


use Illuminate\Support\Facades\DB;

class AvatarUser
{
    public static function get_avatarUserName($user_id){
        $avatarUser = DB::table('avatars')->where([
            ['user_id',$user_id],
            ['imageValider','=',true],
        ])->first();
        return (isset ($avatarUser->imageUrl)?$avatarUser->imageUrl:'default.jpg');
    }

}