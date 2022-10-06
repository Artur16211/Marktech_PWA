@extends('layouts.app')
@section('content')

@section('title', 'Marktech - Carrito')
<div class="card">
    <div class="card-body">

        <div class="container">
            <div class="alert alert-danger mx-auto" role="alert" style="width:40%;">
                No hay productos en el carrito.
            </div>

            <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                Volver al inicio</button>
    </div>
</div>

@endsection
