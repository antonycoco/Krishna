<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 31/01/2019
 * Time: 11:02
 */

namespace App\Repositories;


use App\Models\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AvatarRepository implements AvatarRepositoryInterface
{

    public function save()
    {
        //En attente de la fonction login ldapp
        //$user=User::id();
        $user=Auth::user()->id;
        $avatars=Avatar::all();
        foreach($avatars as $avatar) {
            $userId = $avatar->user_id;
            $imageValide = $avatar->estValider;
            if ($userId == $user and $imageValide == false) {
                $avatar->delete();
            }
        }
        $avatar=new Avatar();
        $username=Auth::user()->user;
        $date = date_timestamp_get(date_create());
        $nameDirect=$username.$date;
        //la sauvegarde local sera generer par une fonction static vie un helper
        $dossier = 'avatarRepository/'.$nameDirect;
        Storage::disk('local')->makeDirectory($dossier);
        //on doit entre l'id de l'user connecter
        $avatar->user_id=$user;
        $avatarName=request('publierNom');
        $avatar->sonNom=$avatarName;
        $avatar->cheminLocal=$dossier;
        $avatarBase64=request('publierHref');
        $avatar->persistFlux=$avatarBase64;
        //recupere l'extension du nom de l'image
        $avatarHeader = 'image/'.substr(strrchr($avatarName, '.'),1);
        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
        \header($avatarHeader);
        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage
        $avatarBase64= explode(',',$avatarBase64)[1];
        $avatarData=base64_decode($avatarBase64);
        $avatarImage=imagecreatefromstring($avatarData);
        //sauvegarde local
        Image::make($avatarImage)->save(storage_path('app/'.$dossier.'/'.$avatarName));
        //sauvegarde en BdD
        $avatar->save();
    }
}