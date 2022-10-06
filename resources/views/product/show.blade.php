@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.js') }}"></script>
    <link href="{{ asset('css/star-rating-svg.css') }}" rel="stylesheet">


    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/img/products/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        <strong>{{ $viewData['product']->getName() }}</strong> <br><br>
                        <strong>
                            @if ($viewData['product']->getPrice() == 0)
                                <span class="fs-1 text-primary">Gratis</span>
                            @elseif ($viewData['product']->getDiscountedprice() > 0)
                                <span class="fs-1 text-primary"><strong class="text-decoration-line-through">
                                        <x-money class="text-decoration-line-through"
                                            amount="{{ $viewData['product']->getPrice() }}" currency="MXN" convert /></span>
                        </strong>
                        <span class="fs-1 text-primary">
                            <x-money
                                amount="{{ $viewData['product']->getPrice() - $viewData['product']->getDiscountedprice() }}"
                                currency="MXN" convert />
                        </span>
                    @else
                        <span class="fs-1 text-primary">
                            <x-money amount="{{ $viewData['product']->getPrice() }}" currency="MXN" convert />
                        </span>
                        @endif
                        </strong>
                        {{-- <br><br><strong>${{ $viewData['product']->getDiscountedprice() }} --}}
                        </h5>
                        <br>
                        <h5><strong>Descripción:</strong></h5>
                        <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                        <p class="card-text">Categoria: <strong>{{ $viewData['product']->getCategory() }}</strong></p>
                        <br>
                        @if ($viewData['product']->getStock() > 0)
                            <h5><strong>En existencia:</strong> {{ $viewData['product']->getStock() }}</h5>
                        @else
                            <h5><strong class="text-danger">Lo sentimos, por el momento este producto está agotado.</strong>
                            </h5>
                        @endif
                        <br>

                        <div class="my-rating">
                        </div>

                        <script>
                            $(".my-rating").starRating({
                                initialRating: 4,
                                strokeColor: '#894A00',
                                strokeWidth: 10,
                                starSize: 25
                              });
                              </script>

                        <p class="card-text">
                        <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Cantidad:</div>

                                        @if ($viewData['product']->getStock() > 0)
                                            <input type="number" class="form-control" name="quantity" value="1"
                                                min="1" max="{{ $viewData['product']->getStock() }}">
                                        @else
                                            <input type="number" class="form-control" name="quantity" value="0"
                                                min="0" max="{{ $viewData['product']->getStock() }}" disabled>
                                        @endif
                                    </div>
                                </div>
                                @if ($viewData['product']->getStock() > 0)
                                    <div class="col-auto">
                                        <button class="btn btn-black text-white" type="submit">Añadir al carrito</button>
                                    </div>
                                @else
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-black text-white" disabled>Agregar al
                                            carrito</button>
                                @endif

                            </div>
                        </form>

                        </p>
                </div>
            </div>
        </div>



        <table class="table table-borderless table-striped text-center mt-3">
            <thead>
                <tr>
                    <th scope="col" colspan="2" class="text-center">Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Marca:</strong></td>
                    <td>{{ $viewData['product']->getTrademark() }}</td>
                </tr>
                <tr>
                    <td><strong>Tipo:</strong></td>
                    <td>{{ $viewData['product']->getSubcategory() }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    </div>



@endsection
