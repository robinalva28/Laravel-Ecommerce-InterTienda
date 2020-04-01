<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->

    <link rel="icon" href="{{asset('img/logo2.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/20d3506334.js" crossorigin="anonymous"></script>



    <meta charset="UTF-8">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="/"><img class="navbar-brand" src="{{asset('img/logo-198x66.png')}}" alt="logo" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav ml-auto ">

                <li class="nav-item active ">
                    <a class="nav-link" href="/">PRINCIPAL</a>
                </li>
                {{--===================================================================--}}
                {{--NAV SECCIÓN NO LOGUEADOS--}}
                {{--===================================================================--}}
                @if (Route::has('login'))
                        @auth
                        @else
                        <li class="nav-item ">
                            <a class="nav-link"  href="/login">INGRESAR</a>
                        </li>
                            @if (Route::has('register'))
                            <li class="nav-item ">
                                <a class="nav-link" href="/register">REGISTRAR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faq">F.A.Q.</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">CONTACTO</a>
                            </li>
                            @endif
                        @endauth

                @endif
                {{--===================================================================--}}
                {{--NAV SECCIÓN LOGUEADOS--}}
                {{--===================================================================--}}

            @if (Route::has('login'))
                        @auth
                        {{--BOTON DESPLEGABLE EXPLORAR--}}
                        <li class="nav-item dropdown">
                            <a {{--style="color:royalblue;"--}} class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               Dropdown><i class="fas fa-box"></i> PUBLICACIONES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/allCategorias"><i class="fas fa-angle-double-right"></i> Por Categorías</a>
                                <a class="dropdown-item" href="/allMarcas"><i class="fas fa-angle-double-right"></i> Por Marcas</a>
                                <a class="dropdown-item" href="/todosLosProductos"><i class="fas fa-angle-double-right"></i> Ver Todos</a>
                            </div>
                        </li>

                        {{--===================================================================--}}
                        {{--boton del usuario desplegable USUARIO--}}
                        {{--===================================================================--}}
                        <li class="nav-item dropdown">
                                <a style="color:royalblue;" class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   Dropdown><i class="fas fa-user-edit "></i>{{ strtoupper(' ' . Auth::user()->nombre) }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  {{--  <a class="dropdown-item" href="/allCategorias">Ver Categorías</a>--}}
                                    <a class="dropdown-item" href="/adminUsuarioProductos"><i class="fas fa-folder"></i> Mis publicaciones</a>
                                    <a class="dropdown-item" href="/formAgregarProducto"> <i class="fas fa-folder-plus"></i> 	Nueva publicación</a>
                                    <a class="dropdown-item" href="/compras"> <i class="fab fa-linux"></i> Compras</a>
                                    <a class="dropdown-item" href="/ventas"> <i class="fas fa-handshake"></i> Ventas</a>
                                    <a class="dropdown-item" href="/perfil"> <i class="far fa-edit"></i> Mi cuenta</a>
                                    {{--===================================================================--}}
                                    {{--BOTON DESPLEGABLE ADMINISTRADOR--}}
                                    {{--===================================================================--}}

                                @if(Auth::user()->isAdmin)
                                    <a class="dropdown-item" href="/admin/adminProductos">PUBLICACIONES</a>
                                    <a class="dropdown-item" href="/admin/adminListaUsuarios">USUARIOS EN BD</a>
                                    <a class="dropdown-item" href="/admin/adminMarcas">MARCAS</a>
                                    <a class="dropdown-item" href="/admin/adminCategorias">CATEGORIAS</a>
                                    <a class="dropdown-item" href="/admin/adminEmpresas">EMPRESAS</a>
                                    @endif
                                        <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <form action="{{ route('logout') }}" method="POST" >
                                            @csrf
                                            <button onclick="return confirm('¿Cerrar sesión?')" type="submit"  class="btn btn-block small col-sm-12 col-md-12 col-lg-12 p-0" name="" value=""><small>Cerrar Sesión</small></button>
                                        </form>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a style="color:royalblue;" class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"><span style="color:royalblue;" class="badge badge-light">2</span>
                                        <span class="sr-only">unread messages</span></i> CARRITO</a>
                            </li>
                        @endauth
                    @endif
            </ul>

        </div>
    </nav>
</header>

@yield('contenido')
@yield('aside')

<!-- FOOTER -->
<footer class="page-footer font-small blue mt-auto">
    ​
    <!-- Footer Links -->
    <div id="footer" class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">intertienda</h5>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">mapa sitio</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/faq">FAQ</a>
                    </li>

                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/register">Registro</a>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Contacto</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!"><i class="fab fa-facebook-f" ></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="fab fa-instagram" ></i></a>
                    </li>
                    <li>
                        <i class="far fa-envelope" > <a href="mailto:mitienda@gmail.com">mitienda@gmail.com</a></i>
                        ​
                    </li>
                    <li>
                        <i class="fas fa-phone" > 11-0123-4561</i>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright Equipo 8 Digital House & Robinson Alvarez Company

    </div>
    <!-- Copyright -->

</footer>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


