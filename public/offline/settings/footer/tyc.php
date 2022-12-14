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
    <script src="../../../js/iconify.min.js"></script>
    <script src="../../../js/app.js" defer></script>
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


    <link href="../../../css/app.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../css/dark-mode.css" rel="stylesheet">
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
                        src="../../../img/mk2otln.png" class="logo-mk">
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
                                    <a class="nav-link active" href="/IniciarSesion">Iniciar Sesi??n</a>
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
                                        <li><a class="dropdown-item" href="/hardware\ssd">Unidades de Estado S??lido
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
                                aria-haspopup="true" aria-expanded="false">Electr??nica <span class="iconify"
                                    data-icon="bx:down-arrow"></span></a>
                            {{-- <a class="btn btn-link btn-lg dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    </a> --}}
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <ul>
                                    <li><a class="dropdown-item" href="/electrnica">Electr??nica</a></li>
                                    <li><a class="dropdown-item" href="/electronica\consolas">Consolas</a></li>
                                    <li><a class="dropdown-item" href="/electronica\tv">Televisores</a></li>
                                    <li><a class="dropdown-item" href="/electronica\monitores">Monitores</a></li>
                                    <li><a class="dropdown-item" href="/electronica\bocinas">Bocinas</a></li>
                                    <li><a class="dropdown-item" href="/electronica\camaras">C??maras</a></li>
                                    <li><a class="dropdown-item" href="/electronica\telefonos">Tel??fonos</a></li>
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
                        <a class="nav-link" href="../../../offline.php"><span class="iconify"
                                data-icon="ant-design:home-outlined" style="font-size: 42px;"></span>Inicio</a>
                        <a class="nav-link" href="../../../offline/categoriesm.php"><span class="iconify"
                                data-icon="carbon:collapse-categories" style="font-size: 42px;"></span>Categor??as</a>

                        <!-- account or login -->
                            <a class="nav-link" href="/micuenta"><span class="iconify" data-icon="bx:user"
                                    style="font-size: 42px;"></span>Yo</a>
                        <!--account or login/-->

                        <a class="nav-link" href="/TuCarrito"><span class="iconify"
                                data-icon="eva:shopping-cart-outline" style="font-size: 42px;"></span>Carrito</a>
                        <a class="nav-link" href="../../../offline/settingsm.php"><span class="iconify"
                                data-icon="clarity:settings-line" style="font-size: 42px;"></span>Ajustes</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Bottom fixed navbar bootstrap -->
    <div style="text-align: center;">
        <br><h1><a id="Terminos-y-condiciones-de-uso" name="Terminos-y-condiciones-de-uso"></a>T??rminos y condiciones de uso</h1>
    </div>
        <div>
<p>Al usar el sitio www.Marktech.com usted manifiesta su aceptaci??n de estos T??rminos de Uso y nuestra <a href="/avisodeprivacidad"><strong>Politica de Privacidad</strong></a>.
 Si usted no acepta estos T??rminos y condiciones de Uso, por favor no
utilice estos sitios. Marktech S.A. de C.V. (???Marktech???) se
reserva el derecho, a nuestra discreci??n, de cambiar, a??adir, eliminar o
 modificar partes de estos T??rminos y condiciones de Uso en cualquier
momento. Revise estos t??rminos y condiciones de uso peri??dicamente para
los cambios. El uso continuado de estos sitios despu??s de la publicaci??n
 de las modificaciones de estas condiciones de uso significa que usted
acepta esos cambios.</p>
<div id="numbered-list">
<ol>
<li>
<a href="#Posesi??n">Posesi??n</a>
</li>
<li><a href="#Licencia-y-uso-del-sitio">Licencia y Uso del Sitio</a></li>
<li><a href="#Su-cuenta">Su cuenta</a></li>
<li><a href="#Peticiones">Peticiones</a></li>
<li><a href="#Contenido-vinculado-a-cualquier-sitio-web-de-Marktech">Contenido vinculado a cualquier sitio web de Marktech</a></li>
<li><a href="#Clausula-de-Renuncia">Cl??usula de Renuncia ???disclaimer???</a></li>
<li><a href="#Tarjetas-de-Credito">Tarjetas de Cr??dito</a></li>
<li><a href="#Indemnizacion">Indemnizaci??n</a></li>
<li><a href="#Limitacion-De-Responsabilidad">Limitaci??n de Responsabilidad</a></li>
<li><a href="#Cuestiones-de-competencia">Cuestiones de competencia ???incidentes jurisdiccionales???</a></li>
<li><a href="#Terminacion">Terminaci??n</a></li>
<li><a href="#Reclamaciones-de-derechos-de-autor">Aviso y procedimientos para realizar reclamaciones de infracci??n de derechos de autor</a></li>
<li><a href="#Disposiciones-y-provisiones-generales">Disposiciones y provisiones generales</a></li>
<li><a href="#Responsabilidad-de-garantia">Exactitud de Informaci??n y Descargo de responsabilidad de garant??a</a></li>
</ol>
</div>
<h2><a id="Posesi??n" name="Posesi??n"></a></h2>
<h2>&nbsp;</h2>
<h2>Posesi??n</h2>
<p>Todo el contenido de estos sitios, incluyendo, sin limitaci??n, texto,
 gr??ficos, im??genes, logotipos, clips de audio o de v??deo, descargas
digitales, compilaciones de datos y software, son propiedad de
Marktech o de los proveedores de licencias de contenido y est??
protegido por las leyes de los Estados Unidos Mexicanos y otros pa??ses
adem??s de los tratados internacionales. La compilaci??n de todo el
contenido de estos sitios es propiedad de Marktech y est?? protegido
por las leyes de los Estados Unidos Mexicanos y otros pa??ses adem??s de
los tratados internacionales. Todas las dem??s marcas que no son
propiedad de Marktech que aparecen en estos sitios son propiedad de
sus respectivos propietarios, que pueden o no estar afiliados con o
conectados a Marktech. <a href="#Terminos-y-condiciones-de-uso"></a></p>
<h2><a name="Licencia-y-uso-del-sitio" id="Licencia-y-uso-del-sitio"></a></h2>
<h2>&nbsp;</h2>
<h2>Licencia y Uso del Sitio</h2>
<p>Marktech le concede una licencia limitada para acceder y hacer uso
 personal y el uso no comercial de estos sitios. De conformidad con
estas Condiciones de Uso, no est?? permitida la descarga de cualquier
material (incluyendo, sin limitaci??n, software, textos, gr??ficos u otros
 contenidos), excepto para la impresi??n de copias simples de las
p??ginas, seg??n sea necesario para acceder a los sitios (para uso
personal y el uso no comercial, siempre que se mantengan todos los
avisos de copyright y de propiedad), enlaces a cualquier p??gina o
modificar en todo o parte de los sitios sin el consentimiento expreso
por escrito de Marktech. Usted no puede redistribuir, vender,
diseminar, realizar ingenier??a inversa, desmontar o reducir un software
de forma legible que se le permite descargar informaci??n de estos
sitios, excepto cuando lo permita la ley. Con la ??nica excepci??n de lo
expresamente previsto en el presente, estos sitios (o cualquier trabajo
derivado de la versi??n de la misma), su contenido y cualquier miembro o
informaci??n de cuenta no pueden, en cualquier forma o por cualquier
medio ahora conocido o desarrollado hacer la reproducci??n, muestra,
descarga, carga, publicados, reutilizar, desplazar, distribuir,
transmitir, revender o explotar para ning??n prop??sito comercial sin
previo y expreso consentimiento por escrito de Marktech. Todos los
derechos no concedidos expresamente a usted anteriormente, incluida la
propiedad y t??tulo, se reservan para el propietario y no se transfiere o
 se licencia a su favor.
<h2><a id="Su-cuenta" name="Su-cuenta"></a></h2>
<h2>&nbsp;</h2>
<h2>Su cuenta</h2>
<p>Si utiliza estos sitios, usted es responsable de mantener la
confidencialidad de la afiliaci??n y la informaci??n de la cuenta,
informaci??n de tarjeta de cr??dito, nombres de usuario, contrase??as e
identificadores que pueden ser obligados a utilizar el sitio de vez en
cuando ( "Informaci??n de cuenta") y para restringir el acceso a su
computador o a otros dispositivos m??viles, y usted acepta que es
responsable de toda la actividad que ocurre bajo su cuenta o con el uso
de la informaci??n de su cuenta (incluyendo, sin limitaci??n, los nombres
de usuario y contrase??as). Marktech se reserva el derecho, a su sola
discreci??n, denegar el acceso al sitio o los servicios prestados a
trav??s del mismo, cerrar cuentas y derechos de uso, editar o eliminar
contenido o presentaciones (como se define m??s adelante) adem??s de la
cancelaci??n de pedidos o de materiales que a trav??s del sitio se hayan
solicitado.
<h2><a id="Peticiones" name="Peticiones"></a></h2>
<h2>&nbsp;</h2>
<h2>Peticiones</h2>
<p>Cualquier informaci??n o material que usted transmita, cargue o
entregue a cualquier sitio de Marktech (incluyendo, sin limitaci??n,
comentarios, rese??as, anuncios de chat, mensajes de correo electr??nico o
 de materiales dirigidos a cualquier foro, ya que el t??rmino se define
m??s abajo) o cualquier sugerencia en forma creativa, ideas, notas,
dibujos, conceptos u otra informaci??n enviada a Marktech a trav??s de
nuestro sitio Web u otros medios de transmisi??n o entrega, ser??n
denominados colectivamente "Env??os". Si usted desea transmitir o
entregar presentaciones a Marktech usted concede a Marktech una
licencia no exclusiva, libre de regal??as, perpetua, irrevocable (o el
per??odo m??s largo permitido por la ley) de licencia (con derecho a
sub-licenciar y asignar) para utilizar, reproducir, modificar, adaptar,
publicar, traducir, representar y exhibir p??blicamente, transmitir,
crear, vender, crear obras derivadas y distribuir esos escritos o
presentaciones como incorporar a otros trabajos en cualquier forma o
medio y por cualquier medio o medios de distribuci??n o tecnolog??a
actualmente conocida o desarrollada en el futuro. Usted acepta y
representa a Marktech que posee o ha obtenido la propiedad
intelectual y otros derechos necesarios en las presentaciones
(incluyendo, sin limitaci??n, una renuncia de los derechos aplicables en
moral) y a conceder tal licencia a Marktech que no son tales
presentaciones, o ser??, sujeto a cualquier obligaci??n de
confidencialidad por parte de Marktech y que Marktech no ser??
responsable de cualquier uso o divulgaci??n de cualquier presentaci??n.
Sin limitaci??n de lo anterior, Marktech tendr?? derecho al uso sin
restricciones de los env??os, comercial o de otro tipo, sin compensaci??n
al proveedor de los env??os.
{{-- <h2><a id="Foros-y-Comunicacion-Publica" name="Foros-y-Comunicacion-Publica"></a></h2>
<h2>&nbsp;</h2> --}}
{{-- <h2>Foros y Comunicaci??n P??blica</h2>
<p>"Foros", un ??rea de chat, tabl??n de anuncios, la funci??n de correo
electr??nico u otra funci??n que le permite transmitir o someter el
material al sitio de Marktech para su visualizaci??n, almacenamiento o
 distribuci??n, se ofrecen como parte de cualquier sitio de Marktech o
 por una compa????a afiliada / organizaci??n y / o proveedor de servicios
de Marktech donde el Foro est?? previsto en un sitio distinto de un
sitio de Marktech, usted estar?? obligado por los t??rminos del
servicio y aviso de privacidad del sitio que han vinculado. Si usted
participa en cualquier Foro dentro de un sitio de Marktech, usted
debe y no acepta que no va a trav??s del uso de las comunicaciones o de
otro modo:</p>
<ul id="list">
<li><span>Difamar, abusar, acosar o amenazar a otros;</span></li>
<li><span>Hacer cualquier burla de odio o racial que sean ofensivas las declaraciones;</span></li>
<li><span>Promover una actividad ilegal o discutir actividades ilegales con la intenci??n de cometer los mismos;</span></li>
<li><span>Publicar o distribuir cualquier material que infrinja o viole cualquier derecho de un tercero o cualquier ley;</span></li>
<li><span>Publicar o distribuir cualquier material vulgar, obsceno, descort??s, lenguaje indecente o im??genes ofensivas;</span></li>
<li><span>Anunciar, vender, o solicitar, a otros;</span></li>
<li><span>Utilizar el Foro con fines comerciales de ning??n tipo;</span></li>
<li><span>Publicar o distribuir cualquier software u otros materiales que contengan un virus u otro componente da??ino, o</span></li>
<li><span>Publicar material o hacer declaraciones que no corresponden en
 general con el tema designado o el tema de cualquier sala de chat o
tabl??n de anuncios.</span></li>
</ul> --}}
<p>Adem??s, usted debe tener en cuenta y aceptar que no usar?? una
direcci??n de correo electr??nico falsa, hacerse pasar por otra persona o
entidad o de otra manera inducir a error a los dem??s como a la fuente de
 origen de una presentaci??n. Marktech se reserva el derecho de quitar
 o editar el contenido de cualquier sitio que contenga un foro de
Marktech en cualquier momento y por cualquier raz??n.</p>
<p>Todo el material de transmisi??n, que se env??a o entrega a un Foro
constituir?? una petici??n y se rige por las condiciones aplicables a los
env??os como se describe en este documento.</p>
<p>Al participar en un foro, nunca asuma que las personas son quienes
dicen que son, saben lo que dicen que saben, o est??n afiliados con los
que dicen que est??n afiliados a cualquier sala de chat, tabl??n de
mensajes u otro usuario generado en el ??rea de contenido. La informaci??n
 obtenida en un foro puede no ser fiable, y Marktech no se hace
responsable por el contenido o la exactitud de la informaci??n.
<h2><a id="Contenido-vinculado-a-cualquier-sitio-web-de-Marktech" name="Contenido-vinculado-a-cualquier-sitio-web-de-Marktech"></a></h2>
<h2>&nbsp;</h2>
<h2>Contenido vinculado a cualquier sitio web de Marktech</h2>
<p>Sea discreto al navegar por Internet utilizando cualquier sitio de
Marktech. Usted debe ser consciente de que mientras usted est?? en un
sitio de Marktech, usted puede dirigirse a otros sitios que est??n
fuera de nuestro control. Hay enlaces a otros sitios de Marktech y
sitios que lo llevan fuera de nuestro servicio. Esto incluye los enlaces
 de las secciones regionales, patrocinadores y socios que pueden
utilizar nuestro logotipo(s) como parte de un co-branding o de otro
acuerdo. Estos otros sitios pueden enviar sus propias cookies a los
usuarios, obtener informaci??n, solicitar informaci??n personal, o
contener informaci??n que usted considere inapropiada u ofensiva.
Marktech se reserva el derecho a invalidar los enlaces de sitios de
terceros a cualquier sitio de Marktech. Marktech no ofrece ninguna
 garant??a respecto al contenido de los sitios vinculados a cualquier
sitio de Marktech o figura en ninguno de nuestros directorios. En
consecuencia, Marktech no se hace responsable de la exactitud,
relevancia, cumplimiento de derechos de autor, legalidad o decencia del
material contenido en los sitios enumerados en nuestros resultados de
b??squeda o de otro tipo vinculado a un sitio de Marktech.
<h2><a id="Clausula-de-Renuncia" name="Clausula-de-Renuncia"></a></h2>
<h2>&nbsp;</h2>
<h2>Cl??usula de Renuncia ???Disclaimer???</h2>
<p>Los materiales en estos sitios web de Marktech se proporcionan
"tal cual" y sin garant??a de ning??n tipo, ya sea expresa o impl??cita. En
 la m??xima medida en que la ley as?? lo aplique, Marktech sus
contratistas, agentes, afiliados, socios, y destinados de beneficiarios
de terceros (conjuntamente con las partes de "Marktech"), renuncia a
toda garant??a, expresa o impl??cita, incluyendo, pero no limitado a,
garant??as de comercializaci??n y aptitud para un prop??sito particular.
Marktech no garantiza que las funciones contenidas en los materiales
del sitio web de Marktech ser??n ininterrumpidas o libres de errores,
que los defectos ser??n corregidos, o que cualquier sitio web de
Marktech o los servidores que hacen que dichos materiales est??n
libres de virus u otros componentes perjudiciales. Marktech no
garantiza ni realiza ninguna representaci??n sobre el uso o los
resultados del uso de los materiales del sitio web de Marktech en
cuanto a su correcci??n, precisi??n, fiabilidad u otros. Usted asume el
costo total de cualquier servicio, reparaci??n o correcci??n. La ley
aplicable puede no permitir la exclusi??n de garant??as impl??citas, por lo
 que la exclusi??n anterior puede no aplicarse a usted.</p>
<p>Marktech declina expresamente cualquier responsabilidad por la
exactitud, integridad, el contenido o la disponibilidad de la
informaci??n contenida en los sitios que tienen enlaces hacia o desde
cualquier sitio web de Marktech. Marktech no puede garantizar que
usted estar?? satisfecho con los productos o servicios que usted compra
en un sitio de terceros que enlace o que de cualquier sitio web de
Marktech o el contenido de terceros en cualquier sitio web de
Marktech. Marktech no se hace responsable de la mercanc??a (en su
caso), salvo lo expresamente previsto, ni ha tomado ninguna medida para
confirmar la exactitud o confiabilidad de ninguna de la informaci??n
contenida en dichos sitios de terceros o de su contenido. Marktech no
 hace ninguna representaci??n o garant??a en cuanto a la seguridad de la
informaci??n (incluyendo, sin limitaci??n, la tarjeta de cr??dito y otra
informaci??n personal) que puede ser solicitada para dar a terceros, y
por el presente renuncia irrevocablemente a cualquier reclamaci??n contra
 Marktech. Con respecto a tales sitios y contenidos de terceros.
Marktech le recomienda encarecidamente que haga las investigaciones
que considere necesarias o apropiadas antes de proceder con cualquier
transacci??n en l??nea o sin conexi??n con cualquiera de estos
terceros.
<h2><a id="Tarjetas-de-Credito" name="Tarjetas-de-Credito"></a></h2>
<h2>&nbsp;</h2>
<h2>Tarjetas de Cr??dito</h2>
<p>Marktech puede proporcionar su n??mero de tarjeta de cr??dito,
informaci??n de facturaci??n y env??o a las instituciones financieras
legalmente constituidas y contratados por Marktech para el
procesamiento de pagos. De lo contrario, Marktech no comparte su
informaci??n de tarjeta de cr??dito con otra persona. Para obtener m??s
informaci??n, por favor lea nuestro Aviso de Privacidad.</p>
<p>Para proteger la seguridad de su informaci??n de tarjeta de cr??dito,
Marktech emplea el est??ndar de la industria de Secure Sockets Layer
(SSL). Marktech tambi??n encripta su n??mero de tarjeta de cr??dito
cuando Marktech almacena su solicitud y siempre que Marktech
transmita informaci??n a los comerciantes participantes.
<h2><a id="Indemnizacion" name="Indemnizacion"></a></h2>
<h2>&nbsp;</h2>
<h2>Indemnizaci??n</h2>
<p>Usted se hace enteramente responsable de mantener la confidencialidad
 y seguridad de su informaci??n de cuenta y de todas las actividades que
ocurran bajo su cuenta. Usted acuerda indemnizar, defender y mantener a
Marktech sus filiales y otras empresas afiliadas / organizaciones,
contratistas, agentes, socios y patrocinadores y sus respectivos
funcionarios, directores, voluntarios, empleados y agentes de y contra
cualquier reclamaci??n de terceros, demandas, acciones, pleitos,
procedimientos, responsabilidades, da??os, p??rdidas, juicios y gastos
(incluyendo pero no limitado a, los costos de cobranza, cargos de
abogados y otros costos razonables de la defensa o la aplicaci??n de sus
obligaciones bajo el presente) como resultado de lo que surjan de
cualquier violaci??n de cualquiera de sus representaciones o mal uso de
este o cualquier otro sitio web de Marktech o de cualquier sitio con
enlaces a este o cualquier otro sitio web de Marktech. Usted deber??
utilizar sus mejores esfuerzos para cooperar con nosotros en la defensa
de cualquier demanda.
<h2><a id="Cl??usula De Indemnizaci??n" name="Cl??usula De Indemnizaci??n"></a></h2>
<h2>&nbsp;</h2>
<h2>Cl??usula de Indemnizaci??n</h2>
<p>Marktech no asume ninguna responsabilidad por el acceso no
autorizado por el cliente o los usuarios a la informaci??n de la que
participan redes de "hacking", o cualquier virus o programas da??inos,
que puede ser presentado por un cliente o usuario, o por el uso de la
informaci??n recibida a trav??s del servicio.</p>
<p>Los Servicio de Marktech a continuaci??n se somete a la
interrupci??n y retraso debido a causas fuera de su control, tales como
casos de fuerza mayor, actos de cualquier gobierno, la guerra o la
hostilidad de otros, desorden civil, los elementos, fuego, explosi??n,
apag??n, fallo del equipo, error industrial o conflictos laborales, la
imposibilidad de obtener los suministros necesarios y similares.</p>
<p>LIMITACI??N DE RESPONSABILIDAD - Ni Marktech, sus oficiales,
directores, empleados o agentes autorizados, incurrir?? en ninguna
responsabilidad para el cliente o ninguna otra persona por da??os
directos, indirectos o consecuentes o da??os (incluyendo pero no limitado
 a los beneficios perdidos o da??ados o corrupci??n de informaci??n o
datos) que surjan de o en conexi??n con el uso del servicio o cualquier
retraso, falla o interrupci??n del servicio o en el uso o rendimiento del
 software.</p>
<p>Donde de Marktech ha dado su consentimiento para el uso del
servicio y el cliente utiliza el servicio con fines o prop??sitos
distintos de lo que se ha pretend??a utilizar, entonces el cliente hace
uso de este servicio bajo su propio riesgo.</p>
<p>HE LE??DO Y ESTOY DE ACUERDO CON LOS SIGUIENTES T??RMINOS Y CONDICIONES PARA CONFIRMAR LA ORDEN.
<h2><a id="Limitacion-De-Responsabilidad" name="Limitacion-De-Responsabilidad"></a></h2>
<h2>&nbsp;</h2>
<h2>Limitaci??n de Responsabilidad</h2>
<p>Bajo ninguna circunstancia, incluyendo, sin limitaci??n, negligencia,
Marktech (como se define en la secci??n anterior) ser??n responsables
por da??os directos, indirectos, incidentales, especiales o consecuentes
que resulten del uso de, o la incapacidad de usar cualquier sitio web de
 Marktech o los materiales o funciones en dicho sitio, incluso si
Marktech ha sido advertido de la posibilidad de tales da??os. La ley
aplicable puede no permitir la exclusi??n o limitaci??n de responsabilidad
 o de da??os incidentales o consecuentes, por lo que la limitaci??n o
exclusi??n anterior puede no aplicarse a usted. En ning??n caso nuestra
responsabilidad total hacia usted por todos los da??os, p??rdidas y causas
 de acci??n ya sea en contrato o agravio (incluyendo, sin limitaci??n,
negligencia, o cualquier otra forma) exceder la cantidad pagada por
usted, en su caso, de ingreso en el sitio web de Marktech.
<h2><a id="Cuestiones-de-competencia" name="Cuestiones-de-competencia"></a></h2>
<h2>&nbsp;</h2>
<h2>Cuestiones de competencia ???incidentes jurisdiccionales???</h2>
<p>A menos que se especifique lo contrario, los materiales, en cualquier
 sitio web de Marktech se presentan ??nicamente con el prop??sito de
promover el hardware, equipos inform??ticos, software, perif??ricos,
redes, accesorios y otros productos y servicios disponibles en M??xico.
Marktech no garantiza que los materiales en cualquier sitio web de
Marktech sean apropiados o est??n disponibles para su uso en cualquier
 situaci??n particular. Aquellos que decidan acceder a un sitio web de
Marktech lo hacen por su propia iniciativa y son responsables del
cumplimiento de las leyes locales, cuando y en la medida que las leyes
locales sean aplicables.
<h2><a id="Terminacion" name="Terminacion"></a></h2>
<h2>&nbsp;</h2>
<h2>Terminaci??n</h2>
<p>Estos T??rminos de Uso son efectivos hasta que sea terminado por
cualquiera de las partes. Su acceso a todos y cada uno de los sitios web
 de Marktech podr?? prescindirse de inmediato y sin previo aviso de
nosotros a nuestra ??nica discreci??n, si usted no cumple con cualquier
t??rmino de estas condiciones de uso. Tras la terminaci??n, debe dejar de
utilizar el sitio web de Marktech y destruir todo el material
obtenido de dicho sitio as?? como todas sus copias, si se hicieron bajo
los t??rminos de estas Condiciones de Uso o de otra manera. Usted puede
terminar en cualquier momento, suspender el uso de todos los sitios web
de Marktech. Tras la terminaci??n, usted deber?? destruir todos los
materiales obtenidos de cualquier y todos los sitios adem??s de toda la
documentaci??n relacionada y todas las copias e instalaciones de la
misma, si se hicieron bajo los t??rminos de las presentes T??rminos y
Condiciones de Uso o de otra manera.
{{-- <h2><a id="Reclamaciones-de-derechos-de-autor" name="Reclamaciones-de-derechos-de-autor"></a></h2>
<h2>&nbsp;</h2>
<h2>Aviso y procedimientos para realizar reclamaciones de infracci??n de derechos de autor</h2>
<p>Las notificaciones de infracci??n de copyright demandada deben ser
enviadas al Agente Designado del proveedor de servicios. Deber??
presentarse una notificaci??n a la siguiente agente designada:</p>
<p>Marktech S.A. de C.V.<br>
<p>Para ser eficaz, la notificaci??n debe ser una comunicaci??n escrita que incluya lo siguiente:</p>
<ul id="list">
<li><span>Una firma f??sica o electr??nica de la persona autorizada para
actuar en nombre del titular de un derecho exclusivo que presuntamente
se ha infringido;</span></li>
<li><span>Identificaci??n de la obra con derechos de autor la cual se
alega, han sido violados o varias obras en un solo sitio en l??nea est??n
cubiertos por una sola notificaci??n, y una lista representativa de tales
 obras en ese sitio;</span></li>
<li><span>La identificaci??n del material que se demanda ha sido
infringida o para ser objeto de la actividad infractora y que debe ser
eliminado o cuyo acceso debe ser inhabilitado, e informaci??n razonable y
 suficiente para permitir al proveedor del servicio localizar el
material;</span></li>
<li><span>Informaci??n razonable y suficiente para permitir al proveedor
de servicios contactar al denunciante, como una direcci??n, un n??mero de
tel??fono y en su caso, direcci??n de correo electr??nico en la cual la
parte demandante puede ser contactada;</span></li>
<li><span>Una declaraci??n de que la parte demandante tiene una creencia
de buena fe que el uso del material descrito en la reclamaci??n no est??
autorizado por el propietario de los derechos de autor, su agente o la
ley;</span></li>
<li><span>Una declaraci??n de que la informaci??n en la notificaci??n es
exacta y bajo pena de perjurio, de que se autorice la parte reclamante
para actuar en nombre del titular de un derecho exclusivo que
presuntamente se ha infringido.</span></li>
</ul> --}}
<p><a href="#Terminos-y-condiciones-de-uso"></a></p>
<h2><a id="Disposiciones-y-provisiones-generales" name="Disposiciones-y-provisiones-generales"></a></h2>
<h2>&nbsp;</h2>
<h2>Disposiciones y provisiones generales</h2>
<p>Al visitar estos sitios, usted acepta que los T??rminos y condiciones
de Uso se regir??n e interpretar??n de acuerdo con las leyes del Estado de
 Nuevo Le??n, sin dar efecto a cualquier principio de conflicto de leyes, y
que cualquier acci??n legal o de equidad que surja de o en relaci??n a
estos T??rminos y condiciones de Uso y el Aviso de Privacidad se
presentar?? s??lo en los tribunales estatales o federales y por el presente acepta y se somete a la sede y la
jurisdicci??n personal de dichos tribunales a los efectos de tales
acci??n. Si cualquier disposici??n de estas T??rminos y Condiciones de Uso
es ilegal, nula o inaplicable por cualquier raz??n, dicha disposici??n se
considerar?? separable de estos T??rminos y condiciones de Uso y no
afectar?? a la validez y aplicabilidad de las disposiciones restantes.
Estos T??rminos y condiciones de Uso constituyen el acuerdo completo
entre nosotros en relaci??n con el tema aqu?? mencionado y no ser??
modificado excepto por escrito, firmado por ambas partes. Marktech o
contratista de Marktech empleado que desarroll?? y mantiene estos
sitios web se considerar?? un objeto tercero beneficiario de todos los
derechos, pero no de obligaciones, siempre a Marktech bajo estos
t??rminos, obligaciones, que por su contexto son no es exclusivo de
Marktech
<h2><a id="Responsabilidad-de-garantia" name="Responsabilidad-de-garantia"></a></h2>
<h2>&nbsp;</h2>
<h2>Exactitud de Informaci??n y Descargo de responsabilidad de garant??a</h2>
<p>Marktech ha hecho todo lo posible para mostrar el contenido de la
tienda en l??nea con exactitud, pero las adiciones, supresiones y cambios
 pueden ocurrir sin previo aviso. El contenido de la tienda en l??nea se
proporciona ???tal cual???, ni Marktech ni sus representantes ni
subsidiarias hace ninguna representaci??n o garant??a con respecto a los
contenidos. En caso de que el cliente desee realizar la devoluci??n de un
 producto adquirido, la misma se aplicar?? de acuerdo a la Ley Federal de
 Protecci??n al consumidor vigente.<br>
</p>
<p>Marktech, sus filiales y representantes niegan espec??ficamente, a
la mayor medida permitida por ley, cualquier y todas&nbsp; las
garant??as, expresas o impl??citas, relativas a la tienda en l??nea o su
contenido, incluyendo pero no limitado a: las garant??as impl??citas de
comerciabilidad, exhaustividad, actualidad, exactitud, la inexistencia
de infracci??n o adecuaci??n.
<p>&nbsp;</p>
<hr>
</div>
@endsection
