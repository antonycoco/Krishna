<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 11/01/2019
 * Time: 19:36
 */

namespace App\Statiques\Avatars;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AvatarUser
{
    //on parcours le storage pour recupere le nom du dosier par default
    public static function get_avatarDefaut()
    {
        $directory = Storage::disk('local')->files('defaultRepository');
        foreach ($directory as $file) {
            $default = Storage::disk('local')->url($file);
            $default=explode('/',$default)[3];
            return $default;
        }
    }
    // on recuper en base le non de l'avatar si existe ou on recupe celui definit par default
    public static function get_avatarUserName($id){
        $avatarUser = DB::table('avatars')->where([
            ['user_id',$id],
            ['estValider','=',true],
        ])->first();
        return (isset ($avatarUser->sonNom)?$avatarUser->sonNom:self::get_avatarDefaut());
    }
    // on recuper en base le non du dossier si existe ou on recupe celui definit par default
    public static function get_directoryAvatarUserName($id)
    {
        $chemin=(isset(Auth::user()->avatar->estValider) and Auth::user()->avatar->estValider == true) ?
            DB::table('avatars')
                ->where([
                    ['estValider','=',true],
                    ['user_id','=',$id]])
                ->value('cheminLocal')
            :'defaultRepository';
        return $chemin;
    }
    public static function get_makeDirectoryAvatarUserName()
    {
        //la sauvegarde local sera generer par une fonction static vie un helper
        $dossier = 'avatarRepository/'.Auth::user()->user.date_timestamp_get(date_create());
        Storage::disk('local')->makeDirectory($dossier);
        return $dossier;
    }

    public static function set_saveAvatarUserName($avatarName,$avatarBase64,$dossier)
    {
        $avatarHeader = 'image/'.substr(strrchr($avatarName, '.'),1);
        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
        \header($avatarHeader);
        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage et sauvegarde local
        Image::make(imagecreatefromstring(base64_decode(explode(',',$avatarBase64)[1])))
            ->save(storage_path('app/').$dossier.'/'.$avatarName);//pattern decorateur
    }
    public static function set_oldAvatarUser($id,$condition){
        $oldAvatarUser=DB::table('avatars')->where('id','=',$id)->value('user_id');
        // avec cet id on supprime le storage local
        self::set_deleteAvatarRepository($oldAvatarUser,$condition);
        //suppressio de l'ancien avatars
        DB::table('avatars')->where([['user_id','=',$oldAvatarUser],['estValider','=',$condition],])->delete();
    }
    public static function set_deleteAvatarRepository($userId,$condition)
    {
        $avatar = DB::table('avatars')->where([['user_id', '=', $userId], ['estValider', '=', $condition],])
            ->value('cheminLocal');
        $avatar = explode('/', $avatar)[1];
        Storage::disk('local')->deleteDirectory('avatarRepository/' . $avatar);
    }
    public static function set_newAvatarUser($id,$condition)
    {
        self::set_oldAvatarUser($id,$condition);
    }
}
