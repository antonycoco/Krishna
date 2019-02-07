@extends('frontView.layouts.form')
@section('card')
    @component('frontView.components.card')
        @slot('title')
            @lang('Renouvellement du mot de passe')
        @endslot
        <div class="login-wrap">
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                @include('frontView.partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ])
                @include('frontView.partials.form-group', [
                    'title' => __('Mot de passe'),
                    'type' => 'password',
                    'name' => 'password',
                    'required' => true,
                    ])
                @include('frontView.partials.form-group', [
                    'title' => __('Confirmation du mot de passe'),
                    'type' => 'password',
                    'name' => 'password_confirmation',
                    'required' => true,
                    ])
                @include('frontView.partials.form-group', [
                    'title' => __('Confirmation du mot de passe'),
                    'type' => 'password',
                    'name' => 'password_confirmation',
                    'required' => true,
                ])
                @component('frontView.components.button')
                    @lang('Renouveller')
                @endcomponent
            </form></div>
    @endcomponent
@endsection