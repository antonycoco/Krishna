<?php

namespace App\Http\Controllers;

use App\Statiques\Avatars\AvatarUser;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin=Auth::User()->id;
        $avatars = DB::table('avatars')
            ->where([
                ['estValider','=',false],
                ['user_id','!=',$admin],
            ])
            ->orderBy('updated_at','asc')
            ->paginate(3);
//        $avatars=Avatar::paginate(3);
        return view('frontView.validations.index',compact('avatars'));
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
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //on recupere l'id de user
        if(isset(Auth::user()->avatar->estValider) and Auth::user()->avatar->value(estValider))
        {
            AvatarUser::set_oldAvatarUser($id,true);
        }
        //validation de l'avatar en BdD
        DB::table('avatars')->where('id','=',$id)->update(['estValider'=>true]);
        return back();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AvatarUser::set_newAvatarUser($id,false);
        return back();
    }
}
