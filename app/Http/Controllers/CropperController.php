<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\Finder\SplFileInfo;
class CropperController extends Controller
{

    /**
     * CropperController constructor.
     * @param $uploadedImageURL
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($uploadedImageURL)
    {
        $user=Auth::User()->id;
        $avatar = DB::table('avatars')
            ->where([
                ['imageValider','=',0],
                ['user_id','!=',$user],
            ])
            ->update(['imageUrl'=> $uploadedImageURL]);
        return view ('profile',['avatars'=>$avatar]);
    }
    public function edit(Request $request){
        return view('cropper');
    }
    public function soumettre()
    {
        //sauvegarde du nom de l'avatar en base en attentede validation
        $dossier = './images/avatars_submit/';
        $user=Auth::User()->id;
        $avatars=Avatar::all();
        foreach($avatars as $avatar){
            $userId = $avatar->user_id;
            $imageValide = $avatar->imageValider;
            if ($userId==$user and $imageValide == false){
                $avatar->delete();
            }
            /*if($avatar==$user){
                echo ('trouve doublon de '.$username);
            }*/
        }
        $avatarName=$_POST['publierNom'];
        $avatar = new Avatar();
        $avatar->user_id = $user;
        $avatar->imageUrl = $avatarName;
        $avatar->save();
        //recupere l'extension du nom de l'image
        $avatarHeader = 'image/'.substr(strrchr($avatarName, '.'),1);
        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
        \header($avatarHeader);
        $avatarBase64=$_POST['publierHref'];
        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage
        $avatarBase64= substr(strrchr($avatarBase64,','),1);
        $avatarData=base64_decode($avatarBase64);
        $avatarImage=imagecreatefromstring($avatarData);
        imagejpeg($avatarImage,$dossier.$avatarName);

        return view ('layouts.profile');
    }
    public function dataURI_decode(){}
}

