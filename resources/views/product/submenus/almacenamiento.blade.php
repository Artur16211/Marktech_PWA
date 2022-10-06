@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="/hardware/ssd">
            <div class="card">
                <img src="{{ asset('/img/submenus/ssd.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Unidades de Estado Sólido (SSD)</h5>
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
            <a href="/hardware/usb">
            <div class="card">
                <img src="{{ asset('/img/submenus/usb.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">USB/SD</h5>
                </div>
            </div>
            </a>
        </div>
    </div>
@endsection
