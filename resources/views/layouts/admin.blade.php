<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('js/dark-mode-switch.min.js') }}" defer></script>
    <link href="{{ asset('css/dark-mode-admin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>@yield('title', 'Marktech')</title>

</head>

<body>

    <div class="row g-0">
        <!-- sidebar -->
        <div class="p-3 col fixed text-white bg-black">
            <img src="{!! asset('img/marktechlogo3outlinemini.png') !!}">
            <p class="fs-4 text-center">Modo Administrador</p>
            <hr />
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="darkSwitch" />
                <label class="custom-control-label" for="darkSwitch">Modo Oscuro</label>
            </div>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white text-center">Productos</a>
                <li><a href="{{ route('admin.item.index') }}" class="nav-link text-white text-center">Productos
                        Vendidos</a>
                <li><a href="{{ route('admin.address.index') }}"
                        class="nav-link text-white text-center">Direcciones</a>
                <li><a href="{{ route('admin.order.index') }}" class="nav-link text-white text-center">Pedidos</a>
                <li><a href="{{ route('admin.user.index') }}" class="nav-link text-white text-center">Usuarios</a>
                    <li><a href="{{ route('admin.menus.index') }}" class="nav-link text-white text-center">Editar Menus</a>
                </li>
                <div class="text-center">
                    <a href="{{ route('home.index') }}" class="mt-2 btn btn-dark text-white">
                        Modo usuario</a>
                    </div>
            </ul>
        </div>
        <!-- sidebar -->
        <div class="col content-grey">
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
