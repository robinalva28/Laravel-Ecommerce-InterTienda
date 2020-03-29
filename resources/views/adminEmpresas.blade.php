@extends('layout.plantilla')

@section('title', 'Panel de Empresas')

@section('h1', 'Panel de Empresas')

@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif

    <table class=" mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped">
        <h3><strong>@yield('h1')</strong></h3>
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Empresa</th>
            <th colspan="3">Cuil</th>


            {{-- <th colspan="2">
                 <a href="/formAgregarempresa" class="btn btn-dark">Agregar</a>
             </th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach( $empresas as $empresa )
            <tr>
                <td>{{$empresa->empId}}</td>
                <td>{{$empresa->empNombre}}</td>
                <td>{{$empresa->empCuil}}</td>
                <td>
                    <a href="formModificarEmpresa/{{$empresa->empId}}" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>

                    <form action="/admin/eliminarEmpresa/{{$empresa->empId}}">
                        @csrf
                        <button type="submit" onclick="return confirm('¿Desea eliminar ésta Empresa?')" class="btn btn-outline-secondary">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        <th colspan="1">
            <a href="/admin/formAgregarEmpresa" class="btn btn-dark">Agregar</a>
        </th>
        <th colspan="4">{{ $empresas->links() }}</th>

        </tbody>
    </table>



@endsection

