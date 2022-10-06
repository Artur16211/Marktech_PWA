@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="/electronica/consolas">
            <div class="card">
                <img src="{{ asset('/img/submenus/consoles.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Consolas</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/electronica/tv">
            <div class="card">
                <img src="{{ asset('/img/submenus/tvs.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Televisores</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/electronica/monitores">
            <div class="card">
                <img src="{{ asset('/img/submenus/monitores.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Monitores</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/electronica/bocinas">
            <div class="card">
                <img src="{{ asset('/img/submenus/bocinas.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bocinas</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/electronica/camaras">
            <div class="card">
                <img src="{{ asset('/img/submenus/camaras.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Cámaras</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/electronica/telefonos">
            <div class="card">
                <img src="{{ asset('/img/submenus/telefonos.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Teléfonos</h5>
                </div>
            </div>
            </a>
        </div>
    </div>
@endsection
