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
        echo ('<img src="'.$data.'""');
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
        echo('<br/>');
        echo $nameAvatar;
        Storage::disk('imagesSubmits')->makeDirectory($nameAvatar);
        echo('<br/>');
        file_put_contents("storage/imagesSubmits/$nameAvatar/Avatar.$nameAvatar", file_get_contents($data));//code fonctionnel
        $donne=Storage::disk('imagesSubmits')->get("$nameAvatar/Avatar.$nameAvatar");
        $image=imagecreatefromstring($donne);
        echo('affiche image : '.$image);
        imagejpeg($image);
        //echo substr($result,0,16);
        //return substr($result, 0,16);
    }
}
