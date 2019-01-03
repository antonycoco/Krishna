<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class UserProfileController extends Controller
{
    public function index()
    {
       return $avatars = DB::table('avatars');
    }
    public function show()
    {
        return view('profile');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request){
        // Logic for user upload of avatars
       /* if($request->hasFile('avatars')){
            $avatar = $request->file('avatars');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatars_submit' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }*/
        return view('profile', ['user' => Auth::class] );
    }
    /**
     * @param $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexSort($role)
    {
        $counts = $this->user_gestion->counts();
        $users = $this->user_gestion->index(4,$role);
        $links = $users->setPath('')->render();
        $roles = $this->role_gestion->all();
        return view('back.users.index',compact('users','links','counts','roles'));
    }
}
