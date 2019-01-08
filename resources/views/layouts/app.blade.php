<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Krishna') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/traitement_cropper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/traitement_cropper.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Krishna') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @admin
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle{{ currentRoute(route('avatar.index'))}}" href="#"
                   id="navbarDropdownGestCat" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    @lang('Administration')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                    <a class="dropdown-item" href="{{ route('avatar.index') }}">
                        <i class="fas fa-id-card-alt fa-lg"></i> @lang('Valider les Avatars')
                    </a>
                </div>
            </li>
            @endadmin
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item{{ currentRoute(route('login')) }}">
                    <a class="nav-link" href="{{ route('login') }}">@lang('Connexion')</a></li>
                <li class="nav-item{{ currentRoute(route('register')) }}">
                    <a class="nav-link" href="{{ route('register') }}">@lang('Inscription')</a></li>
            @else
            @auth
                <li class="nav-item{{ currentRoute(route('profile.show')) }}">
                    <a class="nav-link" href="{{ route('profile.show') }}">
                        @if(isset(Auth::user()->avatar->imageValider) and Auth::user()->avatar->imageValider == true)
                            <img src="./images/avatars_submit/{{Auth::user()->avatar->imageUrl}}" style="width: 2vw">
                        @else <img src="./images/avatars_users/default.jpg" style="width: 2vw">
                        @endif
                        @lang('Bonjour, '){{ Auth::user()->username }}
                    </a>
                </li>
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endauth
            @endguest
        </ul>
    </div>
</nav>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/traitement_cropper.js')}}" defer></script>
<script src="{{asset('js/traitement_main.js')}}" defer></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://fengyuanchen.github.io/js/common.js"></script>
@yield('script')
<script>
    $(() => {
        $('#logout').click((e) => {
            e.preventDefault()
            $('#logout-form').submit()
        })
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>
