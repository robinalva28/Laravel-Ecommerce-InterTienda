@extends('layout.plantilla')

@section('title', 'Tecnologia1')

@section('contenido')

<div class="container container-fluid">

    <div class="tittle">
        <h1>Celular Chantung x4 </h1>
    </div>
    <a href="index" class="btn btn-link">Volver a Principal</a>
    <a href="cat_tecno" class="btn btn-link">Volver a Categoría tecnología</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_01.png" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_01_02.png" class="card-img-top" alt="...">

            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_01_02.png" class="card-img-top" alt="...">

            </div>
        </div>
    </div>
    <div class="tittle">

        <p>Experiencia visual excepcional. Mirá el mundo en detalle a través de la pantalla HD+ de 6.2 ". Sumergite en tus series y películas favoritas y vivilas como si estuvieras ahí, gracias a su definición superior. Además, su diseño delgado y liviano te brindará la mejor experiencia de uso y un agarre mucho más cómodo.</p>

        <p>Fotografía profesional en tu bolsillo Capturá tus momentos favoritos en un instante. Con solo presionar un botón tendrás fotografías de alta calidad y gran resolución incluso en movimiento, gracias a su cámara de 13 Mpx. Además, podrás sacarte selfies detalladas e iluminadas con su cámara frontal de 5 Mpx.</p>
        <h2>PRECIO</h2>
        <h4>$3.000</h4>
        <br>
        <button type="button" class="btn btn-primary">Agregar al Carrito</button>
        <br><br>
    </div>
</div>
<!-- CARDS -->

@endsection
