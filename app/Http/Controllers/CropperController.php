<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function soumettre(){

        return view ('profile');
    }
}
