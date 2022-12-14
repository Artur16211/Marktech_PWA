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
        <h1>Pol??tica de Privacidad</h1>
    </div>
        <div>
<p>Esta Pol??tica de Privacidad describe nuestras pol??ticas relativas a
la recolecci??n, uso y revelaci??n de su informaci??n en relaci??n con su
uso de nuestras p??ginas web y correos electr??nicos.
Los t??rminos "nosotros" y "nuestro", cuando sean
utilizados en la presente pol??tica, se entender??n referidos a nuestra
sociedad controlante Marktech.com Group Inc. y a los integrantes de nuestro
grupo Marktech.com, nuestras sociedades controladas y subsidiarias. A los
fines de la legislaci??n de protecci??n de datos, somos una controlante de
 datos de la informaci??n relativa a Ud. con la que contamos en raz??n de
nuestro Sitio.</p>

<p>Al visitar este sitio o por interactuar de cualquier otra
forma con Marktech.com, Ud. consiente las pr??cticas descritas en esta
Pol??tica de Privacidad.</p>
<p>Cuando en esta Pol??tica de Privacidad se utilice el t??rmino ???datos
personales???, se entender?? por tales a cualquier Dato referido a un
individuo identificable, incluyendo su nombre, domicilio, identificador
online, informaci??n de pago o casilla de correo electr??nico. Los Datos
espec??ficos que recolectamos se describen en esta pol??tica.</p>
<p>Los alentamos a leer esta Pol??tica de Privacidad en forma completa, la que contiene las siguientes secciones:</p>
<ul>
<a id="indice"></a><li><a onclick="Visibilidad.scrollAncla('#informacion-que-recolectamos', 500);">Informaci??n que recolectamos</a></li>
<li><a onclick="Visibilidad.scrollAncla('#como-usamos-sus-datos-personales', 700);">C??mo usamos sus Datos Personales</a></li>
<li><a onclick="Visibilidad.scrollAncla('#con-quien-compartimos-sus-datos-personales', 1100);">Con qui??n compartimos sus Datos Personales</a></li>
<li><a onclick="Visibilidad.scrollAncla('#adonde-transferimos-sus-datos-personales', 1300);">Ad??nde transferimos sus Datos Personales</a></li>
<li><a onclick="Visibilidad.scrollAncla('#como-protegemos-sus-datos-personales', 1500);">C??mo protegemos sus Datos Personales</a></li>
<li><a onclick="Visibilidad.scrollAncla('#sus-derechos-en-relacion-con-sus-datos-personales', 1700);">Sus Derechos en relaci??n con sus Datos Personales</a></li>
<li><a onclick="Visibilidad.scrollAncla('#cambios-a-esta-politica', 2500);">Cambios a esta Pol??tica</a></li>
<li><a onclick="Visibilidad.scrollAncla('#contacto', 2700);">Contacto</a></li>
</ul>
<h2>Informaci??n que recolectamos</h2>
<p><strong>Informaci??n de contacto.</strong> Recolectamos y almacenamos
la informaci??n de contacto personal que Ud. nos provee voluntariamente
al suscribirse a nuestros productos o servicios o a cualquiera de
nuestras listas de correo. Esto incluye su nombre, direcci??n postal,
direcci??n web, n??mero de tel??fono, n??mero de fax y direcci??n de correo
electr??nico. Adicionalmente, recolectamos informaci??n de contacto que
nos haya sido provista durante cualquier intercambio de correspondencia
relacionada con atenci??n al cliente, as?? como aquella relacionada con
los productos y servicios ofrecidos en nuestros Sitios.</p>
{{-- <p><strong>Informaci??n financiera.</strong> Recolectamos y almacenamos
informaci??n financiera que Ud. nos provee cuando encarga nuestros
productos o servicios. Por ejemplo, cuando Ud. solicita el registro de
un nombre de dominio o solicita cualquier otro producto o servicio a
trav??s de Web.com, solicitamos que Ud. provea el n??mero de una tarjeta
de cr??dito y domicilio de facturaci??n antes de procesar la solicitud.</p> --}}
<p><strong>Informaci??n sobre su uso del Sitio.</strong> Recolectamos
informaci??n sobre el dispositivo con el que Ud. accede a los Sitios e
informaci??n relativa a su uso del Sitio en s?? mismo, como por ejemplo
nombre de dominio, proveedor de servicio de Internet, tipo y versi??n del
 explorador, p??ginas visitadas, informaci??n a la que accedi??, y el
