@extends("layout.plantilla")

@section('title', 'InterTienda')


@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-danger">
            {{ session()->get('mensaje') }}
        </div>
    @endif

    @if(Auth::user())
        <div class="jumbotron">
            <h1 class="display-4">BIENVENID@ {{ strtoupper(' ' . Auth::user()->nombre) }}</h1>


            <hr class="my-4">
            <a class="nav-link" href="/allCategorias">-Explora todas las categorías.</a>

        </div>
     @else

    <!--QUIENES SOMOS-->
    <div class="jumbotron">
        <h1 class="display-4">HOME- QUIENES SOMOS</h1>

        <hr class="my-4">
        <p>Bienvenidos al Círculo Privado de Compra-Venta de Artículos.</p>
        <p>Tenemos algo que vender, quizá mi compañero de oficina o de la oficina de al lado está buscando justo lo mismo, sin gastos de envíos ni comisiones. Conociendo a quien nos lo vende así nace InterTienda, un círculo de transacciones de productos dentro de tu ámbito de trabajo.</p>
        <p>¿Cómo acceder? Sencillo, te registrás y un administrador valida que pertenecés a la empresa, luego de ésto te llega el email y ya puedes publicar y ver los productos.</p>

    </div>

    <!--QUIENES SOMOS-->

    @endif

    <!-- CARRUSEL -->
    <div class="container-fluid ">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 " src="img/imagen-inicio_01.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/imagen-inicio_02.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/imagen-inicio_03.jpg" alt="Third slide">
                </div>
            </div>
        </div>


        <!-- CARRUSEL -->
    <div class="m-auto" style="height:7vh;">

    </div>





        <!-- CARDS DE PRODUCTOS-->
  {{--      <div class="container container-fluid col-9 ">


            <div class="row  mt-4 mb-4 d-flex  justify-content-center justify-content-md-end ">



                <div class="col-lg-3 col-sm-12 col-md-6 mb-4 ">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/cateroria_tecnologia.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tecnologia</h5>
                            <p class="card-text">Cualquier equipo tecnologico que quieras comprar</p>
                            <a href="cat_tecno" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 mb-4 ">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/cateroria_vestimenta.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Vestimenta</h5>
                            <p class="card-text">Cualquier ropa o calzado que quieras comprar</p>
                            <a href="cat_vestimenta" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 mb-4 ">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/cateroria_otros.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Otros + Servicios</h5>
                            <p class="card-text">Otros productos mas servicios ofrecidos</p>
                            <a href="cat_otros" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/categoria_todo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Todo</h5>
                            <p class="card-text">Todos los productos y servicios publicados</p>
                            <a href="#" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- CARDS -->
    </div>


@endsection

