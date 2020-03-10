@extends('layout.plantilla')

@section('title', 'Mi perfil')

@section('contenido')

{{--<div class="mx-auto" style="width: 200px;">
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
            <li class="list-group-item">email</li>
            <li class="list-group-item">email</li>
            <li class="list-group-item">email</li>
            <li class="list-group-item">email</li>
            <li class="list-group-item">email</li>

        </ul>
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <button  type="buttom"  class="btn btn-danger col-sm-12 col-md-12 col-lg-12" name="" value=""><Strong>Salir</Strong></button>
        </form>

    </div>
</div>--}}



<div class="card bg-light col-md-6 mt-1 p-1 mx-auto mx-3">
    <table class="table table-hover table-striped table-border ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Fecha de nacimiento</th>
            <th>Avatar</th>
       {{--     <th colspan="2">
                <a href="/formAgregarProducto" class="btn btn-dark">
                    Nueva publicación
                </a>
            </th>--}}
        </tr>
        </thead>
        <tbody>
        <h1>{{ auth()->user()->nombre }}</h1>

            <tr>
                <td>{{ auth()->user()->nombre }}</td>
                <td>{{ auth()->user()->apellido }}</td>
                <td>{{ auth()->user()->email}}</td>
                <td>{{ auth()->user()->celular }}</td>
                <td>{{ auth()->user()->fechaNacimiento }}</td>
                <td ><img  src="{{ asset('images/avatares') }}/{{ auth()->user()->avatar }}" class="img-thumbnail" width="150px" ></td>
                {{--<td>
                    <a href="" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>--}}
            </tr>

        </tbody>
    </table>
</div>
@endsection
