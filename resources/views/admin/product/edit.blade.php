@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar Producto
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}"
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
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number"
                                    class="form-control">
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
                    <input name="discounted_price" value="{{ $viewData['product']->getDiscountedprice() }}" type="number"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea class="form-control" name="description" rows="3">{{ $viewData['product']->getDescription() }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Existencias:</label>
                    <input name="stock" value="{{ $viewData['product']->getStock() }}" type="number"
                        class="form-control">
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
                <select class="form-select mb-4" name="featured" value="{{ $viewData['product']->getFeatured() }}"
                    aria-label="Default select example" required>
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
                <button type="submit" class="btn btn-black">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