protocolo de Internet (IP) que utiliz?? para conectarse a Internet.
Tambi??n recolectamos informaci??n relativa a cookies ??? para mayor
informaci??n, por favor revise nuestra Pol??tica de Cookies.</p>
<p><strong>Informaci??n demogr??fica.</strong> Recolectamos y almacenamos
informaci??n demogr??fica (su c??digo postal y edad). Tambi??n
podremos recolectar y almacenar informaci??n demogr??fica (como por
ejemplo su c??digo postal y edad), y utilizar estos datos a fin
de adaptar su experiencia en nuestros Sitios Web.</p>
{{-- <p><strong>Grabaciones telef??nicas y monitoreo.</strong> Para asegurar
que los clientes de Web.com reciban un servicio de calidad, Web.com
selecciona llamadas telef??nicas para ser grabadas y/o monitoreadas.
Estas llamadas, entre los clientes de Web.com (o potenciales clientes) y
 empleados, son evaluadas por supervisores y/u otros representantes de
Web.com. Esto es para garantizar que se provea en forma profesional una
asistencia r??pida y adecuada e informaci??n precisa.</p> --}}
<p><strong>Para mejorar nuestros servicios.</strong>
<p>A fin de contratar con Ud. utilizamos esta informaci??n para contratar con Ud. y satisfacer sus pedidos, como por ejemplo:</p>
<ul>
<li>Enviarle la informaci??n del servicio que sea requerida</li>
<li>Dar cumplimento a sus pedidos</li>
<li>Responder a solicitudes de clientes de servicios, preguntas y consultas</li>
<li>Administrar su cuenta</li>
</ul>
<p>Advierta que, generalmente, Ud. no podr?? solicitar ser excluido de
estas comunicaciones, que son de naturaleza transaccional y no
promocional. Si Ud. no desea recibirlas, Ud. tiene la alternativa de
cancelar nuestros servicios.</p>
<p>Tambi??n contratamos con otras compa????as, individuos, y subsidiarias
de Marktech.com para que lleven a cabo ciertas funciones y servicios para Ud.
 Estos terceros:</p>
<ul>
<li>procesan pagos de tarjetas de cr??dito</li>
</ul>
<p><strong>Para contactarlo.</strong> Si Ud. ha prestado su
consentimiento para recibir correos electr??nicos, o marketing v??a
telef??nica o SMS, o si nos ha suministrado su informaci??n postal,
podremos utilizar los datos personales suministrados para contactarlo
ocasionalmente. Si Ud. se registra en el Sitio, Ud. puede optar por
proveer su consentimiento para recibir comunicaciones de marketing,
comunicaciones por e-mail, tel??fono fijo y/o celular (incluyendo el uso
de equipos automatizados de marcaci??n y/o llamadas pre-grabadas),
mensaje de texto (SMS), redes sociales y cualquier otra forma de
comunicaci??n que su dispositivo sea capaz de recibir (por ej. video,
{{-- etc.). Si Ud. no desea recibir comunicaciones postales o electr??nicas,
puede retirar su consentimiento en cualquier momento, haciendo clic en
el enlace de desuscripci??n al pie de la comunicaci??n, o llamando a
cualquiera de los tel??fonos publicados en <a href="https://donweb.com/" target="_blank">nuestro sitio</a>, <a onclick="Chat.abrirChat( event );">chat online</a>.
                 Tambi??n puedes solicitarlo a trav??s de la <a href="https://micuenta.donweb.com/soporte/ayuda" target="_blank">Mesa de Ayuda</a> y <a href="https://donweb.com/contacto" target="_blank">formulario de contacto</a>.</p> --}}
<p><strong>Ofertas promocionales y sorteos.</strong> Si Ud. provee su
nombre para una oferta promocional o para participar de un sorteo o
concurso y Ud. gana un premio, publicaremos una lista de los ganadores
online donde su nombre y su ciudad ser?? listada a fines promocionales y a
 fin de demostrar la transparencia del concurso, y reportaremos su
