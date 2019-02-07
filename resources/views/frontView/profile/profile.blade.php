@extends('frontView.layouts.form')
@section('title_area','profile')
@section('card')
    @component('frontView.components.card')
        @slot('title')
            @lang('Profile de ')

{{--
            {{ Auth::user()->username }}
--}}

        @endslot
@section('profile')
    <div class="col-lg-9 ds">
        <div class="content-panel pn">
            <div id="profile-02">
                <div class="user">
                    <img src="{{ route('avatarStream')}}"  class="img-circle" width="50%">
                    <h2>
                        <a class="logo"><b>Bienvenue sur votre profil, <span>{{ Auth::user()->user }}</span></b></a>
                    </h2>
                </div>
            </div>
            <div class="pr2-social centered" style="float: right">
                {{-- on transmettra id de l'avatar lier a l'utilisateur pour que celui ci recupere son le base64 en bd pour l'edition--}}
                <a href="{{ route('avatar.edit',$id=1) }}"><i data-toggle="tooltip" class="pull-left btn btn-success btn-primary"
                               data-original-title="An advanced example of Cropper.js">Edition de la photo du profil</i></a>
                {{--<a  href="--}}{{-- route('cropper.edit',['path'=>$avatarPath]) --}}{{--"></a>--}}
            </div>
        </div>
        <!-- /panel -->
    </div>
    <table class="table table-dark text-white">
            <tbody>
            <div class="container" style="align-content: center">
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            {{--@if(isset(Auth::user()->avatar->imageValider) and Auth::user()->avatar->imageValider == true)
                            <img src="./images/avatars_submits/{{Auth::user()->avatar->imageUrl}}" style="...">
                        @else <img src="./images/avatars_users/default.jpg" style="...">
                            @endif--}}
                            {{--@component('components.avatar-user')@endcomponent--}}
                            {{--
                            <img src="{{ route('avatar_user') }}" style="...">
                            --}}
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
@endsection
