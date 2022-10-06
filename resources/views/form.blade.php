@extends('layouts.app')

@section('content')

@section('title', 'Formulario')

<h1>Sugerencias:</h1>
<form action={{ route('contact') }} method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">*Correo:</label>
        <input type="email" name="name" type="text" class="form-control" required>
    </div>
<br>
    <div class="form-group">
        <label for="name">*Mensaje:</label>
        <input name="msg" type="text" class="form-control" required>
    </div>
<br>
    <div class="form-group">
        <button type="submit" id='btn-contact' class="btn bg-black text-white">Enviar</button>
    </div>
</form>

@endsection
