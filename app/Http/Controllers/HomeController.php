<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=(Auth::id());
        $avatarPath = AvatarUser::set_avatarUserName($id).'/'.AvatarUser::get_avatarUserName($id);
        $request->session()->put('avatarPath',$avatarPath );
        return view('home',compact('avatarPath'));
    }
}
