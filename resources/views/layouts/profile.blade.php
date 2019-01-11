@extends('layouts.app')
@section('content')
    @section('card')
        @component('components.card')

            @slot('title')
                @lang('Profile')
            @endslot
        @endcomponent
@endsection
    <div class="container" style="align-content: center">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{--@if(isset(Auth::user()->avatar->imageValider) and Auth::user()->avatar->imageValider == true)
                    <img src="./images/avatars_submit/{{Auth::user()->avatar->imageUrl}}" style="...">
                @else <img src="./images/avatars_users/default.jpg" style="...">
                @endif--}}

                <a href="{{ route('users.showProfilePhoto',Auth::user()->id) }}"></a>
                <img src="{{ route('users.showProfilePhoto',Auth::user()->id) }}" style="...">
                <h2>@lang('Bienvenue dans votre profil, '){{ Auth::user()->username }}</h2>
                <a data-toggle="tooltip" href="{{ route('cropper.edit') }}" title=""
                    class="pull-left btn btn-success btn-primary"
                    data-original-title="An advanced example of Cropper.js">Edition de la photo du profil</a>
            </div>
        </div>
    </div>
