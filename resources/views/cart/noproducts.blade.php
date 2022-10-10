@extends('layouts.app')
@section('content')

@section('title', 'Marktech - Carrito')
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="alert alert-info mx-auto" role="alert" style="width:40%;">
                No hay productos en el carrito.
            </div>
            <div class="hide-desktop">
                <div class="d-grid gap-2">
                    <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                        Volver al inicio</button>
                </div>
            </div>
            <div class="hide-mobile">
                <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                    Volver al inicio</button>
            </div>
        </div>
    </div>
</div>

@endsection
