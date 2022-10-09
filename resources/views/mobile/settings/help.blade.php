@extends('layouts.app')
@section('content')
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>AYUDA</strong></p>
        </blockquote>
    </figure>

    <div class="list-group">
        <a href="mailto:herrera.alvaradoartu@gmail.com" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="ci:mail" style="font-size: 32px;"></span>
                </h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                        style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Contactanos</p>
            <small class="text-muted"></small>
        </a>
        <a href="/Sugerencias" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="clarity:list-line" style="font-size: 32px;"></span></h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                        style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Sugerencias</p>
            <small class="text-muted"></small>
        </a>
    </div>
@endsection
