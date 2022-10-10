@extends('layouts.app')
@section('content')
    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>CATEGORÍAS</strong></p>
        </blockquote>
    </figure>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Hardware</strong> <span class="iconify" data-icon="simple-icons:pcgamingwiki"
                        style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <p class="h3 text-center" href="/hardware"><strong>Arma tu computadora</strong></p><br>
                        <hr class="hr" />
                        <a class="h4" href="/hardware/procesadores">Procesadores</a><br>
                        <a class="h4" href="/hardware\motherboards">Tarjetas Madre</a><br>
                        <a class="h4" href="/hardware\gabinetes">Gabinetes</a><br>
                        <a class="h4" href="/hardware\graficas">Tarjetas de Video</a><br>
                        <a class="h4" href="/hardware\ram">Memorias RAM</a><br>
                        <a class="h4" href="/hardware\disipadores">Disipadores</a><br>
                        <a class="h4" href="/hardware\fuentes">Fuentes de Poder</a><br>
                        <br>
                    <p class="h3 text-center" href="/hardware"><strong>Almacenamiento</strong></p><br>
                        <hr class="hr" />
                        <a class="h4" href="/hardware\ssd">Unidades de Estado Solido</a><br>
                        <a class="h4" href="/hardware\hdd">Discos Duros</a><br>
                        <a class="h4" href="/hardware\ram">Memorias RAM</a><br>
                        <a class="h4" href="/hardware\usb">USB/SD</a><br>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <strong>Accesorios</strong> <span class="iconify" data-icon="bi:headphones"
                        style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p class="h3 text-center" href="/hardware"><strong>Accesorios</strong></p><br>
                        <hr class="hr" />
                        <a class="h4" href="/accesorios\audifonos">Audifonos</a><br>
                        <a class="h4" href="/accesorios\alfombrillas">Alfombrillas</a><br>
                        <a class="h4" href="/accesorios\mouse">Mouse</a><br>
                        <a class="h4" href="/accesorios\teclados">Teclados</a><br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <strong>Computadoras</strong> <span class="iconify" data-icon="icon-park-outline:laptop"
                        style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p class="h3 text-center" href="/hardware"><strong>Computadoras</strong></p><br>
                        <hr class="hr" />
                        <a class="h4" href="/computadoras\laptop">Laptop</a><br>
                        <a class="h4" href="/computadoras\escritorio">Escritorio</a><br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                    <strong>Electrónica</strong> <span class="iconify" data-icon="heroicons:tv"
                        style="font-size: 32px;"></span>
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p class="h3 text-center" href="/hardware"><strong>Electrónica</strong></p><br>
                        <hr class="hr" />
                        <a class="h4" href="/electronica\consolas">Consolas</a><br>
                        <a class="h4" href="/electronica\tv">Televisores</a><br>
                        <a class="h4" href="/electronica\monitores">Monitores</a><br>
                        <a class="h4" href="/electronica\bocinas">Bocinas</a><br>
                        <a class="h4" href="/electronica\camaras">Cámaras</a><br>
                        <a class="h4" href="/electronica\telefonos">Teléfonos</a><br>
                </div>
            </div>
        </div>
    </div>
@endsection
