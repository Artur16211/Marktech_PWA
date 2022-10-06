@extends('layouts.app')
@section('content')
    <br>
    {{-- <div class="container">
    <img src="{!! asset('...') !!}" alt="Responsive image">
</div> --}}
    <!--Carrusel-->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"><span></span></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"><span></span></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"><span></span></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"><span></span></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"><span></span></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ route('product.banner.nvidia') }}">
                        <img src="{!! asset('img/banner-nvidia.jpg') !!}" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('product.banner.adata') }}">
                        <img src="{!! asset('img/banner-adata.jpg') !!}" href="/card" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('product.banner.mac') }}">
                        <img src="{!! asset('img/banner-mac.jpg') !!}" href="/card" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('product.banner.toshiba') }}">
                        <img src="{!! asset('img/banner-toshiba.jpg') !!}" href="/card" class="d-block w-100">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ route('product.banner.lg') }}">
                        <img src="{!! asset('img/banner-lg.jpg') !!}" href="/card" class="d-block w-100">
                    </a>
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

    </div>

    <!--Carrusel-->

    <br>

    <!--Products featured-->

    <div class="container-sm">
        <div class="p-3 border bg-light text-center fs-4"><strong>Productos Destacados</strong></div>
    </div>
    <br>
    <div class="row">
        @foreach ($viewData['products_featured'] as $product)
            <div class="col-lg-3 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <a class="hove btn stretched-link"></a>
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                        <img src="{{ asset('/img/products/' . $product->getImage()) }}"
                            class="card-img-top img-card d-inline" style="height:20em;">
                    </a>
                    {{-- <div class="card-body text-center"> --}}
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"><strong>{{ $product->getName() }}</strong>
                        </a>
                        <p></p>
                        <a>
                            @if ($product->getPrice() == 0)
                                <span><strong class="text-primary fs-5">Gratis</strong></span>
                            @elseif ($product->getDiscountedprice() > 0)
                                <strong class="text-secondary text-decoration-line-through fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through"
                                        amount="{{ $product->getPrice() - $product->getDiscountedprice() }}" currency="MXN"
                                        convert />
                                </strong>
                            @else
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @endif
                            <br>
                            <br>
                            @if ($product->getStock() > 0)
                                <span class="badge bg-primary text-white fs-6"><span class="iconify"
                                        data-icon="akar-icons:check"></span>
                                    CON EXISTENCIA</span>
                                {{-- // add to cart --}}
                                <form action="{{ route('cart.add', ['id' => $product->getId()]) }}" method="POST">
                                    @csrf
                                    <br>
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="hov btn btn-primary btn-sm fs-6">
                                        <span class="iconify" data-icon="mi:shopping-cart-add"></span>
                                        <strong>Agregar al carrito</strong>
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary text-white fs-6"><span class="iconify"
                                        data-icon="bi:x-lg"></span>

                                    SIN EXISTENCIA</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--Products Sales-->

    <div class="container-sm">
        <div class="p-3 border bg-light text-center fs-4"><strong>Los más vendidos</strong></div>
    </div>
    <br>
    <div class="row">
        @foreach ($viewData['products_sales'] as $product)
            <div class="col-lg-3 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                        <img src="{{ asset('/img/products/' . $product->getImage()) }}"
                            class="card-img-top img-card d-inline" style="height:20em;">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"><strong>{{ $product->getName() }}</strong>
                        </a>
                        <p></p>
                        <a>
                            @if ($product->getPrice() == 0)
                                <span><strong class="text-primary fs-5">Gratis</strong></span>
                            @elseif ($product->getDiscountedprice() > 0)
                                <strong class="text-secondary text-decoration-line-through fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through"
                                        amount="{{ $product->getPrice() - $product->getDiscountedprice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @else
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @endif
                            <br>
                            <br>
                            @if ($product->getStock() > 0)
                                <span class="badge bg-primary text-white fs-6"><span class="iconify"
                                        data-icon="akar-icons:check"></span>
                                    CON EXISTENCIA</span>
                                {{-- // add to cart --}}
                                <form action="{{ route('cart.add', ['id' => $product->getId()]) }}" method="POST">
                                    @csrf
                                    <br>
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="hov btn btn-primary btn-sm fs-6">
                                        <span class="iconify" data-icon="mi:shopping-cart-add"></span>
                                        <strong>Agregar al carrito</strong>
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary text-white fs-6"><span class="iconify"
                                        data-icon="bi:x-lg"></span>

                                    SIN EXISTENCIA</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--trademarks-->

    <div class="container-sm">
        <div class="p-3 border bg-light text-center fs-4"><strong>¡Las mejores marcas!</strong></div>
    </div>
    <br>
    <div class="row">
        <div class="col" style="width: 10rem;">
            <a href="{{ route('trademark.dell') }}">
                <img src="{!! asset('img/carrousel/dell.png') !!}" class="img-fluid" alt="...">
            </a>
        </div>
        <div class="col" style="width: 10rem;">
            <a href="{{ route('trademark.gigabyte') }}">
                <img src="{!! asset('img/carrousel/gygabyte.png') !!}" class="img-fluid" alt="...">
            </a>
        </div>
        <div class="col" style="width: 10rem;">
            <a href="{{ route('trademark.nvidia') }}">
                <img src="{!! asset('img/carrousel/nvidia.png') !!}" class="img-fluid" alt="...">
            </a>
        </div>
        <div class="col" style="width: 10rem;">
            <a href="{{ route('trademark.hp') }}">
                <img src="{!! asset('img/carrousel/hp.png') !!}" class="img-fluid" alt="...">
            </a>
        </div>
    </div>
    <br>
    <!--New Products-->

    <div class="container-sm">
        <div class="p-3 border bg-light text-center fs-4"><strong>Nuevos Productos</strong></div>
    </div>
    <br>
    <div class="row">
        @foreach ($viewData['products_new'] as $product)
            <div class="col-lg-3 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                        <img src="{{ asset('/img/products/' . $product->getImage()) }}" class="card-img-top img-card"
                            style="height:20em; width:20em;">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"><strong>{{ $product->getName() }}</strong>
                        </a>
                        <p></p>
                        <a>
                            @if ($product->getPrice() == 0)
                                <span><strong class="text-primary fs-5">Gratis</strong></span>
                            @elseif ($product->getDiscountedprice() > 0)
                                <strong class="text-secondary text-decoration-line-through fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through"
                                        amount="{{ $product->getPrice() - $product->getDiscountedprice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @else
                                <strong class="text-primary fs-5">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @endif
                            <br>
                            <br>
                            @if ($product->getStock() > 0)
                                <span class="badge bg-primary text-white fs-6"><span class="iconify"
                                        data-icon="akar-icons:check"></span>
                                    CON EXISTENCIA</span>
                                {{-- // add to cart --}}
                                <form action="{{ route('cart.add', ['id' => $product->getId()]) }}" method="POST">
                                    @csrf
                                    <br>
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="hov btn btn-primary btn-sm fs-6">
                                        <span class="iconify" data-icon="mi:shopping-cart-add"></span>
                                        <strong>Agregar al carrito</strong>
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary text-white fs-6"><span class="iconify"
                                        data-icon="bi:x-lg"></span>

                                    SIN EXISTENCIA</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
