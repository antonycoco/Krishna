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
            ['estValider','=',true],
        ])->first();
        return (isset ($avatarUser->imageUrl)?$avatarUser->imageUrl:'default.jpg');
    }
    public static function set_avatarUserName($id){
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
    public static function get_avatarStream($data){
        $date = date_timestamp_get(date_create());
        $nameAvatar=(Auth::user()->username).($date);
        $data1=explode(',',$data)[0];
        $data2=explode(',',$data)[1];
        $data3=explode('/',explode(';',$data)[0])[1];
        $data4=$data1.','.$data2;
        Storage::disk('imagesSubmits')->makeDirectory($nameAvatar);
    }
    public static function set_avatarStream(){
        file_put_contents("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar", file_get_contents("$data2"));//code fonctionnel
        Storage::disk('imagesUsers')->makeDirectory($nameAvatar);
        copy("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar","storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar");
        //$nameAvatar=(Storage::disk('imagesUsers')->prepend("$nameAvatar/Avatar.$nameAvatar",$data1));
        file_put_contents("storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar", file_get_contents("$data4"));//code fonctionnel
        rename("storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar","storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar.$data3");
        error_reporting(null);
    }
}
