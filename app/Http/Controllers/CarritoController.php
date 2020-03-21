<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Categoria;
use App\Producto;
use App\User;
Use App\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    //
    public function index()
    {

        $carrito = Carrito::with('getProducto')->where("carUsuarios_usrId","=",Auth::user()->usrId)->paginate(4);
        //dd($carrito);
        return view('carrito',
        [
            'carrito'=>$carrito
    ]);
    }

    public function store(Request $request)
    {
        //OBTENGO EN UNA VARIABLE TODAS LAS INSTANCIAS DE LA BD QUE CONTENGAN EL MISMO ID DE PRODUCTO QUE SE ESTÁ PASANDO POR REQUEST
        $car = Carrito::where('carIdProducto','=',$request['prdId'])->get();
       //CREO UN FOREACH QUE IRA MODIFICANDO UNA VARIABLE ITERADORA PARA COMPROBAR SI EL PRODUCTO ESTÁ EN EL CARRITO
        $i = 0;
        foreach($car as $detalle){
            if($detalle->carIdProducto= $request['prdId']){
                $i++;
            }
        }
        //dd($i);
        if($i != 0){
            return redirect('/carrito')->with('mensaje', 'Éste producto ya está en tu carrito.');
        }else {

            $carrito = Carrito::create([
                'carIdProducto' => $request['prdId'],
                'carUsuarios_usrId' => Auth::user()->usrId,
                'carCantidadPrd' => $request['cantidad']
            ]);

            return redirect('/carrito')->with('mensaje', 'Agregado ' . $carrito->getProducto->prdNombre . ' con éxito');
        }
    }

    public function destroy($id)
    {
        Carrito::destroy($id);

        return redirect('/carrito')
            ->with('mensaje', 'Producto eliminado del carrito con éxito');

    }

}
