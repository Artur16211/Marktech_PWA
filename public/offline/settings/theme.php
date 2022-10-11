<!doctype html>
<html lang="es">

<head>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#FFFFFF">
    <!-- Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!--  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PWA  -->
    <link rel="apple-touch-icon" href="/logo.jpg">
    <link rel="manifest" href="/manifest.json">
    <!-- Bootstrap CSS -->
    <script src="./js/iconify.min.js"></script>
    <script src="./js/app.js" defer></script>
    <!-- check if the dark mode is enabled -->
    <script>
        if (localStorage.getItem('darkSwitch') !== null) {
            if (localStorage.getItem('darkSwitch') === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-theme', 'light')
            }
        }
        // check if the user has a preference
        var darkQuery = window.matchMedia('(prefers-color-scheme: dark)');
        darkQuery.addListener(function(e) {
            var newTheme = e.matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme)
        })
    </script>


    <link href="./css/app.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/dark-mode.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <title>Marktech</title>
    <!-- icons ios -->
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/img/splash_screens/iPhone_13_mini__iPhone_12_mini__iPhone_11_Pro__iPhone_XS__iPhone_X_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/11__iPad_Pro__10.5__iPad_Pro_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/12.9__iPad_Pro_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/iPhone_8__iPhone_7__iPhone_6s__iPhone_6__4.7__iPhone_SE_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/iPhone_11__iPhone_XR_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/iPhone_11__iPhone_XR_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/10.2__iPad_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_11_Pro_Max__iPhone_XS_Max_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_14_Pro_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_14_Pro_Max_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/10.5__iPad_Air_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_14_Plus__iPhone_13_Pro_Max__iPhone_12_Pro_Max_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 820px) and (device-height: 1180px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/10.9__iPad_Air_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_13_mini__iPhone_12_mini__iPhone_11_Pro__iPhone_XS__iPhone_X_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 820px) and (device-height: 1180px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/10.9__iPad_Air_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/11__iPad_Pro__10.5__iPad_Pro_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/iPhone_8__iPhone_7__iPhone_6s__iPhone_6__4.7__iPhone_SE_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_14_Pro_Max_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_14_Pro_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_11_Pro_Max__iPhone_XS_Max_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_14_Plus__iPhone_13_Pro_Max__iPhone_12_Pro_Max_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/9.7__iPad_Pro__7.9__iPad_mini__9.7__iPad_Air__9.7__iPad_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/4__iPhone_SE__iPod_touch_5th_generation_and_later_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_14__iPhone_13_Pro__iPhone_13__iPhone_12_Pro__iPhone_12_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/10.2__iPad_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)"
        href="img/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/9.7__iPad_Pro__7.9__iPad_mini__9.7__iPad_Air__9.7__iPad_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/4__iPhone_SE__iPod_touch_5th_generation_and_later_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)"
        href="img/splash_screens/10.5__iPad_Air_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)"
        href="img/splash_screens/12.9__iPad_Pro_portrait.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_landscape.png">
    <link rel="apple-touch-startup-image"
        media="screen and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)"
        href="img/splash_screens/iPhone_14__iPhone_13_Pro__iPhone_13__iPhone_12_Pro__iPhone_12_landscape.png">
    <!-- icons ios -->
</head>

