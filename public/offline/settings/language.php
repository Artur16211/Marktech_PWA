@extends('layouts.app')
@section('content')
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>IDIOMA</strong></p>
        </blockquote>
    </figure>
    <select class="form-select" aria-label="Default select example">
        <option selected disabled>Selecciona un idioma</option>
        <option value="spanish">Español</option>
        <option value="english" disabled>English</option>
    </select>
@endsection
