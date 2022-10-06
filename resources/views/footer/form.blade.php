@extends('layouts.app')

@section('content')

@section('title', 'Marktech - Sugerencias')

<h1 class="text-center"><strong>SUGERENCIAS:</strong></h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <form action={{ route('contact') }} method="POST">
                        {{ csrf_field() }}



                        <div class="form-group">
                            <label for="name"><strong>*Nombre:</strong></label>
                            <input type="text" name="name" type="text" class="form-control"
                                placeholder="Escribe tu Nombre..." required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name"><strong>*Correo:</strong></label>
                            <input type="email" name="mail" type="text" class="form-control"
                                placeholder="Escribe tu Correo..." required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name"><strong>*Mensaje:</strong></label>
                            <textarea name="msg" type="text" class="form-control" placeholder="Escribe aqui..." required></textarea>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" id='btn-contact' class="btn btn-black text-white">Enviar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection
