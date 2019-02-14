<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class testController extends Controller
{
    public function test()
    {
//        $avatars=DB::table('avatars')
//            ->where('id','=',6)->value('user_id');
//        echo ($avatars);
//        $avatar=Avatar::where('id',1)->value('estValider');
//        echo('<br>');
//        echo($avatar ? ('on supprime un avatar existant'):('on refuse un avatar'));
//        echo('<br>');
////        foreach($avatars as $avatar){
////            if($avatar->estValider)
////            {
////                $avatar=$avatar->cheminLocal;
////                $avatar=explode('/',$avatar)[1];
////                echo ($avatar.'<br>');
////            }
////        }
////        echo('<br>');
//        $userId=5;
//        $avatar=DB::table('avatars')->where([['user_id','=',$userId],['estValider','=',false],])
//            ->value('cheminLocal');
//        $avatar=explode('/',$avatar)[1];
////        //$avatars=explode('/',$avatars)[0];
////        $avatars=Avatar::paginate(3);
//        echo $avatar;
//
//        $condition =false;
//        $userId=Auth::user()->id;
//        $test1=Avatar::where('user_id',$userId)->value('id');
//        $id=$test1;
//        $test2=DB::table('avatars')->where('id','=',$id)->value('user_id');
//        $test3=DB::table('avatars')->where([['user_id', '=', $userId], ['estValider', '=', $condition],])
//            ->value('cheminLocal');
//        $id=Auth::user()->id;
        $id = 1;
        $avatarUser = DB::table('avatars')->where([
            ['user_id', $id],
            ['estValider', '=', true],
        ])->first();
        $directory = Storage::disk('local')->files('defaultRepository');
        foreach ($directory as $file) {
            $test2 = Storage::disk('local')->url($file);
            break;
        }
        $test1 = (isset ($avatarUser->sonNom) ? $avatarUser->sonNom : explode('/',$test2)[3]);
        $test2 =(isset(Auth::user()->avatar->estValider) and Auth::user()->avatar->estValider == true)?
            DB::table('avatars')
                ->where([
                    ['estValider', '=', true],
                    ['user_id', '=', $id]])
                ->value('cheminLocal')
            :explode('/',$test2)[2];
        $test3=$test2.'/'.$test1;
        $test4=Storage::disk('local')->get($test3);
        foreach ($directory as $file)
        {
           $test5=Storage::disk('local')->url($file);
        }
        $username=Auth::user()->user;
        $date = date_timestamp_get(date_create());
        $nameDirect=$username.$date;
        //la sauvegarde local sera generer par une fonction static vie un helper
        $dossier = 'avatarRepository/'.$nameDirect;
        Storage::disk('local')->makeDirectory($dossier);
        $test6=$dossier;
        $files=Storage::disk('local')->files('defaultRepository');
        $cheminComplet=$test4;
        //$cheminComplet="storage/app/".$test3;
        //$content = file_get_contents(base_path($cheminComplet), true);
        $header = array('Content-Type' => 'image/jpg');
        //return Response::make($test4, 200, $header);
        return View::make('test')
            ->with(compact('test1'))
            ->with(compact('test2'))
            ->with(compact('test3'))
            ->with(compact('test4'))
            ->with(compact('test5'))
            ->with(compact('test6'))
            ->with(compact('files'));
    }
}
