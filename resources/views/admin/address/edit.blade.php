@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar Dirección
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.address.update', ['id' => $viewData['product']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Id de Usuario:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="user_id" value="{{ $viewData['product']->getUserId() }}" type="number"
                                    class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="nombre" value="{{ $viewData['product']->getNombre() }}" type="text"
                                    class="form-control">

                        </div>
                    </div>
                <div class="mb-3">
                    <label class="form-label">Código Postal:</label>
                    <input name="postal" value="{{ $viewData['product']->getPostal() }}" type="number" class="form-control">
                </div>
                <h5>Estado</h5>
                <select class="form-select mb-4" name="estado" value="{{ $viewData['product']->getEstado() }}"  aria-label="Default select example" required>
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
                    <input name="municipio" value="{{ $viewData['product']->getMunicipio() }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Colonia:</label>
                    <input name="colonia" value="{{ $viewData['product']->getColonia() }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle:</label>
                    <input name="calle" value="{{ $viewData['product']->getCalle() }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero Exterior:</label>
                    <input name="exterior" value="{{ $viewData['product']->getExterior() }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero Interior:</label>
                    <input name="interior" value="{{ $viewData['product']->getInterior() }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle de referencia 1:</label>
                    <input name="calle1" value="{{ $viewData['product']->getCalle1() }}" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calle de referencia 2:</label>
                    <input name="calle2" value="{{ $viewData['product']->getCalle2() }}" type="text" class="form-control">
                </div>
                <h5>Tipo</h5>
                <select class="form-select mb-4" name="tipo" value="{{ $viewData['product']->getTipo() }}" aria-label="Default select example" required>
                    <option selected>Tipo...</option>
                    <option value="trabajo">Trabajo</option>
                    <option value="casa">Casa</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Telefono:</label>
                    <input name="telefono" value="{{ $viewData['product']->getTelefono() }}" type="number" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Información Adicional:</label>
                    <textarea name="extra" type="text" class="form-control">{{ $viewData['product']->getExtra() }}</textarea>
                </div>
                <button type="submit" class="btn btn-black">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
