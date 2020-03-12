@extends('layout.plantilla')

@section('contenido')


<div class="container container-fluid">

    <div class="tittle">
        <h1>Tecnología</h1>
    </div>
    <a href="index" class="btn btn-link">Volver a principal</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="./img/tecno_01.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Celular Chantung x4 </h5>
                    <p class="card-text">Liberado. Pantalla TFT de 6.2". Cámara trasera de 13Mpx. Cámara delantera de 5Mpx. Procesador Exynos 7884 Octa-core de 1.6GHz con 2GB de RAM.Batería de 3400mAh.</p>
                    <p><b>$15.000</b></p>
                    <a href="tecno_01" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_02.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">TV Led Samsun Ultra 4K</h5>
                    <p class="card-text">Color Negro Tipo de pantalla LED </p>
                    <p>Tamaño de la pantalla 50 "</p>
                    <p>Tipo de resolución 4K</p>
                    <p>País de origen Argentina</p>
                    <p><b>$90.000</b></p>

                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_03.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Lavarropas Patrick Usado</h5>
                    <p class="card-text">Marca Patrick</p>
                    <p>Modelo LPK06E10</p>
                    <p>Color Blanco</p>
                    <p>AutomáticoAutomático</p>
                    <p><b>$25.000</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>


        <!-- CARDS -->



        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_04.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Xbox 360 usada</h5>
                    <p class="card-text">Marca Xbox</p>
                    <p>Modelo Xbox 360</p>
                    <p>Sub modelo Arcade</p>
                    <p>Capacidad 8 GB</p>
                    <p>Conectividad de red móvil 3G</p>
                    <p><b>$12.000</b></p>

                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="img/tecno_05.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Plancha a Vapor</h5>
                    <p class="card-text">Ya sea en la oficina, con amigos o en alguna ocasión especial, lucir tu ropa impecable habla de vos. ¡Esta plancha será tu aliada para que te veas bien en todo momento!</p>
                    <p><b>$600</b></p>
                    <a href="#" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
