@extends('layouts.form')

@section('card')

    @component('components.card')

        @slot('title')
            @lang('Valider les images des profils')
        @endslot


        <table class="table table-dark text-white">
            <tbody>
            @foreach($transitions as $transitional)
                <tr>
                    <td><img src="{{ $transitional->imageUrlTemp }}" style="..."></td>
                    <td>
                        <a type="button" href="{{ route('transitional.destroy', $transitional->id) }}"
                           class="btn btn-danger btn-sm pull-right invisible" data-toggle="tooltip"
                           title="@lang("Refuser l'avatar")"><i class="fas fa-trash fa-lg"></i></a>
                    </td>
<td>
                        <a type="button" href="{{ route('transitional.update', $transitional->id) }}"
                           class="btn btn-success btn-sm pull-right invisible" data-toggle="tooltip"
                           title="@lang("Valider l'avatar")"><i class="fas fa-check-square fa-lg"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endcomponent

@endsection

@section('script')

    <script>
        $(() => {
            $('a').removeClass('invisible')
        })
    </script>

    @include('partials.script-delete', ['text' => __('Vraiment refuser cette avatar ?'), 'return' => 'removeTr'])

@endsection
