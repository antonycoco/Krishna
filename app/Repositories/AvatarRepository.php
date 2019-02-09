<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 31/01/2019
 * Time: 11:02
 */
namespace App\Repositories;

use App\Models\Avatar;
use App\Statiques\Avatars\AvatarUser;
use Illuminate\Support\Facades\Auth;

class AvatarRepository implements AvatarRepositoryInterface
{
    public function save()
    {
        $user=Auth::user()->id;//En attente de la fonction login ldapp//$user=User::id();
        $avatar=new Avatar();
        $avatar->user_id=$user;//on doit entre l'id de l'user connecter
        $avatarName=request('publierNom');//receperation des donne js de l'editeur de l'image via les balises html
        $avatar->sonNom=$avatarName;
        $dossier=AvatarUser::get_makeDirectoryAvatarUserName(); //creation dynamique d'un chemin unique vers un dossier locale
        $avatar->cheminLocal=$dossier;
        $avatarBase64=request('publierHref');
        $avatar->persistFlux=$avatarBase64;// on recupere le base 64 genere par l'editeur
        AvatarUser::set_saveAvatarUserName($avatarName,$avatarBase64,$dossier);//recupere l'extension du nom de l'image
        $avatar->save();//sauvegarde en BdD
    }
}