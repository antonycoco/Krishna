<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropperController extends Controller
{
    public function edit(Request $request){
        return view('traitement');
    }
}
