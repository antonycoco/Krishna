<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 14/01/2019
 * Time: 19:52
 */

namespace App\Helpers\Randstr;


use Faker\Provider\DateTime;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Whoops\Util\SystemFacade;

class RandstrName
{
    /**
     * @param $name
     * @return bool|string
     */
    public static function get_incrementalHash($data){
       /* $seed = str_split("0123456789.!@#$%^&*().ABCDEFGHIJKLMNOPQRSTUVWXYZ.abcdefghijklmnopqrstuvwxyz");
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 8) as $k){
            echo (str_shuffle($rand .= $seed[$k]));
        }*/
        //$base = strlen($charset);
        //$md5name= md5($name);
        //$image="storage/app/public/imagesDefauts/default.jpg";
        echo ('affichage du href : '.$data);
        echo('<br/>');
//        $file=fopen($data,"rb");
//        $content=fread($file,filesize($data));
//        fclose($file);
//        echo $content;
//        echo('<br/>');
        $file2 =file_get_contents($data);
        $content2=($file2);
        error_reporting(null);
        //echo $content2;
        $date = date_timestamp_get(date_create());
        $nameAvatar=(Auth::user()->username).($date);
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        echo $nameAvatar;
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        $data1=explode(',',$data)[0];
        $data2=explode(',',$data)[1];
        $data3=explode('/',explode(';',$data)[0])[1];
        echo $data1;
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        echo $data2;
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        echo $data3;
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        $data4=$data1.','.$data2;
        echo $data4;
        echo('<br/>-----------------------------------------------------------------------------------------------------');
//        $data=base64_decode($data);
//        $data=imagecreatefromstring($data);

        echo('<br/>-----------------------------------------------------------------------------------------------------');
        Storage::disk('imagesSubmits')->makeDirectory($nameAvatar);
        echo('<br/>-----------------------------------------------------------------------------------------------------');
        file_put_contents("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar", file_get_contents("$data2"));//code fonctionnel
        Storage::disk('imagesUsers')->makeDirectory($nameAvatar);
        copy("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar","storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar");
        //$nameAvatar=(Storage::disk('imagesUsers')->prepend("$nameAvatar/Avatar.$nameAvatar",$data1));
        file_put_contents("storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar", file_get_contents("$data4"));//code fonctionnel
        rename("storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar","storage/imagesUsers/$nameAvatar/Avatar.$nameAvatar.$data3");
        //$image=Image::make($image)->encode('jpg');

        //$image=Image::make($image)->save("storage/imagesSubmits/");
       // $image=imagecreatefromstring($image);
        //imagejpeg($image);
        //$donne=Storage::disk('imagesSubmits')->get("$nameAvatar/Avatar.$nameAvatar");
        //$image=imagecreatefromstring($donne);
        //echo('affiche image : '.$image);

//        echo('<br/> affiche extraction du type ------------------------------------------------------------------------');
//        //$avatarHeader = (substr(strrchr($data, ';'),1));
//        $avatarType = substr($data,strpos($data,'/')+1,strpos($data,';')-strpos($data,'/')-1);
//        //$avatarHeader = chunk_split($data);
//        echo($avatarType);
//        echo('<br/>afichage de l image -----------------------------------------------------------------------------------');
//        $file=file_get_contents("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar");
//        $image=Image::make($file)->encode('jpg');
//        echo '<img src="'.$image.'" >';

        //Image::make($file);
        //sauvegarde de l'image cropped apres encodage(balise canvas)/decodage Base64
        //\header($avatarHeader);
//        \header(jpeg);
//        echo('<br/>afichage de l image -----------------------------------------------------------------------------------');
//        echo($avatarBase64=time().'.'.explode('/',explode(':',substr($data,0,strpos($data,';')))[1])[1]);
        //Image::make($avatarBase64)->save('storage/imagesSubmits/'.$avatarBase64);
//        echo('<br/>affiche le code base 64 ---------------------------------------------------------------------------=');
//        $avatarBase64=$data;
//        //on retire le MINE-type et le mot clé present pour ne recuperer que la data de l'encodage
//        echo ($avatarBase64= substr(strrchr($avatarBase64,','),1));
//        echo('<br/>affiche le decodage base64--------------------------------------------------------------------------');
//        //($avatarData=base64_decode($avatarBase64));
//        ($avatarData=base64_decode("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"));
//        echo($avatarData);
//        echo('<br/>affiche la creation d image via une chaine -----------------------------------------------------------');
//        echo($avatarImage=imagecreatefromstring("$avatarData" ));
//        echo('<br/>afichage de l image -----------------------------------------------------------------------------------');
//        imagejpeg("$avatarImage");
//        //echo substr($result,0,16);
//        //return substr($result, 0,16);
    }
}
