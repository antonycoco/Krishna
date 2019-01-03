<?php

namespace App\Http\Controllers;
use App\Models\Avatar;
use App\Models\User;
use App\Repositories\TransitionalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class AvatarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Auth::User()->id;
        $avatar = DB::table('avatars')
            ->where([
                ['imageValider','=',0],
                ['user_id','!=',$admin],
            ])
            ->orderBy('updated_at','asc')
            ->paginate(5);
        return view('validations.index',['avatars'=>$avatar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $doublon=DB::table('avatars')
            ->where('id','=',$id)
            ->value('user_id');
        DB::table('avatars')
            ->where([
                ['user_id','=',$doublon],
                ['imageValider','=',true],
            ])
            ->delete();

        DB::table('avatars')
            ->where('id','=',$id)
            ->update(['imageValider'=>true]);
        //return $this->index();
        return back()->with('avatar valider');
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
        DB::table('avatars')->where('id','=',$id)->delete();
        return response()->json();
    }
}
