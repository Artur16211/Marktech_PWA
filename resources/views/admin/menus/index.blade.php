@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Agregar Marca
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.menus.storet') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre de la Marca:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="trademarks" value="{{ old('trademarks') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            Administrar Marcas
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Marca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['trademarks'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getTrademarks() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.menus.editt', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.menus.deletet', $product->getId()) }}" method="POST">
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
    <br>
    {{-- categorias --}}
    <div class="card mb-4">
        <div class="card-header">
            Agregar Categoria
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.menus.storec') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre de la Categoria:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="categories" value="{{ old('categories') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            Administrar Categorias
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categorias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['categories'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getCategories() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.menus.editc', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.menus.deletec', $product->getId()) }}" method="POST">
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
    <br>
    {{-- Subcategorias --}}
    <div class="card mb-4">
        <div class="card-header">
            Agregar Subategoria
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.menus.stores') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre de la Subcategoria:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="subcategories" value="{{ old('subcategories') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            Administrar Subcategorias
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Subcategorias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['subcategories'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getSubcategories() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.menus.edits', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.menus.deletes', $product->getId()) }}" method="POST">
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
