@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar mi cuenta
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('myaccount.edit.update', ['id' => $viewData['user']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre completo:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['user']->getName() }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Correo Electronico:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="email" value="{{ $viewData['user']->getEmail() }}" type="text"
                                    class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-black">Confirmar</button>
            </form>
            <br>
            <a href="/password/reset" class="btn btn-black">Cambiar contraseña</a>
        </div>
    </div>
@endsection