nombre a las agencias gubernamentales de ser requerido por ley.</p>
{{-- <p><strong>*Para servicios en Estados Unidos,</strong> al registrarse en
 un Sitio Web y suministrar su n??mero telef??nico, Ud. consiente que esa
acci??n constituye una compra, consulta y/o solicitud a los fines de las
leyes de tele-marketing. Sin perjuicio de que su n??mero telef??nico y/o
n??mero de celular pueda ser incluido en el Registro Federal No Llame
("Federal Do-Not-Call Registry") o en su Registro Local Estatal No
Llame, Ud. est?? prestando su consentimiento expreso y por escrito para
recibir mayor informaci??n en el futuro (incluyendo tele-marketing)
relativa a productos y servicios de nuestra parte y/o nuestras
afiliadas, y Ud. acuerda y consiente por el presente que lo contactemos
usando la informaci??n que nos ha suministrado o nos suministre en el
futuro. Esto implica que podremos contactarlo mediante correo
electr??nico, tel??fono y/o celular (incluyendo el uso de equipos de
llamadas automatizadas y/o llamadas pre-grabadas), mensaje de texto
(SMS), redes sociales y cualquier otra forma de comunicaci??n que su
dispositivo wireless o de cualquier otro tipo sea capaz de recibir (por
ej. video, etc.). Tambi??n podremos enviarle informaci??n u ofertas
ocasionalmente a su direcci??n postal o de correo electr??nico que
tengamos en nuestros archivos (conforme lo se??alado en esta <a href="https://donweb.com/es-mx/politica-de-privacidad">Pol??tica de Privacidad</a>).</p> --}}

{{-- <p><strong>Para proteger nuestro Sitio y nuestro negocio.</strong>
Vigilamos el uso de nuestros Sitios y utilizamos la informaci??n que
recolectamos, incluyendo Datos personales, a fin de perseguir nuestro
inter??s leg??timo en protegerlo a Ud., a terceros y al propio sitio
mediante:</p>
<ul>
<li>la identificaci??n de actividades y transacciones fraudulentas</li>
<li>la prevenci??n del abuso de los Sitios y la investigaci??n y/o
b??squeda de enjuiciamiento por cualquier amenaza potencial o mal uso del
 Sitio.</li>
<li>el aseguramiento del cumplimiento de los t??rminos del servicio y de esta Pol??tica de Privacidad</li>
<li>la investigaci??n de violaciones de o el cumplimiento de estos acuerdos</li>
<li>la protecci??n de cualquier otra forma de los derechos y propiedad de Web.com, sus socios, y clientes</li>
</ul> --}}
<p><strong>Para mejorar nuestros servicios.</strong> A fin de perseguir
nuestro inter??s leg??timo en mejorar nuestros Sitios, tambi??n podemos
utilizar Datos personales a fin de conducir investigaciones y an??lisis y
 para identificar qu?? servicios Ud. y otros clientes como Ud. necesitan:</p>
<ul>
<li>a fin de entender mejor c??mo la gente interact??a con nuestro sitio web a fin
 de proveer comunicaciones de productos que creamos que pueden
 ser de su inter??s</li>
<li>a fin de determinar la efectividad de nuestras campa??as publicitarias</li>
</ul>
<p>Cuando procesamos datos para estos fines, nos aseguraremos de que
siempre protegeremos de la forma m??s amplia y tendremos en cuenta esos
derechos. Ud. tiene el Derecho de objetar este procesamiento si Ud.
desea y si Ud. desea hacerlo, por favor cont??ctese con nosotros desde la secci??n llamada "contactanos" en la parte inferior del sitio web
 a fin de solicitar la remoci??n de nuestras listas. Por favor tenga en
