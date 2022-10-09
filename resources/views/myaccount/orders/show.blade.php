{{-- stripe logic --}}
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LR6t0EB0toz6in5eez0DhV75FBHCJBvA7X0ttDzcdLWeBcFz4gPZZmrMjV1yVZA2vPG9c5MbrqxFhcXJoGjXfdk007z3OYPgC');
$session = \Stripe\Checkout\Session::create([
    'line_items' => [
        [
            'price_data' => [
                'currency' => 'mxn',
                'product_data' => [
                    'name' => 'Marktech: Pedido ' . $viewData['orders']->getId(),
                ],
                'unit_amount' => $viewData['orders']->getTotal() * 100,
            ],
            'quantity' => 1,
        ],
    ],
    'mode' => 'payment',
    // send success url with order id
    'success_url' => 'https://Marktech.ml/stripe/success/' . $viewData['orders']->getId(),
    'cancel_url' => 'https://Marktech.ml/stripe/cancel',
]);
?>

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-0 mx-auto">
                <div class="card-body">
                    <b class="fs-5">Fecha de pedido:</b> <a
                        class="fs-5">{{ Carbon\Carbon::parse($viewData['orders']->getCreatedat())->subHours(3)->subMinutes(2)->translatedFormat('l j F Y') }}</a><br>
                    <b class="fs-5">Código de Pedido:</b> <a class="fs-5">{{ $viewData['orders']->hashid() }}</a><br>
                    <b class="fs-5">Total: </b>
                    <a class="fs-5">
                        <x-money amount="{{ $viewData['orders']->getTotal() }}" currency="MXN" convert /><br />

                        @if ($viewData['orders']->getState() == 'No Pagado')
                            <b class="fs-5">Estado:</b> <a class="fs-5"><span
                                    class="text-warning">{{ $viewData['orders']->getState() }}</span></a><br />
                        @elseif ($viewData['orders']->getState() == 'Pagado')
                            <b class="fs-5">Estado:</b> <a class="fs-5"><span
                                    class="text-success">{{ $viewData['orders']->getState() }}</span></a><br />
                        @elseif ($viewData['orders']->getState() == 'Cancelado')
                            <b class="fs-5">Estado:</b> <a class="fs-5"><span
                                    class="text-danger">{{ $viewData['orders']->getState() }}</span></a><br />
                        @endif
                        @if ($viewData['orders']->getEstado() == 'Preparando Pedido' && $viewData['orders']->getState() == 'Pagado')
                            <b class="fs-5">Estado de envio:</b> <a class="fs-5"><span
                                    class="text-warning">{{ $viewData['orders']->getEstado() }}</span></a><br />
                        @elseif ($viewData['orders']->getEstado() == 'Enviado')
                            <b class="fs-5">Estado de envio:</b> <a class="fs-5"><span
                                    class="text-success">{{ $viewData['orders']->getEstado() }}</span></a><br />
                        @elseif ($viewData['orders']->getEstado() == 'Entregado')
                            <b class="fs-5">Estado de envio:</b> <a class="fs-5"><span
                                    class="text-success">{{ $viewData['orders']->getEstado() }}</span></a><br />
                        @endif

                        <b class="fs-5">Dirección de envio:</b> <a
                            class="fs-5">{{ $viewData['orders']->getAddress() }}</a><br>

                        <div class="hide-mobile">
                            <table class="table table-borderless table-striped text-center mt-3">
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
                                    @foreach ($viewData['orders']->getItems() as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('/img/products/' . $item->getProduct()->getImage()) }}"
                                                    alt="{{ $item->getProduct()->getName() }}" class="img-fluid"
                                                    width="100">
                                            </td>
                                            <td>
                                                <a class="link-success"
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
                                                    <x-money amount="{{ $item->getDiscountedprice() }}" currency="MXN"
                                                        convert />
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
                            <table class="table text-center">
                                <thead>
                                </thead>
                                <tbody>
                                    @foreach ($viewData['orders']->getItems() as $item)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img src="{{ asset('/img/products/' . $item->getProduct()->getImage()) }}"
                                                    alt="{{ $item->getProduct()->getName() }}" class="img-fluid"
                                                    width="100">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nombre</th>
                                            <td>
                                                <a class="link-success"
                                                    href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">
                                                    {{ $item->getProduct()->getName() }}
                                                </a>
                                            </td>
                                        <tr>
                                            <th scope="row">Código de Producto</th>
                                            <td>{{ $item->getId() }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Precio</th>
                                            <td>
                                                <x-money amount="{{ $item->getPrice() }}" currency="MXN" convert />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Descuento</th>
                                            @if ([$item->getDiscountedprice()] > 0)
                                                <td class="text-decoration-line-through">-
                                                    <x-money amount="{{ $item->getDiscountedprice() }}" currency="MXN"
                                                        convert />
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Cantidad</th>
                                            <td>{{ $item->getQuantity() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        @if ($viewData['orders']->getState() == 'No Pagado')
                            <p class="text-center fs-3"><strong>Escoge un método de pago:<strong></p>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="iconify" data-icon="logos:stripe" data-width="48"
                                                style="margin-right:18px"></span>
                                            <strong>Tarjeta de crédito o débito (Stripe)</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form
                                                action="{{ route('complete.order', ['id' => $viewData['orders']->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="payment_method" value="stripe" />
                                                <button class="btn btn-black" id="checkout-button" type="submit">Ir a
                                                    Stripe Checkout</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            <span class="iconify" data-icon="logos:paypal" data-width="32"
                                                style="margin-right:18px"></span>
                                            <strong>PayPal</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form
                                                action="{{ route('complete.order', ['id' => $viewData['orders']->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="payment_method" value="paypal" />
                                                <input type="hidden" name="id"
                                                    value="{{ $viewData['orders']->getId() }}" />
                                                <input type="hidden" name="total"
                                                    value="{{ $viewData['orders']->getTotal() }}" />
                                                <button type="submit" class="btn btn-black">Ir a Paypal Checkout</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br>
                        @if ($viewData['orders']->getState() == 'No Pagado')
                            <a href="{{ route('myaccount.orders.show.cancel', ['id' => $viewData['orders']->getId()]) }}"
                                class="btn btn-danger">Cancelar pedido</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(
            'pk_test_51LR6t0EB0toz6in5JxDEEhjoh1crVmg9l6nFIvY6ZgyPVPxQM60QKxBPXMLJrYamTdta1tyVrhXSeh4s1ZAv3pk900kyRQ38UQ'
        ) //Your Publishable key.
        const btn = document.getElementById('checkout-button');
        btn.addEventListener("click", function() {
            stripe.redirectToCheckout({
                sessionId: "<?php echo $session->id; ?> "
            })
        });
    </script>

@endsection
