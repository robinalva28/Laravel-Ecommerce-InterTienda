<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    //
    public function compras(){

        $compras = Venta::with('getComprador','getVendedor','getProducto')
            ->where('venIdComprador', '=', auth()->user()->usrId)->paginate(6);

        return view('/adminUsuarioCompras',[
            'compras'=>$compras
        ]);
    }

    public function detalleVendedor($id){

    }

    public function addCompra(){
        ##### PENDIENTE ELIMINAR CANTIDAD DE PRODUCTOS DEL STOCK DEL ORIGINAL<<-- LISTO
        ##### ELIMINAR LOS CARRITOS DE LA BASE DE DATOS <<-LISTO
        ##### IMPACTO EN VISTAS <<-listo
        ##### MENSAJE DE FELICITACION POR COMPRA(INVESTIGAR vent emergente) ????
        $enCarrito = Carrito::with('getUsuario')
            ->where('carUsuarios_usrId','=',auth()->user()->usrId)->get();
       // dd($enCarrito[1]);
        foreach($enCarrito as $compra) {
           // dd($compra->getProducto->prdId);
                 Venta::create(
                     [
                         'venIdProducto' => $compra->getProducto->prdId,
                         'venStock' => $compra->carCantidadPrd,
                        'venIdVendedor'=> $compra->getProducto->prdIdUsuario,
                        'venIdComprador'=>auth()->user()->usrId
            ]);
                 //CAMBIO EL STOCK DE LOS PRODUCTOS EN BD
                $cantActual = $compra->getProducto->prdStock;
                $stockEnCar = $compra->carCantidadPrd;
                //dd($stockEnCar);
                //dd($cantActual);
                Producto::where('prdId','=',$compra->carIdProducto)->update([
                    'prdStock' => ($cantActual - $stockEnCar)
                ]);

                 //ELIMINO LAS INSTANCIAS DE CARRITO EN BD, A MEDIDA QUE SE CREA CADA VENTA
                 Carrito::destroy($compra->carId);
                 }


        return redirect('/compras')->with('mensaje', 'Felicidades por tu nueva compra, a continuación verás
        la información de contacto del vendedor');
        }

}
