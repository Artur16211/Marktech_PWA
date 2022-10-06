@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="/accesorios/audifonos">
                <div class="card">
                    <img src="{{ asset('/img/submenus/audifonos.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Audifonos</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/accesorios/alfombrillas">
                <div class="card">
                    <img src="{{ asset('/img/submenus/alfombrilla.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Alfombrillas</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/accesorios/mouse">
                <div class="card">
                    <img src="{{ asset('/img/submenus/mouse.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mouse</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/accesorios/teclados">
                <div class="card">
                    <img src="{{ asset('/img/submenus/teclados.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Teclados</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