cuenta que si Ud. objeta esto, ello puede afectar nuestra capacidad para
 desarrollar tareas para su beneficio.</p>
{{-- <p><strong>Para proveer informaci??n requerida por ICANN.</strong> Por
cualquier registro de nombres de dominio de titularidad de u operados
por Web.com, ICANN nos requiere difundir cierta informaci??n, recolectada
 con motivo del registro del nombre de dominio, y hacerla accesible al
p??blico a trav??s de una p??gina web interactiva y un "puerto 43" del
servicio WHOIS. La informaci??n que publicamos consiste en su nombre
completo, direcci??n postal, n??mero de tel??fono, direcci??n de correo
electr??nico, y, de ser suministrado, su n??mero de fax, as?? como la fecha
 de alta y vencimiento del registro de su nombre de dominio y la
informaci??n del servidor de nombre asociado a su nombre de dominio. Esto
 no incluye la informaci??n demogr??fica, financiera o de uso de Internet
mencionada m??s arriba. A los fines de esta Pol??tica de Privacidad nos
referiremos a esta informaci??n en forma conjunta como "Informaci??n
WHOIS". Por favor advierta que no controlamos como el p??blico pueda
utilizar la Informaci??n WHOIS. Para evitar cualquier tipo de duda, y a
fin de cumplir con ciertas leyes aplicables y requisitos de privacidad,
nos reservamos el derecho de enmascarar su informaci??n personalmente
identificable conforme fuera necesario, incluyendo sin limitar a,
enmarcar los datos publicados en Puerto 43 o la base de datos WHOIS.</p> --}}
{{-- <p>Almacenamos la informaci??n por el tiempo que sea necesario a fin de
proveerle nuestros servicios, manejar nuestro negocio o seg??n sea
requerido por ley o contrato. En caso de que Ud. haya celebrado un
contrato con nosotros, almacenaremos sus datos durante la duraci??n del
contrato, y retendremos esa informaci??n por el per??odo de tiempo
necesario de acuerdo a nuestras responsabilidades legales o
regulatorias, y luego de que Ud. d?? de baja todos sus servicios con
nosotros a fin de resolver disputas, solicitar el cumplimiento de
nuestro Acuerdo de Servicios, y adherir a los requerimientos legales y
t??cnicos relacionados con la seguridad, integridad y operaci??n de los
Sitios. Si Ud. tiene alguna inquietud sobre por cu??nto tiempo
almacenamos alg??n dato espec??fico, por favor cont??ctese a trav??s de
nuestra <a href="https://donweb.com/contacto" target="_blank">p??gina de contacto.</a></p> --}}
<h2>Con qui??n compartimos sus Datos Personales</h2>
<p>Suministramos sus Datos personales a empresas que nos ayudan con
nuestras actividades comerciales (por ej. que nos asisten con las
operaciones de los Sitios, proveen servicios al cliente, etc.) o que nos
 asisten en mejorar nuestros productos, contenidos, servicios o
publicidad. Estas empresas est??n autorizadas a usar sus datos personales
 s??lo en cuanto sea necesario para proveer dichos servicios. Cuando le
consultamos si desea ser incluido en directorios, la informaci??n que nos
 provea ser?? difundida p??blicamente.</p>
<p>Tambi??n compartiremos sus datos personales:</p>
<ul>
<li>Seg??n sea requerido por ley, orden judicial, o por cualquier otra
autoridad gubernamental o autoridad de contralor a
fin de hacer cumplir o aplicar nuestro Acuerdo de Servicios u otros
acuerdos.</li>
<li>Cuando creamos de buena fe que dicha revelaci??n es necesaria a fin
de proteger sus derechos, proteger su seguridad o la seguridad de otros,
 investigar fraude o responder un pedido gubernamental. Esto incluye el
