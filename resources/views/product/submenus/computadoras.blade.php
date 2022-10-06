@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="/computadoras/laptop">
            <div class="card">
                <img src="{{ asset('/img/submenus/laptops.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Laptops</h5>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="/computadoras/escritorio">
            <div class="card">
                <img src="{{ asset('/img/submenus/escritorio.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Escritorio</h5>
                </div>
            </div>
            </a>
        </div>
    </div>
@endsection
