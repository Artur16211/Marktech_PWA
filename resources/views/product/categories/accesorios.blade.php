@extends('layouts.navbar')
@section('content')
<section id="filters">
    <div class="container position-relative">
        <form method="GET">
            <<input type="text" class="form-control mx-auto" name="barra" placeholder="Buscar con filtros..."
                style="width: 300px; height: 50px"><br>

                {!! $viewData['products_accesorios']->withQueryString()->links('layouts.pagination') !!}

            <div class="position-absolute top-0 start-0">
                {{-- sort select --}}
                <form method="GET">
                    <h5><strong>Ordenar por:</strong></h5>
                    <select class="form-control form-control-sm" name="sort">
                        <option name="sort" value="name">Nombre</option>
                        <option name="sort" value="price_asc">Precio ascendente</option>
                        <option name="sort" value="price_desc">Precio descendente</option>
                        <option name="sort" value="trademark_asc">Marca ascendente</option>
                        <option name="sort" value="trademark_desc">Marca descendente</option>
                        {{-- <option name="sort" value="stock">Nombre descendente</option> --}}
                    </select>
                </form>
                <br>
                {{-- checkboxs --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Fabricante</strong>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                @foreach ($viewData['trademarks'] as $menus)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="trademark"
                                            value="toshiba" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            <input class="form-check-input" type="checkbox" name="trademark"
                                                value="{{ $menus->trademarks }}" id="flexCheckChecked">
                                            {{ $menus->trademarks }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {{-- checkboxs --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <strong>Precio</strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="1000-2000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        1000 - 2000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="2000-3000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        2000 - 3000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="3000-4000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        3000 - 4000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="4000-5000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        4000 - 5000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="5000-..." id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        5000 - ...
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>

<section id="filters-mobile">
    <div class="container position-relative">
        <form method="GET">
            <<input type="text" class="form-control mx-auto" name="barra" placeholder="Buscar con filtros..."
                style="width: 300px; height: 50px"><br>

                {!! $viewData['products_accesorios']->withQueryString()->links('layouts.pagination') !!}

            <div class="top-0 start-0">
                {{-- sort select --}}
                <form method="GET">
                    <h5><strong>Ordenar por:</strong></h5>
                    <select class="form-control form-control-sm" name="sort">
                        <option name="sort" value="name">Nombre</option>
                        <option name="sort" value="price_asc">Precio ascendente</option>
                        <option name="sort" value="price_desc">Precio descendente</option>
                        <option name="sort" value="trademark_asc">Marca ascendente</option>
                        <option name="sort" value="trademark_desc">Marca descendente</option>
                        {{-- <option name="sort" value="stock">Nombre descendente</option> --}}
                    </select>
                </form>
                <br>
                {{-- checkboxs --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Fabricante</strong>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                @foreach ($viewData['trademarks'] as $menus)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="trademark"
                                            value="toshiba" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            <input class="form-check-input" type="checkbox" name="trademark"
                                                value="{{ $menus->trademarks }}" id="flexCheckChecked">
                                            {{ $menus->trademarks }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {{-- checkboxs --}}
                <div class="accordion accordion-flush" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <strong>Precio</strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="1000-2000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        1000 - 2000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="2000-3000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        2000 - 3000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="3000-4000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        3000 - 4000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="4000-5000" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        4000 - 5000
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="price"
                                        value="5000-..." id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        5000 - ...
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <br>
</section>

@if (isset($viewData['products_accesorios']))
@foreach ($viewData['products_accesorios'] as $product)
    <div class="container ">
        <div class="card mb-3 mx-auto" style="max-width: 840px;">
            <div class="row no-gutters">

                <div class="col-md-4">

                    <a href="{{ route('product.show', ['id' => $product->id]) }}">
                        <img src="{{ asset('/img/products/' . $product->image) }}" width="200px"
                            height="200px" alt="imagen">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                        <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                        </a>
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

                    </div>

                </div>

            </div>
        </div>
    </div>
@endforeach
@endif

{!! $viewData['products_accesorios']->withQueryString()->links('layouts.pagination') !!}




@endsection
