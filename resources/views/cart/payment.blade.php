@extends('layouts.app')
@section('content')

@section('title', 'Marktech - Dirección')

<h5 class="text-center"><strong>Productos:</strong></h5>

<form action="/datos" method="POST">

    <div class="card">
        <div class="card-body">
            @csrf
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
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('/img/products/' . $product->image) }}"
                                    alt="{{ $product->getName() }}" class="img-fluid" width="100">
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

                </div>
            </div>
        </div>
    </div>

    <br>

    <select class="form-select mb-4" name="address" aria-label="Default select example" required>
        <option value="" selected disabled>Escoge la dirección...</option>
        @foreach ($addresses as $dir)
            <option
                value="{{ $dir->calle }} {{ $dir->exterior }}, {{ $dir->colonia }}, {{ $dir->municipio }}, {{ $dir->estado }}">
                {{ $dir->calle }} {{ $dir->exterior }}, {{ $dir->colonia }}, {{ $dir->municipio }},
                {{ $dir->estado }}</option>
        @endforeach
    </select>
    <a href="/direcciones" class="btn btn-black mb-4">Agregar una dirección</a>


    <div class="col-md-4 mb-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0"><strong>Resumen</strong></h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Productos
                        <span>
                            <x-money amount="{{ $viewData['total'] }}" currency="MXN" convert />
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Envio
                        <span>Gratis</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                            <strong>Total</strong>

                            <p class="mb-0">(Incluyendo IVA)</p>

                        </div>
                        <span><strong>
                                <x-money amount="{{ $viewData['total'] }}" currency="MXN" convert />
                            </strong></span>
                    </li>
                </ul>

                @if (count($viewData['products']) > 0)
                    <button type="submit" button class="btn btn-black mb-2">Crear pedio</button>
                @endif

</form>

</div>
</div>
</div>

@endsection
