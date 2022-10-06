@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Agregar productos
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
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
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        &nbsp;
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cant. de Descuento:</label>
                    <input name="discounted_price" value="{{ old('discounted_price') }}" type="number"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Existencias:</label>
                    <input name="stock" value="{{ old('stock') }}" type="number" class="form-control">
                </div>
                <h5>Marca:</h5>
                <select name="trademark" class="form-control">
                    <option value="">Seleccione una marca</option>
                    @foreach ($viewData['trademarks'] as $menus)
                        <option value="{{ $menus->trademarks }}">{{ $menus->trademarks }}</option>
                    @endforeach
                </select>
                <br>
                <h5>Categoria</h5>
                <select name="category" class="form-control">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($viewData['categories'] as $menus)
                        <option value="{{ $menus->categories }}">{{ $menus->categories }}</option>
                    @endforeach
                </select>
                <br>
                <h5>SubCategoria</h5>
                <select name="subcategory" class="form-control">
                    <option value="">Seleccione una subcategoria</option>
                    @foreach ($viewData['subcategories'] as $menus)
                        <option value="{{ $menus->subcategories }}">{{ $menus->subcategories }}</option>
                    @endforeach
                </select>
                <br>
                <h5>¿Destacado?</h5>
                <select class="form-select mb-4" name="featured" value="{{ old('featured') }}"
                    aria-label="Default select example" required>
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            Administrar productos
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Subcategoria</th>
                        <th scope="col">¿Destacado?</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getTrademark() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $product->getCategory() }}</td>
                            <td>{{ $product->getSubcategory() }}</td>
                            <td>{{ $product->getFeatured() }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.product.delete', $product->getId()) }}" method="POST">
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
