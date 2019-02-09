<?php

namespace App\Http\Controllers;

use App\Statiques\Avatars\AvatarUser;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function avatarStream()
    {
        $user=Auth::user()->id;
        $chemin=AvatarUser::get_directoryAvatarUserName($user);
        $avatarName=AvatarUser::get_avatarUserName($user);
        $cheminComplet=$chemin.'/'.$avatarName;
        $content=Storage::disk('local')->get($cheminComplet);
        $header = array('Content-Type' => 'image/jpg');
        return Response::make($content, 200, $header);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //echo ('ici la vu profile');
       return view('frontView.profile.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function indexSort($role)
    {
        $count = $this->user_gestion->counts();
        $user = $this->user_gestion->index(4,$role);
        $links = $user->setPath('')->render();
        $roles = $this->role_gestion->all();
        return view('back.users.index',compact('users','links','count','roles'));
    }
}
