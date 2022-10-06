@extends('layouts.app')
@section('content')

@section('title', 'Marktech - Carrito')
<div class="card">
    <div class="card-body">
        <table class="table table-borderless table-striped text-center">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código de Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('/img/products/' . $product->image) }}" alt="{{ $product->getName() }}" class="img-fluid" width="100">
                            </td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getId() }}</td>
                            <td>
                                <x-money amount="{{ $product->getPrice() - $product->getDiscountedprice() }}"
                                    currency="MXN" convert />
                            </td>
                            @if ([$product->getDiscountedprice()] > 0)
                                <td class="text-decoration-line-through">-
                                    <x-money amount="{{ $product->getDiscountedprice() }}" currency="MXN" convert />
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td>{{ session('products')[$product->getId()] }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a><b>Total: </b><x-money amount="{{ $viewData['total'] }}" currency="MXN" convert /></a>
                {{-- <a><b>Cantidad:</b> {{ $viewData['count'] }}</a> --}}
                <br><br />
                {{-- @if (count($viewData['products']) > 0 && !Auth::guest())
                    <a href="{{ route('cart.payment') }}">
                        <button class="btn btn-black mb-2">
                            Realizar pedido
                        </button>
                    </a>
                    <a href="{{ route('cart.delete') }}">
                        <button class="btn btn-danger mb-2">
                            Eliminar articulos
                        </button>
                    </a>
                @elseif (count($viewData['products']) > 0)
                    <a href="/IniciarSesion">
                        <button class="btn btn-black mb-2">
                            Iniciar Sesión
                        </button>
                    </a>
                    <a href="{{ route('cart.delete') }}">
                        <button class="btn btn-danger mb-2">
                            Eliminar articulos
                        </button>
                    </a>
                @endif --}}

                @switch($viewData['total'])
                    @case(0)
                        <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                            Volver al inicio</button>
                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Eliminar articulos
                            </button>
                        </a>
                    @break

                    @case(count($viewData['products']) > 0 && !Auth::guest())
                        <a href="{{ route('cart.payment') }}">
                            <button class="btn btn-black mb-2">
                                Realizar pedido
                            </button>
                        </a>
                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Eliminar articulos
                            </button>
                        </a>
                    @break

                    @case(count($viewData['products']) > 0 && $viewData['total'] == 0 && !Auth::guest())
                        <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                            Volver al inicio</button>
                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Eliminar articulos
                            </button>
                        </a>
                    @break

                    @case(count($viewData['products']) > 0)
                        <a href="/IniciarSesion">
                            <button class="btn btn-black mb-2">
                                Iniciar Sesión
                            </button>
                        </a>
                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Eliminar articulos
                            </button>
                        </a>
                    @break

                    @default
                        <button class="btn btn-black mb-2" onclick="window.location.href='/'">
                            Volver al inicio</button>
                @endswitch
            </div>
        </div>
    </div>
</div>

@endsection
