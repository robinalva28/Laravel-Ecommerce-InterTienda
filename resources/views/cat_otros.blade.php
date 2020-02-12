@extends('layout.plantilla')

@section('contenido')

<div class="container container-fluid">

    <div class="tittle">
        <h1>Otros + Servicios</h1>
    </div>
    <a href="index" class="btn btn-link">Volver a principal</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/otros_01.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Licenciado en Psicología cognitiva</h5>
                    <p class="card-text">Tratamiento Breve De Activación Conductual Para Depresión</p>
                    <p><b>$700 x hora</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/otros_02.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Alquiler de casa en San Bernardo</h5>
                    <p class="card-text">Superficie total  120 m² Superficie cubierta 100 m²</p>
                    <p>Ambientes 4</p>
                    <p><b>$25.000 x quincena</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- CARDS -->
</div>

@endsection
