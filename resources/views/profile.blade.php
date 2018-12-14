@extends('resources.views.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="./uploads/avatars/{{ Auth::user()->avatar }}" style="...">
                <h2>{{ Auth::user()->name }}'s Profile</h2>
                 <a data-toggle="tooltip" href="{{ route('traitement.edit') }}" title=""
                    class="pull-left btn btn-success btn-primary"
                    data-original-title="An advanced example of Cropper.js">Edition de la photo du profil</a>
            </div>
        </div>
    </div>
@endsection