<body>
    <!-- header -->
    <div class="navbar1">
        <div class="container-sm">
            <nav class="navbar navbar-expand-lg navbar-light bg-white"><a href="/offline.php"> <img
                        src="./img/mk2otln.png" class="logo-mk">
                    <div class="container">
                        <a class="navbar-brand" href="home.index"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col-md-4">
                            <div class="input-group">
                                <form action="/busqueda" method="POST" role="search">

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
                                    <a class="nav-link active" href="cart.index"><span class="iconify"
                                            data-icon="eva:shopping-cart-outline" data-width="24"></span> Carrito</a>
                                    <a class="nav-link active" href="/IniciarSesion">Iniciar Sesión</a>
                                    <a class="nav-link active" href="/Registro">Registrarse</a>
                                @else
                                    @if (Auth::user()->role == 'admin')
                                        <a class="nav-link active fs-5"
                                            href="admin.product.index', ['id' => Auth::user()->id]) }}">Modo
                                            administrador</a>
                                    @endif

                                    <a class="nav-link active position-relative" href="cart.index"><span
                                            class="iconify" data-icon="eva:shopping-cart-outline" data-width="24"></span>
                                        Carrito
                                        {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                  </span> --}}
                                    </a>

                                    <a class="nav-link active" href="myaccount.orders">Mis Compras</a>
                                    <a class="nav-link active" href="/micuenta">Mi Cuenta</a>
                                    <form id="logout" action="logout" method="POST">
                                        <a role="button" class="nav-link active"
                                            onclick="document.getElementById('logout').submit();">Salir</a>

                                        @csrf
                                    </form>

                                @endguest


                            </div>
                            {{-- <div class="form-check
                                form-switch">
                                <input type="checkbox" class="form-check-input" id="darkSwitch" />
                                <label class="custom-control-label" for="darkSwitch">Modo Oscuro</label>
                            </div> --}}
                        </div>


                    </div>

            </nav>

            <!--Navbar-->
            </nav>
            <div class="hide-mobile">
                <br>
            </div>
            <div class="navbar-black">
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
                                        <li><a class="dropdown-item" href="/hardware/procesadores">Procesadores</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/hardware\motherboards">Tarjetas Madre</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/hardware\gabinetes">Gabinetes</a></li>
                                        <li><a class="dropdown-item" href="/hardware\graficas">Tarjetas de video</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/hardware\ram">Memorias RAM</a></li>
                                        <li><a class="dropdown-item" href="/hardware\disipadores">Disipadores</a></li>
                                        <li><a class="dropdown-item" href="/hardware\fuentes">Fuentes de Poder</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><a class="dropdown-item" href="/almacenamiento">Almacenamiento</a></li>
                                        <li><a class="dropdown-item" href="/hardware\ssd">Unidades de Estado Sólido
                                                (SSD)</a>
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
        </div>

        <!-- Bottom fixed navbar bootstrap -->
        <div class="mobile-nav">
            <nav class="navbar navbar-light bg-light fixed-bottom">
                <div class="container-fluid">
                    <div class="navbar-nav flex-row">
                        <a class="nav-link" href="/offline.php"><span class="iconify"
                                data-icon="ant-design:home-outlined" style="font-size: 42px;"></span>Inicio</a>
                        <a class="nav-link" href="/offline/categoriesm.php"><span class="iconify"
                                data-icon="carbon:collapse-categories" style="font-size: 42px;"></span>Categorías</a>

                        <!-- account or login -->
                            <a class="nav-link" href="/micuenta"><span class="iconify" data-icon="bx:user"
                                    style="font-size: 42px;"></span>Yo</a>
                        <!--account or login/-->

                        <a class="nav-link" href="/TuCarrito"><span class="iconify"
                                data-icon="eva:shopping-cart-outline" style="font-size: 42px;"></span>Carrito</a>
                        <a class="nav-link" href="/offline/settingsm.php"><span class="iconify"
                                data-icon="clarity:settings-line" style="font-size: 42px;"></span>Ajustes</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Bottom fixed navbar bootstrap -->

    <figure class="text-center">
        <blockquote class="blockquote">
            <p class="h1"><strong>TEMAS</strong></p>
        </blockquote>
    </figure>
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" id="darkSwitch" />

        <label class="custom-control-label" for="darkSwitch">Modo Oscuro (BETA)</label>
    </div>



    {{-- <input type="checkbox" id="toggle_checkbox">

    <label for="toggle_checkbox">
        <div id="star">
            <div class="star" id="star-1">★</div>
            <div class="star" id="star-2">★</div>
        </div>
        <div id="moon"></div>
    </label> --}}
