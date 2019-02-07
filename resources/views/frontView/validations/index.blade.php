@extends('frontView.layouts.form')

@section('title_area','Validation Avatar')

@section('card')
    @component('frontView.components.card')
        @slot('title')
            @lang('Valider les images des profils')
        @endslot
        <table class="table table-dark text-white">
            <tbody>
            @foreach($avatars as $avatar)
                @method('PATCH')
                @csrf
                <tr>
                    <td><img src="{{ $avatar->persistFlux  }}" class="img-thumbnail" width="100"></td>
                    <td>
                        <a type="button" href="{{ route('validation.edit', $avatar->id) }}"
                           class="btn btn-theme02 " data-toggle="tooltip"
                           title="@lang("Valider l'avatar")"><i class="fa fa-check">@lang(' Accepter')</i></a>
                    </td>
                    <td>
                        <form action="{{ route('validation.destroy', $avatar->id) }}" method="POST">
                            <imput name="_method" type="hidden" value="DELETE"></imput>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-theme04" data-toggle="tooltip"
                                    title="@lang("Refuser l'avatar")"><i class="fa fa-trash">@lang(' Refuser')</i
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $avatars->links() }}
    @endcomponent
@endsection
