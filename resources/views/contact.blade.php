@extends('layout.plantilla')

@section('contenido')

<div class="card ">

    <div class="container col-md-4 mt-4 mb-3">

        <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
            <h2><strong>Contáctanos</strong></h2>
        </div>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="#!">

                <!-- Name -->
                <div class="md-form mt-3">
                    <input type="text" id="materialContactFormName" class="form-control" placeholder="Escriba su nombre">
                    <label for="materialContactFormName"></label>
                </div>

                <!-- E-mail -->
                <div class="md-form">
                    <input type="email" id="materialContactFormEmail" class="form-control" placeholder="Escriba su correo electrónico">
                    <label for="materialContactFormEmail"></label>
                </div>

                <!-- Subject -->


                <!--Message-->
                <div class="md-form">
                    <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3" placeholder="Escriba su mensaje"></textarea>
                    <label for="materialContactFormMessage"></label>
                </div>



        </div>

        <!-- Send button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Enviar</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>
@endsection
