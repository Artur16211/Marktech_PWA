@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Agregar Usuario
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Correo Electronico:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="email" value="{{ old('email') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input name="password" value="{{ old('password') }}" type="text" class="form-control">
                </div>
                <select class="form-select mb-4" name="role" value="{{ old('role') }}" aria-label="Default select example" required>
                    <option selected>Tipo de usuario...</option>
                    <option value="client">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Gastado:</label>
                    <input name="balance" value="{{ old('balance') }}" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            Administrar usuarios
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña(Encriptada)</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getEmail() }}</td>
                            <td>{{ $product->getPassword() }}</td>
                            <td>{{ $product->getRole() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.user.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.user.delete', $product->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
