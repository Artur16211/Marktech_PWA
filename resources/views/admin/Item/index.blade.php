@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')

    <div class="card">
        <div class="card-header">
            Administrar Productos Vendidos
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id único</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Codigo de Producto</th>
                        {{-- <th scope="col">Modificar</th> --}}
                        {{-- <th scope="col">Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getQuantity() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $product->getOrderId() }}</td>
                            <td>{{ $product->getProductId() }}</td>
                            {{-- <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admin.item.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td> --}}
                            <td>
                                {{-- <form action="{{ route('admin.item.delete', $product->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
