@extends('frontView.layouts.form')
@section('title_area','email')
@section('card')
    {{--@if (session('status'))--}}
        {{--<div class="alert alert-success" role="alert">--}}
            {{--{{ session('status') }}--}}
        {{--</div>--}}
    {{--@endif--}}
    @component('frontView.components.card')
        @slot('title')
            @lang('Renouvellement du mot de passe')
        @endslot
        <div class="login-wrap">
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                @include('frontView.partials.form-group', [
                    'title' => __('Adresse email'),
                    'type' => 'email',
                    'name' => 'email',
                    'required' => true,
                    ])
                @component('frontView.components.button')
                    @lang('Envoi de la demande')
                @endcomponent
            </form></div>
    @endcomponent
@endsection
