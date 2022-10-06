@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Modificar Dirección
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('myaccount.myaddress.update', ['id' => $viewData['product']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8 mb-4 mx-auto">
                        <div class="card mb-4">
                            <div class="card-header py-3 mx-auto">
                                <h5 class="mb-0"><strong>Información de Envio</strong></h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <form>

                                    <div class="row mb-4">
                                        <div class="col">

                                            <div class="form-outline">

                                                <label class="form-label" for="names" name="nombre"
                                                    id="name">Nombre y
                                                    apellido</label>
                                                <input type="text" name="nombre" placeholder="Escribe el nombre aqui..."
                                                    class="form-control"
                                                    value="{{ old('nombre', $viewData['product']->getNombre()) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address" id="address">Código
                                            postal</label>
                                        <input type="number" name="postal" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('postal', $viewData['product']->getPostal()) }}" required>
                                    </div>

                                    <h5>Estado</h5>
                                    <select class="form-select mb-4" name="estado" aria-label="Default select example"
                                        value="{{ old('estado', $viewData['product']->getEstado()) }}" required>
                                        <option value="" selected disabled>Escoge tu estado...</option>
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

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address"
                                            id="address">Municipio</label>
                                        <input type="text" name="municipio" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('municipio', $viewData['product']->getMunicipio()) }}" required>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address"
                                            id="address">Colonia</label>
                                        <input type="text" name="colonia" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('colonia', $viewData['product']->getColonia()) }}" required>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address" id="address">Calle</label>
                                        <input type="text" name="calle" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('calle', $viewData['product']->getCalle()) }}" required>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address" id="address">Número
                                            exterior</label>
                                        <input type="number" name="exterior" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('exterior', $viewData['product']->getExterior()) }}" required>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address" id="address">Nº
                                            interior/Depto</label>
                                        <input type="number" name="interior" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('interior', $viewData['product']->getInterior()) }}">
                                    </div>

                                    <h5>Entre calles</h5>


                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="address" name="address" id="address">Calle
                                            1</label>
                                        <input type="text" name="calle1" placeholder="Escribe la dirección aqui..."
                                            class="form-control"
                                            value="{{ old('calle1', $viewData['product']->getCalle1()) }}">
                                    </div>

                                    <!-- Number input -->
                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="phone" name="phone" id="phone">Calle
                                            2</label>
                                        <input type="text" name="calle2" placeholder="Escribe el telefono aqui..."
                                            class="form-control"
                                            value="{{ old('calle2', $viewData['product']->getCalle2()) }}">
                                    </div>

                                    <!-- Message input -->
                                    <h5>Tipo</h5>
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="tipo" value="trabajo"
                                            id="flexRadioDefault1"
                                            value="{{ old('tipo', $viewData['product']->getTipo()) }}" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Trabajo
                                        </label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" name="tipo" value="casa"
                                            id="flexRadioDefault2"
                                            value="{{ old('tipo', $viewData['product']->getTipo()) }}" required>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Casa
                                        </label>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="extra" name="extra" id="extra">Teléfono
                                            de
                                            contacto</label>
                                        <input type="text" name="telefono"
                                            placeholder="Escribe informacion adicional aqui..." class="form-control"
                                            value="{{ old('telefono', $viewData['product']->getTelefono()) }}" required>
                                    </div>

                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="extra" name="extra"
                                            id="extra">Información
                                            adicional</label>
                                        <textarea type="textarea" name="extra" placeholder="Escribe informacion adicional aqui..." class="form-control"
                                            value="{{ old('extra', $viewData['product']->getExtra()) }}"></textarea>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <button type="submit" button class="btn btn-black mb-2">Actualizar dirección</button>
            </form>
        </div>
    </div>
@endsection
