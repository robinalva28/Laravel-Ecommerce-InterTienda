@extends('layout.plantilla')

@section('title', 'Carrito')

@section("contenido")
<div class="container d-flex flex-column h-100 mt-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><img src="./img/tecno_01.png" alt="..." class="img-fluid img-thumbnail" width="80px"></th>
                <td>$5000</td>
                <td>1</td>
                <td><a href="#"><i class="far fa-trash-alt"></i></a></i></td>
            </tr>
            <tr>
                <th scope="row"><img src="./img/ropa_01.png" alt="..." class="img-fluid img-thumbnail" width="80px"></th>
                <td>$2000</td>
                <td>2</td>
                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            <tr>
                <th scope="row"><img src="./img/ropa_4.png" alt="..." class="img-fluid img-thumbnail" width="80px"></th>
                <td >$1000</td>
                <td>3</td>
                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary">Comprar</button>
</div>
    @endsection
