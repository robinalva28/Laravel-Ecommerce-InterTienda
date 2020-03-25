@extends('layout.plantilla')

@section('title', 'Modificar Empresa')

@section('h1', 'Modificar Empresa')

@section('contenido')
    <div class="ml-5 cmx-auto mt-1 p-1  col-6 ">
        <div class="alert bg-light p-4 col-8 align-items-center">
            <form action="/admin/modificarEmpresa/{{$empresa->empId}}" method="post" enctype="multipart/form-data">
                @csrf
                Nombre:
                <br>
                <input type="text" name="empNombre" value="{{ $empresa->empNombre }}" class="form-control">
                <br>
                Cuil:
                <br>
                <input type="text" name="empCuil" value="{{ $empresa->empCuil }}" class="form-control">
                <br>

                <input type="hidden" name="marId" value="{{ $empresa->empId }}">

                <br>
                <button type="submit" class="btn btn-dark">Agregar</button>

                <a href="/admin/adminEmpresas" class="btn btn-outline-secondary ml-3">
                    Ir al panel de empresas
                </a>
            </form>
        </div>
    </div>
@endsection

