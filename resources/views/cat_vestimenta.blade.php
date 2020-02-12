@extends('layout.plantilla')
@section('contenido')

<div class="container container-fluid">

    <div class="tittle">
        <h1>Ropa</h1>
    </div>
    <a href="index" class="btn btn-link">Volver a principal</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/ropa_01.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Saco de Vestir</h5>
                    <p class="card-text">Ambo clásico para hombre semi entallado. Excelente corte, calidad y confección. Tela tropical</p>
                    <p><b>$3.000</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/ropa_2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Zapato de vestir</h5>
                    <p class="card-text">Talle 40 color azul</p>
                    <p><b>$2.500</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/ropa_3.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Zapatilla adidas</h5>
                    <p class="card-text">Blancas y negras talle 39</p>
                    <p><b>$2.100</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CARDS -->
</div>

<div class="container container-fluid">


    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/ropa_4.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gorra Nike</h5>
                    <p class="card-text">Negra</p>
                    <p><b>$1.100</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
