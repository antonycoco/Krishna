<?php

namespace App\Http\Controllers;

use App\Helpers\Avatars\AvatarUser;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function avatarStream()
    {
        $user=Auth::user()->id;
        if(isset(Auth::user()->avatar->estValider) and Auth::user()->avatar->estValider == true)
        {
            $chemin=DB::table('avatars')
                ->where([
                    ['estValider','=',true],
                    ['user_id','=',$user]
                ])
                ->value('cheminLocal');
            $avatarName=DB::table('avatars')
                ->where([
                    ['estValider','=',true],
                    ['user_id','=',$user]
                ])
                ->value('sonNom');
        }
        else
        {
            $chemin='defaultRepository';
            $avatarName='default.png';
        }
        $cheminComplet="storage/app/".$chemin.'/'.$avatarName;
        $content = file_get_contents(base_path($cheminComplet), true);
        $header = array('Content-Type' => 'image/jpg');
        return Response::make($content, 200, $header);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $avatars=DB::table('avatars')
            ->where('id','=',6)->value('user_id');
        echo ($avatars);
        $avatar=Avatar::where('id',1)->value('estValider');
        echo('<br>');
        echo($avatar ? ('on supprime un avatar existant'):('on refuse un avatar'));
        echo('<br>');
//        foreach($avatars as $avatar){
//            if($avatar->estValider)
//            {
//                $avatar=$avatar->cheminLocal;
//                $avatar=explode('/',$avatar)[1];
//                echo ($avatar.'<br>');
//            }
//        }
//        echo('<br>');
        $userId=5;
        $avatar=DB::table('avatars')->where([['user_id','=',$userId],['estValider','=',false],])
            ->value('cheminLocal');
        $avatar=explode('/',$avatar)[1];
//        //$avatars=explode('/',$avatars)[0];
//        $avatars=Avatar::paginate(3);
        echo $avatar;
        return View::make('test')
            ->with(compact('avatars'));
//            ->with(compact('user'))
//            ->with(compact('chemin'))
//            ->with(compact('essai'))
//            ->with(compact('avatarName'))
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
