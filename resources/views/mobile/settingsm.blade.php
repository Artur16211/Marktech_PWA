@extends('layouts.app')
@section('content')
<figure class="text-center">
    <blockquote class="blockquote">
      <p class="h1"><strong>AJUSTES</strong></p>
    </blockquote>
  </figure>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="arcticons:galaxy-themes" style="font-size: 32px;"></span></h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle"
                        style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Temas</p>
            <small class="text-muted">Cambiar la apariencia de la aplicación.</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="fluent:info-20-regular" style="font-size: 32px;"></span></h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle" style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Acerca de Marktech</p>
            <small class="text-muted"></small>
        </a>
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="iconify" data-icon="ei:question" style="font-size: 32px;"></span></h5>
                <small class="text-muted"><span class="iconify" data-icon="bi:arrow-right-circle" style="font-size: 32px;"></span></small>
            </div>
            <p class="mb-1">Ayuda</p>
            <small class="text-muted"></small>
        </a>
    </div>
@endsection
