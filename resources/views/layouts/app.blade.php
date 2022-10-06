<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- Bootstrap CSS -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dark-mode-switch.min.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dark-mode.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <title>@yield('title', 'Marktech')</title>
</head>

<body>
    <!-- header -->

    <div class="container-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-white"><a href="/"> <img
                    src="{!! asset('img/mk2otln.png') !!}">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home.index') }}"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-md-4">
                        <div class="input-group">
                            <form action="/busqueda" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="barra"
                                        placeholder="Buscar productos..." style="width: 300px; height: 50px">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                        </button>
                                    </span>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">

                            @guest
                                <a class="nav-link active" href="{{ route('cart.index') }}"><span class="iconify"
                                        data-icon="eva:shopping-cart-outline" data-width="24"></span> Carrito</a>
                                <a class="nav-link active" href="/IniciarSesion">Iniciar Sesión</a>
                                <a class="nav-link active" href="/Registro">Registrarse</a>
                            @else
                                @if (Auth::user()->role == 'admin')
                                    <a class="nav-link active fs-5"
                                        href="{{ route('admin.product.index', ['id' => Auth::user()->id]) }}">Modo
                                        administrador</a>
                                @endif

                                <a class="nav-link active position-relative" href="{{ route('cart.index') }}"><span
                                        class="iconify" data-icon="eva:shopping-cart-outline" data-width="24"></span>
                                    Carrito
                                    {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                  </span> --}}
                                </a>

                                <a class="nav-link active" href="{{ route('myaccount.orders') }}">Mis Compras</a>
                                <a class="nav-link active" href="/micuenta">Mi Cuenta</a>
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <a role="button" class="nav-link active"
                                        onclick="document.getElementById('logout').submit();">Salir</a>

                                    @csrf
                                </form>

                            @endguest


                        </div>
                        <div class="form-check
                                form-switch">
                            <input type="checkbox" class="form-check-input" id="darkSwitch" />
                            <label class="custom-control-label" for="darkSwitch">Modo Oscuro</label>
                        </div>
                    </div>


                </div>

        </nav>

        <!--Navbar-->
        </nav>
        <br>
        <nav class="navbar navbar-expand-lg navbar-dark bg-black rounded">

            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <li class="nav-item dropdown s">
                        <a class="btn btn-link btn-lg" href="/hardware" id="navbarDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Hardware <span class="iconify"
                                data-icon="bx:down-arrow"></span></a>
                        {{-- <a class="btn btn-link btn-lg dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    </a> --}}
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul>
                                <li><a class="dropdown-item" href="/armatucomputadora">Arma tu
                                        computadora</a></li>
                                <li><a class="dropdown-item" href="/hardware/procesadores">Procesadores</a></li>
                                <li><a class="dropdown-item" href="/hardware\motherboards">Targetas Madre</a></li>
                                <li><a class="dropdown-item" href="/hardware\gabinetes">Gabinetes</a></li>
                                <li><a class="dropdown-item" href="/hardware\graficas">Targetas de video</a></li>
                                <li><a class="dropdown-item" href="/hardware\ram">Memorias RAM</a></li>
                                <li><a class="dropdown-item" href="/hardware\disipadores">Disipadores</a></li>
                                <li><a class="dropdown-item" href="/hardware\fuentes">Fuentes de Poder</a></li>
                            </ul>
                            <ul>
                                <li><a class="dropdown-item" href="/almacenamiento">Almacenamiento</a></li>
                                <li><a class="dropdown-item" href="/hardware\ssd">Unidades de Estado Sólido (SSD)</a>
                                </li>
                                <li><a class="dropdown-item" href="/hardware\hdd">Discos Duros</a></li>
                                <li><a class="dropdown-item" href="/hardware\ram">Memorias RAM</a></li>
                                <li><a class="dropdown-item" href="/hardware\usb">USB/SD</a></li>
                            </ul>
                        </ul>
                    </li>
            </ul>
            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="btn btn-link btn-lg" href="/accesorios" id="navbarDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Accesorios <span class="iconify"
                            data-icon="bx:down-arrow"></span></a>
                    {{-- <a class="btn btn-link btn-lg dropdown-toggle" href="/todo" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    </a> --}}
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a class="dropdown-item" href="/accesrios">Accesorios</a></li>
                            <li><a class="dropdown-item" href="/accesorios\audifonos">Audifonos</a></li>
                            <li><a class="dropdown-item" href="/accesorios\alfombrillas">Alfombrillas</a></li>
                            <li><a class="dropdown-item" href="/accesorios\mouse">Mouse</a></li>
                            <li><a class="dropdown-item" href="/accesorios\teclados">Teclados</a></li>
                        </ul>
                    </ul>
            </ul>
            </li>
            </ul>
            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="btn btn-link btn-lg" href="/computadoras" id="navbarDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Computadoras <span class="iconify"
                            data-icon="bx:down-arrow"></span></a>
                    {{-- <a class="btn btn-link btn-lg dropdown-toggle" href="/todo" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    </a> --}}
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a class="dropdown-item" href="/computadras">Computadoras</a></li>
                            <li><a class="dropdown-item" href="/computadoras\laptop">Laptop</a></li>
                            <li><a class="dropdown-item" href="/computadoras\escritorio">Escritorio</a></li>
                        </ul>
                    </ul>
            </ul>
            </li>
            </ul>
            </ul>
            </ul>
            </li>
            </ul>

            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="btn btn-link btn-lg" href="/electronica" id="navbarDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Electrónica <span class="iconify"
                            data-icon="bx:down-arrow"></span></a>
                    {{-- <a class="btn btn-link btn-lg dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    </a> --}}
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a class="dropdown-item" href="/electrnica">Electrónica</a></li>
                            <li><a class="dropdown-item" href="/electronica\consolas">Consolas</a></li>
                            <li><a class="dropdown-item" href="/electronica\tv">Televisores</a></li>
                            <li><a class="dropdown-item" href="/electronica\monitores">Monitores</a></li>
                            <li><a class="dropdown-item" href="/electronica\bocinas">Bocinas</a></li>
                            <li><a class="dropdown-item" href="/electronica\camaras">Cámaras</a></li>
                            <li><a class="dropdown-item" href="/electronica\telefonos">Teléfonos</a></li>
                        </ul>
                    </ul>
            </ul>
            </li>
            </ul>
    </div>
    </nav>

    <!--content-->
    <div class="container my-4">
        @yield('content')

    </div>

    <!--chatbot-->

    <script>
        var botmanWidget = {
            frameEndpoint: '/chatbot',
            title: '',
            introMessage: 'Bienvenido al chatbot de Marktech',
            placeholderText: 'Escribe aquí tu mensaje',
            mainColor: 'black',
            aboutText: '',
            aboutLink: '',
            bubbleAvatarUrl: src = '{!! asset('img/chat.jpg') !!}'
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="container-sm">
        <section>
            <!--footer-->
            <footer class="mt-auto bg-black text-center text-white">

                <div class="container p-4">

                    <!--Links-->
                    <section class="">

                        <div class="row">

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase fs-4"><strong>Contacto</strong></h5>
                                <br>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="mailto:herrera.alvaradoartu@gmail.com"
                                            class="text-white">Contactanos</a>
                                    </li>
                                    <li>
                                        <a href="/Sugerencias" class="text-white">Sugerencias</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase fs-4"><strong>Nuestras Redes</strong></h5>
                                <br>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="https://www.facebook.com/Mark-Tech-100458546063140"><i
                                                class="icon iconify text-white" data-icon="ion-social-facebook"
                                                data-width="24"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/MarktechOficial"><i
                                                class="icon iconify text-white" data-icon="ion-social-twitter"
                                                data-width="24"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/marktech2022"><i
                                                class="icon iconify text-white" data-icon="ion-social-instagram"
                                                data-width="24"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase fs-4"><strong>Marktech</strong></h5>
                                <br>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="/avisodeprivacidad" class="text-white">Politica de Privacidad</a>
                                    </li>
                                    <li>
                                        <a href="/terminosycondiciones" class="text-white">Terminos y
                                            Condiciones</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <img src="{{ asset('img/paypalcheckout.png') }}" alt="logo" class="img-fluid">
                                <img src="{{ asset('img/stripe1.png') }}" alt="logo" class="img-fluid">
                            </div>



                        </div>

                    </section>
                </div>

                <!--Derechos-->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    Todos los derechos reservados 2022 ©:
                    <a class="text-white" href="/">https://Marktech.com/</a>
                </div>
            </footer>
        </section>
        <!--footer-->
    </div>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>


</html>
