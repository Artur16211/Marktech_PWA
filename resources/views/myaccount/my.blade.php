@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col">
        <div class="p-3 border-top border-bottom bg-light">
            <img src="{{ asset('img/user.png') }}" alt="Logo" class="rounded mx-auto d-block" />
            <h1 class="h3 text-center">{{ $viewData['user'] }}</h1>
       </div>
</div>
<br>
<div class="container">
    <div class="col">
        <div class="p-3 border-top border-bottom bg-light"><strong>Mis Datos</strong></div>
        <div class="p-3 border-top border-bottom bg-light">Modifica tus datos de usuario. <a class="btn btn-link float-end" href="/miusuario" role="button">></a></div>
       </div>
</div>
<br>
<div class="container">
    <div class="col">
        <div class="p-3 border-top border-bottom bg-light"><strong>Direcciones</strong></div>
        <div class="p-3 border-top border-bottom bg-light">Modifica o agrega direcciones. <a class="btn btn-link float-end" href="/misdatos" role="button">></a></div>
       </div>
</div>
<br>
<div class="container">
    <div class="col">
        <div class="p-3 border-top border-bottom bg-light"><strong>Compras</strong></div>
        <div class="p-3 border-top border-bottom bg-light">Ver todas mis compras. <a class="btn btn-link float-end" href="/pedidos" role="button">></a></div>
       </div>
</div>
<br>

@endsection
