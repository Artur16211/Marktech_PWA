@extends('layouts.layout')

@section('content')

@section('title', 'Post')


<!--Carrusel-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{!! asset('img/banner1.webp') !!}" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{!! asset('img/banner2.webp') !!}" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{!! asset('img/banner4.png') !!}" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{!! asset('img/banner2.webp') !!}" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<!--Cards-->
<div class="container-fluid my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{!! asset('img/test1.png') !!}" class="card-img-top" />
                </a>

                <div class="card-body">
                    <div class="clearfix mb-3">
                        <span class="float-start">$16,999.00</span>
                    </div>
                    <h5 class="card-title">
                        <a href="#">Laptop Lenovo IdeaPad 3 15ITL6: Procesador Intel Core i5 1135G7 Hasta 4.2 GHz,
                            Memoria de 8GB DDR4, SSD de 512GB, Pantalla de 15.6" LED, Video Iris Xe Graphics, S.O.
                            Windows 10 Home (64 Bits)</a>
                    </h5>
                    <div class="clearfix mb-1">
                        <i class="far fa-heart" style="cursor: pointer"></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{!! asset('img/test2.jpeg') !!}" class="card-img-top" alt="product.title" />
                </a>

                <div class="card-body">
                    <div class="clearfix mb-3">
                        <span class="float-start">$6,299.00</span>
                    </div>
                    <h5 class="card-title">
                        <a href="#">Procesador Intel Core i5-12600K de Doceava Generación, 3.70 GHz (hasta 4.90 GHz) con
                            Intel UHD Graphics 770, Socket 1700, Caché 20 MB, Deca-Core.</a>
                    </h5>
                    <div class="clearfix mb-1">
                        <i class="far fa-heart" style="cursor: pointer"></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{!! asset('img/test3.jpg') !!}" class="card-img-top" alt="product.title" />
                </a>

                <div class="card-body">
                    <div class="clearfix mb-3">
                        <span class="float-start">$7,299.00</span>
                    </div>
                    <h5 class="card-title">
                        <a href="#">Consola Xbox Series S de 512GB. Color Blanco.</a>
                    </h5>
                    <div class="clearfix mb-1">
                        <i class="far fa-heart" style="cursor: pointer"></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{!! asset('img/test4.jpg') !!}" class="card-img-top" alt="product.title" />
                </a>
                <div class="card-body">
                    <div class="clearfix mb-3">
                        <span class="float-start">$1,999.00</span>
                    </div>
                    <h5 class="card-title">
                        <a href="#">T. Madre ASUS PRIME H610M-K D4, Chipset Intel H610, Soporta: Intel 12va. Generación,
                            Socket 1700, Memoria: DDR4 3200/2800/2133MHz, 64GB Max, Integrado: AudioHD, Red, USB 3.1 y
                            SATA 3.0, M.2, Micro-ATX, Ptos: 1xPCIE4.0x16, 1xPCIE3.0x1</a>
                    </h5>
                    <div class="clearfix mb-1">
                        <i class="far fa-heart" style="cursor: pointer"></i>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
