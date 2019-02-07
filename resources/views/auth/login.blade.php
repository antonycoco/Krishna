{{-- vue de test --}}
@extends('frontView.layouts.form')
@section('title_area','login')
@section('card')
    @component('frontView.components.card')
        @slot('title')
            @lang('Connexion')
        @endslot
        <div class="login-wrap">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
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

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember"> @lang('Se rappeler de moi')
                        <span class="pull-right">
                            <a data-toggle="modal" href="{{ route('password.request') }}">@lang('Mot de passe oublier ?')</a>
                        </span>
                    </label>
                </div>

                @component('frontView.components.button')
                    @lang('Connexion')
                @endcomponent
            </form>
        </div>
    @endcomponent
@endsection
{{-- ici vue pour login LDAPP penser a creer les class static pour les appel Form::xxxx --}}
{{--
@section('content')
    <div id="login-page">
        <div class="container">
            {!! Form::open(array('url' => 'login', 'class' => 'form-login', 'method' => 'post')) !!}
            @csrf
            <h2 class="form-login-heading">Logistique Evacuations</h2>
            <div class="login-wrap">
                @if ($ldap != '') <div class="error-message-login">{{ $ldap }}</div><br> @endif
                <div class="form-group">
                    <span class="{!! $errors->has('login') ? 'has-error' : '' !!}"></span>
                    {!! Form::text('login', null, ['size' => '40', 'class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur'])!!}
                    {!! $errors->first('login', '<small class="error-message-login">:message</small>') !!}
                </div>
                <br/>
                <div class="form-group">
                    <div class="{!! $errors->has('password') ? 'has-error' : '' !!}"></div>
                    {!! Form::password('password', ['size' => '40', 'class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
                    {!! $errors->first('password', '<small class="error-message-login">:message</small>') !!}
                </div>
                <br/><br/>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Se connecter</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection--}}
