@extends('layouts.app')
@section('content')
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>TEMAS</strong></p>
        </blockquote>
    </figure>
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="darkSwitch" />

        <label class="custom-control-label" for="darkSwitch">Modo Oscuro (BETA)</label>
    </div>



    {{-- <input type="checkbox" id="toggle_checkbox">

    <label for="toggle_checkbox">
        <div id="star">
            <div class="star" id="star-1">★</div>
            <div class="star" id="star-2">★</div>
        </div>
        <div id="moon"></div>
    </label> --}}

@endsection
