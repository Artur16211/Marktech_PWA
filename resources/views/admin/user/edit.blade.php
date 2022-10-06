@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar Usuario
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['product']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['product']->getName() }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Correo Electronico:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="email" value="{{ $viewData['product']->getEmail() }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input name="password" value="{{ $viewData['product']->getPassword() }}" type="text" class="form-control" disabled>
                </div>
                <select class="form-select mb-4" name="role" value="{{ $viewData['product']->getRole() }}" aria-label="Default select example" required>
                    <option selected>Tipo de usuario...</option>
                    <option value="client">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Gastado:</label>
                    <input name="balance" value="{{ $viewData['product']->getBalance() }}" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-black">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
