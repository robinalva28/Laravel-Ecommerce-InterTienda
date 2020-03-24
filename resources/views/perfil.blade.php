@extends('layout.plantilla')

@section('title', 'Mi cuenta')

@section('h1', 'Mi cuenta')

@section('contenido')
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif
    <div class=" col-md-9 mt-1 p-1 mx-auto mx-3 container-fluid">

        <a href="/faq" class="btn btn-link">Preguntas frecuentes</a>
        <a href="/contact" class="btn btn-link">Contactar con InterTienda</a>
    </div>
<div class="card bg-light col-md-9 mt-1 p-1 mx-auto mx-3">
    <table class="table table-hover table-striped table-border ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>Habilitado</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Empresa</th>
            <th>Fecha de nacimiento</th>
            <th>Avatar</th>
            <th></th>


        </tr>
        </thead>
        <tbody>
        <h2><strong>@yield('h1') - {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</strong></h2>
        <br>

            <tr>
                @if(auth()->user()->validado == 1)
                    <td style="color:green;" >Si</td>
                @else
                    <td style="color:red;" >No</td>
                @endif
                <td>{{ auth()->user()->nombre }}</td>
                <td>{{ auth()->user()->apellido }}</td>
                <td>{{ auth()->user()->email}}</td>
                <td>{{ auth()->user()->celular }}</td>
                <td>{{ auth()->user()->empresa }}</td>
                <td>{{ auth()->user()->fechaNacimiento }}</td>
                <td ><img  src="{{ asset('images/avatares') }}/{{ auth()->user()->avatar }}" class="img-thumbnail" width="80px" ></td>
                    <td>
                        <a href="/formModificarDatos" class="btn btn-outline-secondary">
                            Modificar datos
                        </a>
                    </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