intercambio de informaci??n a los fines de la aplicaci??n de la ley, con
otras empresas y organizaciones para la protecci??n anti-fraude,
reducci??n de riesgo crediticio o a fines an??logos.</li>
<li>En relaci??n con una modificaci??n societaria incluyendo una fusi??n,
adquisici??n, transferencia o venta de activos o en relaci??n con
insolvencia, quiebra o liquidaci??n. Informaci??n respecto de nuestros
usuarios, incluyendo informaci??n de clientes, tambi??n deber?? ser
develada a nuestros asesores legales y financieros, inversores o
potenciales compradores en ciertas transacciones comerciales que tengan
por objeto financiaci??n, inversi??n o apoyo.</li>
{{-- <li>A cualquier otro tercero cuando contemos con su consentimiento previo e informado a tales fines.</li>
<li>A otras entidades que pertenezcan al grupo Web.com (por ej.
cualquier sociedad controlada directa o indirectamente por Web.com). Una
 lista de nuestras sociedades est?? incluida <a href="https://www.sec.gov/Archives/edgar/data/1095291/000109529118000022/web201710k-ex211.htm" target="_blank">aqu??</a>
 incluyendo sus vendedores, proveedores, contratistas y agentes, que
pueden estar involucrados en la provisi??n del Sitio o el contenido, a
fin de proporcionarle un mejor servicio o simplemente, proveer respuesta
 a sus requisitos (por ej. cuando utiliza planillas de contacto).</li>
</ul> --}}
{{-- <a id="adonde-transferimos-sus-datos-personales"></a><h2>A d??nde transferimos sus Datos Personales</h2>
<p>Los datos ingresados a trav??s de sitios de DonWeb.com,
EnvialoSimple.com, SitioSimple.com y MiCuenta de DonWeb.com, se
encuentran y son procesados en la Rep??blica Argentina. As?? mismo,
ciertos datos son tambi??n transferidos y procesados en EE.UU.</p>
<p>Escudo de Privacidad U.E.-EE.UU. y Suiza-EE.UU. Web.com y alguna de
sus subsidiarias (a saber, Franchise WebSitio Solutions, LP, Monster
Commerce, LLC, NameSecure, LLC, Network Solutions, LLC, Register.com,
Inc., RPI, Inc., SnapNames Web.com, LLC, Web.com Holding Company, Inc.,
Yodle Web.com, Inc.) participan de y cumplen con el Marco de Protecci??n
de Privacidad U.E.-EE.UU. y el Marco de Protecci??n de Privacidad
Suiza-EE.UU., de acuerdo con lo requerido por el Departamento de
Comercio de EE.UU. respecto de la recolecci??n, uso y almacenamiento de
informaci??n personal que es transferida desde pa??ses miembros de la
Uni??n Europea (U.E.) y Suiza hacia los Estados Unidos (en forma
conjunta, el ???Marco???). Para aprender m??s respecto del programa Escudo de
 Privacidad, y ver nuestra certificaci??n, por favor visite
https://www.privacyshield.gov/. A fin de proporcionar una protecci??n
adecuada para ciertos datos personales de la U.E. y datos personales de
Suiza, sobre clientes corporativos, clientes, proveedores, socios
comerciales recibidos en EE.UU., Web.com ha decidido auto-certificarse
dentro del Marco administrado por el Departamento de Comercio de EE.UU.
(???Escudo de Protecci??n???). Web.com adhiere a los principios de
Notificaci??n, Elecci??n, Contabilidad para Posterior Transferencia,
Seguridad, Integridad y limitaci??n por los fines de los datos, Acceso, y
 Recurso, Aplicabilidad, y Responsabilidad del Escudo de Protecci??n.
Web.com es responsable por el procesamiento de los datos que recibe,
bajo este Marco de Escudo de Protecci??n, y por cualquier transferencia
subsiguiente a un tercero que act??e como agente en su inter??s. Web.com
cumple con estos Principios del Escudo de Protecci??n para toda
transferencia subsiguiente de datos personales desde la U.E y Suiza,
incluyendo la posterior transferencia de previsiones de responsabilidad.
 A los fines de asegurar el cumplimento del Escudo de Protecci??n,
Web.com est?? sujeta a los poderes de investigaci??n y control de
cumplimiento de la Comisi??n de Comercio Federal de los Estados Unidos
respecto de nuestro cumplimiento con el escudo de protecci??n. Web.com
podr?? ser requerida a develar informaci??n personal a agencias a cargo
del cumplimiento de la ley, regulatorias u otros entes gubernamentales, o
 a terceros, en cada caso a cumplir con las obligaciones o pedidos,
legales, regulatorios, o de seguridad nacional. Web.com se compromete a
resolver las disputas respecto de su privacidad y nuestra recolecci??n o
use de su informaci??n personal. Los individuos de la Uni??n Europea o de
Suiza que tengan consultas o quejas respecto de esta Pol??tica de
Privacidad deber??an en primer lugar contactarse con Web.com por correo
electr??nico a privacyshield@web.com. Investigaremos e intentaremos
resolver cualquier queja o disputa dentro de los 45 d??as desde la
recepci??n de su reclamo. El mecanismo independiente de Web.com para
reclamos por Escudo de Privacidad para el uso de individuos de la U.E y
Suiza es JAMS. Si Ud. no se encuentra satisfecho con la resoluci??n del
reclamo, puede contactarse mediante JAMS en
https://www.jamsadr.com/eu-us-privacy-shield para mayor informaci??n y
asistencia. Ud. tendr?? la opci??n de seleccionar un arbitraje vinculante
para la resoluci??n de su reclamo bajo ciertas circunstancias, siempre
que haya cumplido los siguientes pasos: (1) haya comunicado su reclamo
directamente a Web.com y nos haya dado la oportunidad de resolver el
problema; (2) haya utilizado el mecanismo de resoluci??n de disputas
independiente identificado arriba; y (3) haya formulado el reclamo a
trav??s de la autoridad competente de protecci??n de datos personales y
dado la oportunidad al Departamento de Comercio de los EE.UU. a resolver
 la disputa sin costo para Ud. Si Ud. tiene alguna consulta respecto a
la participaci??n de Web.com en el Marco de Escudo de Privacidad por
favor cont??ctenos en la siguiente direcci??n: privacyshield@web.com o por
 correo dirigido a Web.com Group, Inc., At.: Privacy Officer, 12808 Gran
 Bay Parkway West, Jacksonville, Florida, Estados Unidos 32258.</p> --}}

