@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

    <div class="hide-mobile">
        {!! $viewData['orders']->withQueryString()->links('layouts.pagination') !!}
    </div>

    <div class="hide-desktop mobile-pagination">
        {!! $viewData['orders']->withQueryString()->links('layouts.paginationm') !!}
    </div>

    @forelse ($viewData["orders"] as $order)
        <div class="card mb-4">
            <div class="card-header">
                <strong
                    class="text-primary">{{ Carbon\Carbon::parse($order->getCreatedat())->subHours(3)->subMinutes(2)->translatedFormat('l j F Y') }}</strong>
            </div>
            <div class="card-body">
                <b>Código de Pedido:</b> {{ $order->hashid() }}<br>
                <b>Total: </b>
                <x-money amount="{{ $order->getTotal() }}" currency="MXN" convert /><br />

                @if ($order->getState() == 'No Pagado')
                    <b>Estado:</b> <span class="text-warning">{{ $order->getState() }}</span><br />
                @elseif ($order->getState() == 'Pagado')
                    <b>Estado:</b> <span class="text-success">{{ $order->getState() }}</span><br />
                @elseif ($order->getState() == 'Cancelado')
                    <b>Estado:</b> <span class="text-danger">{{ $order->getState() }}</span><br />
                @endif
                @if ($order->getEstado() == 'Preparando Pedido' && $order->getState() == 'Pagado')
                    <b>Estado de envio:</b> <span class="text-warning">{{ $order->getEstado() }}</span><br />
                @elseif ($order->getEstado() == 'Enviado')
                    <b>Estado de envio:</b> <span class="text-success">{{ $order->getEstado() }}</span><br />
                @elseif ($order->getEstado() == 'Entregado')
                    <b>Estado de envio:</b> <span class="text-success">{{ $order->getEstado() }}</span><br />
                @endif

                {{-- @if ($order->getState() == 'No Pagado' && $order->getId() == $viewData['last_order']) --}}
                <br>
                @if ($order->getState() == 'No Pagado')
                    <b>Ver detalles del pedido para completar tu compra.</b> <br>
                @endif
                <a href="{{ route('myaccount.orders.show', $order->hashid()) }}" class="btn btn-black">Ver Detalles</a>

                <div class="hide-mobile">
                    <table class="table table-borderless table-striped text-center
                    mt-3">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Id único</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->getItems() as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/img/products/' . $item->getProduct()->getImage()) }}"
                                            alt="{{ $item->getProduct()->getName() }}" class="img-fluid" width="100">
                                    </td>
                                    <td>
                                        <a class="link-primary"
                                            href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">
                                            {{ $item->getProduct()->getName() }}
                                        </a>
                                    </td>
                                    <td>{{ $item->getId() }}</td>
                                    <td>
                                        <x-money amount="{{ $item->getPrice() }}" currency="MXN" convert />
                                    </td>
                                    @if ([$item->getDiscountedprice()] > 0)
                                        <td class="text-decoration-line-through">-
                                            <x-money amount="{{ $item->getDiscountedprice() }}" currency="MXN" convert />
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{ $item->getQuantity() }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hide-desktop">
                    <table class="table table-borderless table-striped text-center
                    mt-3">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->getItems() as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/img/products/' . $item->getProduct()->getImage()) }}"
                                            alt="{{ $item->getProduct()->getName() }}" class="img-fluid" width="100">
                                    </td>
                                    <td>
                                        <a class="link-primary"
                                            href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">
                                            {{ $item->getProduct()->getName() }}
                                        </a>
                                    </td>
                                    <td>
                                        <x-money amount="{{ $item->getPrice() }}" currency="MXN" convert />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
            No has realizado ningun pedido.
        </div>
    @endforelse

    <div class="hide-mobile">
        <div class="hide-mobile">
            {!! $viewData['orders']->withQueryString()->links('layouts.pagination') !!}
        </div>

        <div class="hide-desktop mobile-pagination">
            {!! $viewData['orders']->withQueryString()->links('layouts.paginationm') !!}
        </div>
    </div>

    <div class="hide-desktop mobile-pagination">
        {!! $viewData['orders']->withQueryString()->links('layouts.paginationm') !!}
    </div>
@endsection
