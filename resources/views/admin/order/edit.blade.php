@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar Pedido
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.order.update', ['id' => $viewData['product']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Total:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="total" value="{{ $viewData['product']->getTotal() }}" type="number"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Usuario:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="user_id" value="{{ $viewData['product']->getUserId() }}" type="number"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <input name="paid" value="{{ $viewData['product']->getState() }}" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección:</label>
                    <input name="address" value="{{ $viewData['product']->getAddress() }}" type="text" class="form-control" required>
                </div>
                <select class="form-select mb-4" name="status" value="{{ $viewData['product']->getEstado() }}" aria-label="Default select example" required>
                    <option value="" selected disabled>Estado de envio...</option>
                    <option value="Preparando Pedido">Preparando Pedido</option>
                    <option value="Enviado">Enviado</option>
                    <option value="Entregado">Entregado</option>
                </select>

                <button type="submit" class="btn btn-black">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
