@extends('layouts.app')
@section('content')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Hardware <span class="iconify" data-icon="simple-icons:pcgamingwiki" style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <a href="/hardware"><strong>Arma tu computadora</strong></a><br>
                    <a href="/hardware/procesadores">Procesadores</a><br>
                    <a href="/hardware\motherboards">Tarjetas Madre</a><br>
                    <a href="/hardware\gabinetes">Gabinetes</a><br>
                    <a href="/hardware\graficas">Targetas de Video</a><br>
                    <a href="/hardware\ram">Memorias RAM</a><br>
                    <a href="/hardware\disipadores">Disipadores</a><br>
                    <a href="/hardware\fuentes">Fuentes de Poder</a><br>
                    <a href="/hardware"><strong>Almacenamiento</strong></a><br>
                    <a href="/hardware\ssd">Unidades de Estado Solido</a><br>
                    <a href="/hardware\hdd">Discos Duros</a><br>
                    <a href="/hardware\ram">Memorias RAM</a><br>
                    <a href="/hardware\usb">USB/SD</a><br>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Accesorios <span class="iconify" data-icon="bi:headphones" style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/hardware"><strong>Accesorios</strong></a><br>
                    <a href="/accesorios\audifonos">Audifonos</a><br>
                    <a href="/accesorios\alfombrillas">Alfombrillas</a><br>
                    <a href="/accesorios\mouse">Mouse</a><br>
                    <a href="/accesorios\teclados">Teclados</a><br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Computadoras <span class="iconify" data-icon="icon-park-outline:laptop" style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/hardware"><strong>Computadoras</strong></a><br>
                    <a href="/computadoras\laptop">Laptop</a><br>
                    <a href="/computadoras\escritorio">Escritorio</a><br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                    Electrónica <span class="iconify" data-icon="heroicons:tv" style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/hardware"><strong>Electrónica</strong></a><br>
                    <a href="/electronica\consolas">Consolas</a><br>
                    <a href="/electronica\tv">Televisores</a><br>
                    <a href="/electronica\monitores">Monitores</a><br>
                    <a href="/electronica\bocinas">Bocinas</a><br>
                    <a href="/electronica\camaras">Cámaras</a><br>
                    <a href="/electronica\telefonos">Teléfonos</a><br>
                </div>
            </div>
        </div>
    </div>
@endsection
