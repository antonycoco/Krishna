<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>App Name - @yield('title')</title>
</head>
<body>
<h1>Test</h1>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    {{--{{ $user }}<br>--}}
    {{--{{ $chemin }}<br>--}}
    {{--{{ $avatarName }}<br>--}}
    {{--{{ $essai }}<br>--}}

    {{--@foreach($avatars as $avatar)--}}
        {{--<li>{{ $avatar->cheminLocal }}</li>--}}
    {{--@endforeach--}}
    {{--<img src="{{ route('avatarStream') }}" style="...">--}}
    {{--<table class="table table-dark text-white">--}}
        {{--<tbody>--}}
        {{--@foreach($avatars as $avatar)--}}
            {{--<tr>--}}
                {{--@if($avatar->estValider == false)--}}
                {{--<td>--}}
                    {{--<img src="{{ route('avatarsStreamSubmit',$avatar)  }}" class="img-thumbnail" width="100"><br>--}}
                    {{--{{ route('avatarsStreamSubmit',$avatar)  }}<br>--}}
                    {{--{{ $avatar->sonNom  }}<br>--}}
                    {{--<img src="{{ $avatar->persistFlux  }}" class="img-circle" width="100"><br>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<a type="button" href="{{ route('validation.edit', $avatar->id) }}"--}}
                       {{--class="btn btn-success btn-sm pull-right " data-toggle="tooltip"--}}
                       {{--title="@lang("Valider l'avatar")"><i class="fas fa-check-square fa-lg"></i></a>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<a type="button" href="{{ route('validation.destroy', $avatar->id) }}"--}}
                       {{--class="btn btn-danger btn-sm pull-right " data-toggle="tooltip"--}}
                       {{--title="@lang("Refuser l'avatar")"><i class="fas fa-trash fa-lg"></i></a>--}}
                {{--</td>--}}
                {{--@endif--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
    {{--{{ $avatars->links() }}--}}
    {{--@yield('content')--}}
</div>
</body>
</html>