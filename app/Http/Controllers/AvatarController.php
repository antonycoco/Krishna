<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use App\Http\Requests\AvatarsRequest;
use App\Models\Avatar;
use App\Models\User;
use App\Repositories\AvatarRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('profile',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('frontView.cropper.cropper');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvatarRepositoryInterface $avatarRepository)
    {
        $oldAvatarSubmit=Avatar::where('user_id',Auth::id())->value('id');
        AvatarUser::set_oldAvatarUser($oldAvatarSubmit,false);
        $avatarRepository->save();
        return redirect('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avatar=Avatar::find($id);
        return view('frontView.cropper.cropper',compact('avatar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avatar $avatar)
    {
        //
    }
}
