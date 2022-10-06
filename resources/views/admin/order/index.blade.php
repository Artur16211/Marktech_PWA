@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    {{-- <div class="card mb-4">
        <div class="card-header">
            Agregar Pedido
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.order.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Total:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="total" value="{{ old('total') }}" type="number" class="form-control">
                            </div>
                        </div>
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input name="user_id" value="{{ old('user_id') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <input name="paid" value="{{ old('paid') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección de envio</label>
                    <input name="address" value="{{ old('address') }}" type="text" class="form-control">
                </div>
                <select class="form-select mb-4" name="status" value="{{ old('status') }}" aria-label="Default select example" required>
                    <option value="" selected disabled>Estado de envio...</option>
                    <option value="Preparando Pedido">Preparando Pedido</option>
                    <option value="Enviado">Enviado</option>
                </select>

                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div> --}}

    <div class="card">
        <div class="card-header">
            Pedidos Pagados
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Modificar</th>
                        {{-- <th scope="col">Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['pagados'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getTotal() }}</td>
                            <td>{{ $product->getUserId() }}</td>
                            <td>{{ $product->getState() }}</td>
                            <td>{{ $product->getAddress() }}</td>
                            <td>{{ $product->getEstado() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.order.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.order.delete', $product->getId()) }}" method="POST">
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
<br>
    <div class="card">
        <div class="card-header">
            Pedidos Cancelados
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Modificar</th>
                        {{-- <th scope="col">Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['cancelado'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getTotal() }}</td>
                            <td>{{ $product->getUserId() }}</td>
                            <td>{{ $product->getState() }}</td>
                            <td>{{ $product->getAddress() }}</td>
                            <td>{{ $product->getEstado() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.order.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.order.delete', $product->getId()) }}" method="POST">
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
<br>
    <div class="card">
        <div class="card-header">
            Pedidos Pendientes
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Modificar</th>
                        {{-- <th scope="col">Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['pendiente'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getTotal() }}</td>
                            <td>{{ $product->getUserId() }}</td>
                            <td>{{ $product->getState() }}</td>
                            <td>{{ $product->getAddress() }}</td>
                            <td>{{ $product->getEstado() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.order.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.order.delete', $product->getId()) }}" method="POST">
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
<br>
    <div class="card">
        <div class="card-header">
            Todos los Pedidos
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Envio</th>
                        <th scope="col">Modificar</th>
                        {{-- <th scope="col">Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getTotal() }}</td>
                            <td>{{ $product->getUserId() }}</td>
                            <td>{{ $product->getState() }}</td>
                            <td>{{ $product->getAddress() }}</td>
                            <td>{{ $product->getEstado() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.order.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.order.delete', $product->getId()) }}" method="POST">
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
