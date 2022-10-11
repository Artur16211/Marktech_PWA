@extends('layouts.app')
@section('content')
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>ACERCA DE MARKTECH</strong></p>
        </blockquote>
    </figure>

    <div class="list-group">
        <a href="/avisodeprivacidad" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="material-symbols:policy-outline" style="font-size: 38px;"></span>
                </h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                        style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Politica de
                Privacidad</p>
            <small class="text-muted"></small>
        </a>
        <a href="/terminosycondiciones" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="icon-park-outline:termination-file" style="font-size: 32px;"></span></h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                        style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Terminos y
                Condiciones</p>
            <small class="text-muted"></small>
        </a>
    </div>
@endsection
