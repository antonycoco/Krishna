<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 14/01/2019
 * Time: 19:52
 */

namespace App\Helpers\Randstr;


class RandstrName
{
    /**
     * @param $name
     * @return bool|string
     */
    public static function get_incrementalHash($name){
        $seed = str_split("0123456789.!@#$%^&*().ABCDEFGHIJKLMNOPQRSTUVWXYZ.abcdefghijklmnopqrstuvwxyz");
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 8) as $k){
            echo (str_shuffle($rand .= $seed[$k]));
        }
        //$base = strlen($charset);
        //$md5name= md5($name);



        //echo substr($result,0,16);
        //return substr($result, 0,16);
    }
}
