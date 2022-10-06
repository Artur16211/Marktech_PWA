@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    {{-- <div class="card mb-4">
        <div class="card-header">
            Agregar Dirección
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.address.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Usuario:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="user_id" value="{{ old('user_id') }}" type="number" class="form-control">
                            </div>
                    </div>
                    <div class="mb-3">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control">
                            </div>
                    </div>

                <div class="mb-3">
                    <label class="form-label">Código Postal:</label>
                    <input name="postal" value="{{ old('postal') }}" type="number" class="form-control">
                </div>
                <h5>Estado</h5>
                <select class="form-select mb-4" name="estado" value="{{ old('estado') }}" aria-label="Default select example" required>
                    <option selected>Escoge tu estado...</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Municipio:</label>
                    <input name="municipio" value="{{ old('municipio') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Colonia</label>
                    <input name="colonia" value="{{ old('colonia') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle</label>
                    <input name="calle" value="{{ old('calle') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero Exterior</label>
                    <input name="exterior" value="{{ old('exterior') }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero Interior</label>
                    <input name="interior" value="{{ old('interior') }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle de referencia 1</label>
                    <input name="calle1" value="{{ old('calle1') }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle de referencia 2</label>
                    <input name="calle2" value="{{ old('calle2') }}" type="text" class="form-control">
                </div>
                <h5>Tipo</h5>
                <select class="form-select mb-4" name="tipo" value="{{ old('tipo') }}" aria-label="Default select example" required>
                    <option selected>Tipo...</option>
                    <option value="trabajo">Trabajo</option>
                    <option value="casa">Casa</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input name="telefono" value="{{ old('telefono') }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Información Adicional</label>
                    <textarea name="extra" type="text" class="form-control">{{ old('extra') }}</textarea>
                </div>
                <button type="submit" class="btn btn-black">Confirmar</button>
        </div>
        </form>
    </div> --}}

    <div class="card">
        <div class="card-header">
            Administrar Direcciones
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código de Usuario</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getUserId() }}</td>
                            <td>{{ $product->calle }} {{ $product->exterior }}, {{ $product->colonia }}, {{ $product->municipio }}, {{ $product->estado }}</td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('admin.address.edit', ['id' => $product->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.address.delete', $product->getId()) }}" method="POST">
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
