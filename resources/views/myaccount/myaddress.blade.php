@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-borderless table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Dirección</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td><strong>Nombre:</strong> {{ $product->nombre }}, <strong>Calle:</strong>
                                {{ $product->calle }} Nº
                                {{ $product->exterior }},
                                <strong>Colonia:</strong> {{ $product->colonia }}, <strong>Estado:</strong>
                                {{ $product->estado }}
                            </td>
                            <td>
                                <a class="btn btn-black"
                                    href="{{ route('myaccount.myaddress.edit', ['id' => $product->hashid()]) }}">
                                    <span class="iconify" data-icon="clarity:note-edit-solid"></span></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('myaccount.myaddress.delete', $product->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <span class="iconify" data-icon="fluent:delete-24-filled"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-black" href="/direcciones">Agregar Dirección</a>
    </div>
@endsection
