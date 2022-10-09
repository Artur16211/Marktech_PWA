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
        <div class="hide-mobile">
            <div class="container">
                <div class="col">
                    <div class="p-3 border-top border-bottom bg-light"><strong>Mis Datos</strong></div>
                    <div class="p-3 border-top border-bottom bg-light">Modifica tus datos de usuario. <a
                            class="btn btn-link float-end" href="/miusuario" role="button">></a></div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="col">
                    <div class="p-3 border-top border-bottom bg-light"><strong>Direcciones</strong></div>
                    <div class="p-3 border-top border-bottom bg-light">Modifica o agrega direcciones. <a
                            class="btn btn-link float-end" href="/misdatos" role="button">></a></div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="col">
                    <div class="p-3 border-top border-bottom bg-light"><strong>Compras</strong></div>
                    <div class="p-3 border-top border-bottom bg-light">Ver todas mis compras. <a
                            class="btn btn-link float-end" href="/pedidos" role="button">></a></div>
                </div>
            </div>
        </div>
        <div class="hide-desktop">
            <div class="list-group">
                <a href="/miusuario" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><span class="iconify" data-icon="carbon:edit" style="font-size: 32px;"></span>
                        </h5>
                        <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                                style="font-size: 32px;"></span></small>
                    </div>
                    <p class="mb-1">Mis Datos</p>
                    <small class="text-muted">Modifica tus datos de usuario.</small>
                </a>
                <a href="/misdatos" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><span class="iconify" data-icon="carbon:delivery-truck"
                                style="font-size: 32px;"></span></h5>
                        <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                                style="font-size: 32px;"></span></small>
                    </div>
                    <p class="mb-1">Direcciones</p>
                    <small class="text-muted">Modifica o agrega direcciones.</small>
                </a>
                <a href="/pedidos" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><span class="iconify" data-icon="bx:package" style="font-size: 32px;"></span>
                        </h5>
                        <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                                style="font-size: 32px;"></span></small>
                    </div>
                    <p class="mb-1">Compras</p>
                    <small class="text-muted">Ver todas mis compras.</small>
                </a>
            </div>
            <br>
            <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="btn btn-primary mx-auto d-block"
                    onclick="document.getElementById('logout').submit();">Cerrar Sesión</a>
                @csrf
            </form>
            <!--space for bottom navbar-->
            <div class="container-sm">
                <div class="p-3 border bg-light text-center fs-4"><strong>bottom navbar</strong></div>
            </div>
            <!--space for bottom navbar-->
        </div>
        <br>
    @endsection
