<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use App\Models\Avatar;
use App\Models\User;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
                ['estValider','=',0],
                ['user_id','!=',$user],
            ])
            ->update([
                'sonNom'=> $uploadedImageURL,
                'persitFlux'=> $_POST['publierHref'],
                ]);
        return view ('profile.profile',['avatars'=>$avatar]);
    }
    public function edit(Request $request){
        $avatarPath = $request->session()->get('avatarPath');
        return view('cropper.cropper',compact('avatarPath'));
    }
    public function soumettre(Request $request)
    {
        //sauvegarde du nom de l'avatar en base en attentede validation
        $avatarPath = $request->session()->get('avatarPath');

        $dossier = 'storage/imagesSubmits/';
        $user=Auth::User()->id;
        $avatars=Avatar::all();
        foreach($avatars as $avatar){
            $userId = $avatar->user_id;
            $imageValide = $avatar->estValider;
            if ($userId==$user and $imageValide == false){
                $avatar->delete();
            }
        }
        $avatarName=$_POST['publierNom'];
        $avatar = new Avatar();
        $avatar->user_id = $user;
        $avatar->sonNom = $avatarName;
        $avatar->save();

        //recupere l'extension du nom de l'image
        $avatarHeader = 'image/'.substr(strrchr($avatarName, '.'),1);
        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
        \header($avatarHeader);
        $avatarBase64=$_POST['publierHref'];
        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage
        $avatarBase64= explode(',',$avatarBase64)[1];

        $avatarData=base64_decode($avatarBase64);
        $avatarImage=imagecreatefromstring($avatarData);
        Image::make($avatarImage)->save($dossier.$avatarName);
//        $avatarHref=$_POST['publierHref'];
////        $avatarBase64=time().'.'.explode('/',explode(':',substr($avatarHref,0,strpos($avatarHref,';')))[1])[1];
////        Image::make($avatarHref)->save('storage/imagesSubmits/'.$avatarBase64);
//        $file =file_get_contents($avatarHref);
//        error_reporting(null);
//        $date = date_timestamp_get(date_create());
//        $nameAvatar=(Auth::user()->username).($date);
//        Storage::disk('imagesSubmits')->makeDirectory($nameAvatar);
//        file_put_contents("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar", file_get_contents("$avatarHref"));//code fonctionnel
//        //$donne=Storage::disk('imagesSubmits')->get("$nameAvatar/Avatar.$nameAvatar");
//        //$image=imagecreatefromstring($donne);
//        //echo('affiche image : '.$image);
//        //$avatarHeader = (substr(strrchr($data, ';'),1));
//        //$avatarHeader = substr($data,strpos($data,'/')+1,strpos($data,';')-strpos($data,'/')-1);
//        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
//        //\header($avatarHeader);
////        \header(jpeg);
//        echo($avatarBase64=time().'.'.explode('/',explode(':',substr($avatarHref,0,strpos($avatarHref,';')))[1])[1]);
//        Image::make($avatarBase64)->save('storage/imagesSubmits/'.$avatarBase64);
//        $avatarBase64=$avatarHref;
////        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage
//        ($avatarBase64= substr(strrchr($avatarBase64,','),1));
//        /* read data (binary) */
//        $ifp = fopen( $avatarBase64, "rb" );
//        $imageData = fread( $ifp, filesize( $avatarBase64 ) );
//        fclose( $ifp );
//        $outputfile='';
//        /* encode & write data (binary) */
//        $ifp = fopen( $outputfile, "wb" );
//        fwrite( $ifp, base64_decode( $imageData ) );
//        fclose( $ifp );
//        imagejpeg($outputfile);
        //$avatarData=base64_decode($avatarBase64);
        //echo($avatarImage=imagecreatefromstring("$avatarData" ));
        //imagejpeg($avatarImage);
        return view ('profile.profile',compact('avatarPath'));
    }
    public function dataURI_decode(){}
}

