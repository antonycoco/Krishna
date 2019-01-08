<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
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
        /*foreach($_POST as $cle=>$valeur)
        {
            echo('post : '.$cle.' = '.$valeur.'<br />');
        }*/
        //sauvegarde du nom de l'avatar en base en attentede validation
        $dossier = './images/avatars_submit/';
        $user=Auth::User()->id;
        $avatarName=$_POST['publierNom'];
        $avatar = new Avatar();
        $avatar->user_id = $user;
        $avatar->imageUrl = $avatarName;
        $avatar->save();
        //echo ($avatarName.'<br/>');
        $avatarHeader = 'image/'.substr(strrchr($avatarName, '.'),1);
        //echo ($extension);
        //sauvegarde de l'image cropped apres encodage/decodage Base64
        //$avatarHeader=pathinfo($avatarName->getFilename(),PATHINFO_EXTENSION);
        //echo($avatarHeader);
        \header($avatarHeader);
        $avatarBase64=$_POST['publierHref'];
        $avatarBase64= substr($avatarBase64,22);
        //$avatarBase64='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';
        $avatarData=base64_decode($avatarBase64);
        $avatarImage=imagecreatefromstring($avatarData);
        imagejpeg($avatarImage,$dossier.$avatarName);
        /*$fic=fopen("$avatarName","wb");
        echo($fic.'<br />');
        echo(fwrite($fic,base64_decode($avatarBase64)));*/
        /*$avatarData=base64_decode($avatarBase64);
        $avatarImage=imagecreatefromstring($avatarData);
        echo ($avatarImage);*/
        // Si besoin de recuperer l'urlpour concatener avec le nom de l'image
        //$url=url(Auth::user()->avatar->imageUrl);
        //echo ($url);
        return view ('profile');
    }
    public function dataURI_decode(){}
}
/*$dossier = './images/avatars_submit/';
$fichier = basename($_FILES['avatarSubmit']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatarSubmit']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatarSubmit']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
    $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['avatarSubmit']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        echo 'Upload effectué avec succès !';
    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
else
{
    echo $erreur;
}*/
