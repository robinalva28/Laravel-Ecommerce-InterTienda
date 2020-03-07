@extends('layout.plantilla')

@section('title', 'Mi perfil')

@section('contenido')

<div class="mx-auto" style="width: 200px;">
    <h2 class="mt-5 ">Perfil</h2>
    <div class="card mb-5 " style="width: 18rem ">

        <img src="" class="card-img-top rounded-circle" alt="...">
        <img src="" class="card-img-top rounded-circle" alt="..." style="display: none">
        <div class="card-body">
            <h5 class="card-title"><Strong>USUARIO</Strong></h5>
            <p class="card-text">nombre</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">email</li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <button  type="buttom"  class="btn btn-danger col-sm-12 col-md-12 col-lg-12" name="" value=""><Strong>Salir</Strong></button>
        </form>

    </div>
</div>
@endsection
