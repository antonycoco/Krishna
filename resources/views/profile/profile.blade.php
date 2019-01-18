@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Profile de '){{ Auth::user()->username }}
        @endslot
        <table class="table table-dark text-white">
            <tbody>
                <div class="container" style="align-content: center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            {{--@if(isset(Auth::user()->avatar->imageValider) and Auth::user()->avatar->imageValider == true)
                                <img src="./images/avatars_submit/{{Auth::user()->avatar->imageUrl}}" style="...">
                            @else <img src="./images/avatars_users/default.jpg" style="...">
                            @endif--}}
                            {{--@component('components.avatar-user')@endcomponent--}}
                            <img src="{{ $avatarPath }}" >
                            <a data-toggle="tooltip" href="{{ route('cropper.edit',['path'=>$avatarPath]) }}" title=""
                                class="pull-left btn btn-success btn-primary"
                                data-original-title="An advanced example of Cropper.js">Edition de la photo du profil</a>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    @endcomponent
@endsection
