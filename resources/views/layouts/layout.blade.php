<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marktech - @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<!--Navbar-->

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="/post">MarkTech</a>
        <form class="d-flex mx-auto">
            <input class="form-control me-2" style="width: 300px; height: 50px" type="search"
                placeholder="Escribe aqui..." aria-label="Search">
            <button type="button" class="btn btn-dark" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
        <form class="d-flex mx-right">
            <button type="button" class="btn btn-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
            </button>
        </form>
        </div>
        </div>



    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item dropdown s ">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Hardware
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown dropend">
                            <a class="dropdown-item dropdown-toggle " href="#" id="multilevelDropdownMenu1"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Arma tu
                                computadora</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="multilevelDropdownMenu1">
                                <!--Dropdown-Sub1-->
                                <li class="dropdown dropend">
                                <li><a class="dropdown-item" href="{{ route('product.card') }}">Procesadores</a></li>
                                <li><a class="dropdown-item" href="/card">Gabinetes</a></li>
                                <li><a class="dropdown-item" href="/card">Targetas de video</a></li>
                                <li><a class="dropdown-item" href="/card">Memorias RAM</a></li>
                                <li><a class="dropdown-item" href="/card">Disipadores</a></li>
                            </ul>
                            <a class="dropdown-item dropdown-toggle " href="#" id="multilevelDropdownMenu1"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacenamiento</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="multilevelDropdownMenu1">
                                <!--Dropdown-Sub1-->
                                <li class="dropdown dropend">
                                <li><a class="dropdown-item" href="/card">Unidades de Estado Solido (SSD)</a></li>
                                <li><a class="dropdown-item" href="/card">Discos Duros</a></li>
                                <li><a class="dropdown-item" href="/card">Memorias RAM</a></li>
                                <li><a class="dropdown-item" href="/card">USB/SD</a></li>
                            </ul>
                    </ul>
                </li>
            </ul>
            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Accesorios
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown dropend">
                        <li><a class="dropdown-item" href="/card">Audifonos</a></li>
                        <li><a class="dropdown-item" href="/card">Alfombrilla</a></li>
                        <li><a class="dropdown-item" href="/card">Mouse</a></li>
                        <li><a class="dropdown-item" href="/card">Teclados</a></li>
                    </ul>
            </ul>
            </li>
            </ul>
            <!--Dropdown-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Computadoras
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown dropend">
                        <li><a class="dropdown-item" href="/card">Laptop</a></li>
                        <li><a class="dropdown-item" href="/card">Escritorio</a></li>
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
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Electrónica
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown dropend">
                        <li><a class="dropdown-item" href="/card">Consolas</a></li>
                        <li><a class="dropdown-item" href="/card">Televisores</a></li>
                        <li><a class="dropdown-item" href="/card">Monitores</a></li>
                        <li><a class="dropdown-item" href="/card">Bocinas</a></li>
                        <li><a class="dropdown-item" href="/card">Cámaras</a></li>
                        <li><a class="dropdown-item" href="/card">Telefonos</a></li>
                    </ul>
            </ul>
            </li>
            </ul>
        </div>
    </nav>

    <!--content-->
    @yield('content')

    <section>
        <!--footer-->
        <footer class="mt-auto">
            <footer class="bg-dark text-center text-white ">

                <div class="container p-4">

                    <!--Links-->
                    <section class="">

                        <div class="row">

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Acerca</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="/form" class="text-white">Envia tu opinión</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Misión</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Visión</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Devoluciones</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Contactanos</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="/form" class="text-white">Sugerencias</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Facebook</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Twitter</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Instagram</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Links</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#" class="text-white">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 4</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Links</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#" class="text-white">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">Link 4</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </section>
                </div>

                <!--Derechos-->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    Todos los derechos reservados 2022 ©:
                    <a class="text-white" href="https://Marktech.com/">https://Marktech.com/</a>
                </div>
            </footer>
        </footer>
    </section>
</body>

</html>