<h2>C??mo protegemos sus Datos Personales</h2>
<p>Trabajamos para proteger la seguridad de su informaci??n financiera
durante su transmisi??n al utilizar la tecnolog??a de cifrado Secure
Sockets Layer ("SSL"), que encripta la informaci??n que Ud. ingresa al
Sitio. Sin embargo, ning??n m??todo de transmisi??n dentro de Internet o
m??todo de almacenamiento electr??nico es completamente seguro y no
podemos garantizar su seguridad absoluta. Ud. puede colaborar con su
seguridad adoptando unas pocas simples precauciones. Por ejemplo, es
importante protegerse contra un acceso no autorizado a su computadora o a
 cualquier usuario y contrase??a de los servicios de Marktech.com, y
asegurarse de cerrar sesi??n cuando haya finalizado de usar una
computadora compartida.</p>

<h2>Sus Derechos en relaci??n con sus Datos Personales</h2>
<p>Ud. estar?? facultado a requerirnos a: </p>
<ul>
<li>Acceder a una copia de sus datos personales.</li>
<li>Corregir, eliminar o restringir nuestro procesamiento de sus datos personales.</li>
<li>Transferir la informaci??n que Ud. nos haya provisto bajo contrato o consentimiento con otra organizaci??n.</li>
<li>Dejar de procesar su informaci??n, mediante el retiro de su consentimiento u objetando nuestro inter??s leg??timo.</li>
</ul>
<p>Sus derechos relativos a sus datos personales se encuentran limitados
 en ciertas situaciones. Por ejemplo, si recibimos un requerimiento
legal o ante motivos leg??timos imperiosos podremos continuar procesando
su informaci??n. Le proveeremos informaci??n respecto de si existen
l??mites o excepciones que resulten aplicables ante cualquier reclamo que
 formule.</p>
<p>En primer lugar Ud. puede ver o modificar la informaci??n que nos haya provisto mediante una solicitud haciendo clic en la parte inferior del sitio en el b??ton "contactanos",
 seg??n sea aplicable. Por favor tenga en cuenta que no se le requerir??
ning??n tipo de informaci??n financiera telef??nicamente, y que en ning??n
caso tal informaci??n debe ser suministrada sin verificaci??n. Ud. tambi??n
 tiene el Derecho de formular quejas si Ud. siente que sus Datos
personales han sido tratados inadecuadamente. Le recomendamos que en
primer lugar se ponga en contacto con nosotros pero, en el caso de ser
aplicable, Ud. puede formular un reclamo directamente a la autoridad de
contralor competente. Esta puede ser la autoridad de contralor del lugar
 de su residencia o trabajo, o aquella ubicada donde Ud. crea que el
incumplimiento ha tenido lugar.</p>

<h2>Cambios a esta Pol??tica</h2>
<p>Nosotros podremos modificar esta Pol??tica de Privacidad en cualquier
momento, y comunicaremos cualquier cambio a esta Pol??tica v??a correo
electr??nico a los usuarios que hayan provisto una direcci??n de correo
electr??nico o postal en nuestro Sitio con anterioridad a que el cambio
entre en vigor.</p>
    </div>
