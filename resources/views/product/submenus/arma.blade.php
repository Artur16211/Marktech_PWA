@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="/hardware/graficas">
                <div class="card">
                    <img src="{{ asset('/img/submenus/gpu.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tarjetas de Video</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/procesadores">
                <div class="card">
                    <img src="{{ asset('/img/submenus/procesadores.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Procesadores</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/ram">
                <div class="card">
                    <img src="{{ asset('/img/submenus/ram.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Memorias RAM</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/hdd">
                <div class="card">
                    <img src="{{ asset('/img/submenus/hdd.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Discos Duros</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/motherboards">
                <div class="card">
                    <img src="{{ asset('/img/submenus/motherboards.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tarjetas Madre</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/disipadores">
                <div class="card">
                    <img src="{{ asset('/img/submenus/coolers.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Disipadores</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/hardware/gabinetes">
                <div class="card">
                    <img src="{{ asset('/img/submenus/case.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gabinetes</h5>
                    </div>
                </div>
        </div>
        </a>
    </div>
@endsection
