{{--@extends("layout.plantilla")

@section('contenido')

<div class="container">


    <form action="register/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
            <h2><strong>Nuevo Registro</strong></h2>
        </div>

        <div class="form-group row my-5">
        <div class="col col-sm-12 col-md-5 col-lg-5">
          <input type="text" class="form-control col-sm-10 col-md-10" placeholder="Nombre" name="usrNombre" value="{{old('usrNombre')}}">
        </div>
          <div class="col col-sm-12 col-md-5 col-lg-5">
              <input type="text" class="form-control col-sm-10 col-md-10" placeholder="Apellido" name="usrApellido" value="{{old('usrApellido')}}">
          </div>
      </div>
        <div class="form-group row my-5">
            <div class="col col-sm-12 col-md-5 col-lg-5">
                <input type="text" class="form-control col-sm-10 col-md-10" placeholder="Celular" name="usrCelular" value="{{old('usrCelular')}}">
            </div>
        <div class="col col-sm-12 col-md-5">
            <input type="text" class="col-sm-10 col-md-10 form-control" placeholder="Email" name="usrEmail" value="{{old('usrEmail')}}">
        </div>
        </div>

      <div class="form-group row my-5">
        <div class="col col-sm-12 col-md-5 col-lg-5">
          <input type="password" class="form-control col-sm-10 col-md-10" placeholder=" Nueva contraseña" name="usrPassword" >
        </div>
        <div class="col col-sm-12 col-md-5">
          <input type="password" class="col-sm-10 col-md-10 form-control" placeholder="Confirme contraseña" name="repass" >
        </div>
      </div>
        <div class="form-group row my-5">
            <div class="col col-sm-12 col-md-5" >
                <input type="text" class="col-sm-10 col-md-10 form-control" placeholder="Fecha de nacimiento Fto. AAAA-MM-DD" name="usrFechaNacimiento" value="{{old('usrFechaNacimiento')}}" >
            </div>
            <div class="col col-sm-12 col-md-5 col-lg-5">
                <input type="file" class="form-control col-sm-10 col-md-10" name="usrAvatar" value="{{old('usrAvatar')}}" >Foto del perfil
            </div>

        </div>
        <div class="form-group row my-5">
            <div class="col col-sm-12 col-md-5" >
                <input type="text" class="col-sm-10 col-md-10 form-control" placeholder="Empresa donde trabaja" name="empresa" value="{{old('usrEmpresa')}}">
            </div>
            <div class="col col-sm-12 col-md-5" >
                <input type="text" class="col-sm-10 col-md-10 form-control" placeholder="CUIL de la empresa" name="cuil_empresa" value="{{old('cuilEmpresa')}}">
            </div>

        </div>

        <div class="form-group col">
            <small>Todos los campos son obligatorios</small>
        </div>
        <!-- VALIDACIONES -->
        @if(count($errors->all())>0)
            <ul class="errores">
                @foreach($errors->all() as $error)
                    <li style="color: red;">
                        <small>{{$error}}</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="form-group row">
            <button type="submit" class="btn btn-dark mx-5 col-sm-2 col-md-2 col-lg-2 mt-4">Registrar</button>
        </div>


    </form>


</div>

@endsection--}}
