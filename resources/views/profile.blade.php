@extends('layouts.app')
@section('content')
    <div class="container" style="align-content: center">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if ($avatars == false )
                    <img src="./images/avatars_users/default.jpg">
                @else <img src="./images/avatars_submit/{{Auth::user()->avatar->imageUrl}}" style="align-content: center">
                @endif
                <h2>{{ Auth::user()->username }}'s Profile</h2>
                <a data-toggle="tooltip" href="{{ route('traitement.edit') }}" title=""
                    class="pull-left btn btn-success btn-primary"
                    data-original-title="An advanced example of Cropper.js">Edition de la photo du profil</a>
            </div>
        </div>
    </div>
@endsection
