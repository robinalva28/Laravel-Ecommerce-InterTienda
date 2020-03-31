<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

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

    public function ventas(){

        $ventas = Venta::with('getComprador','getVendedor','getProducto')
            ->where('venIdVendedor', '=', auth()->user()->usrId)->paginate(6);

        return view('/adminUsuarioVentas',[
            'ventas'=>$ventas
        ]);
    }

    public function detalleVendedor($id){
        /*PASO POR PARÁMETRO EL ID DELA VENTA*/

            $venta = Venta::find($id);
           //dd($venta[0]->getVendedor);
        try {
            if (auth()->user()->usrId == $venta->venIdComprador) {
                return view('/detalleVendedor',
                    [
                        'venta' => $venta
                    ]);
            } else {
                return redirect('/compras');
            }
        }catch(\ErrorException $e){
            return redirect('/compras');
        }
    }


    public function detalleComprador($id){
        /*PASO POR PARÁMETRO EL ID DELA VENTA*/

        $compra= Venta::find($id);
        // dd($compra->getVendedor->nombre);
        try {
            if ($compra->venIdVendedor == auth()->user()->usrId) {
                return view('/detalleComprador',
                    [
                        'compra' => $compra
                    ]);
            } else {
                return redirect('/ventas');
            }
        }catch (\ErrorException $e){
            return redirect('/ventas');
        }
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
                 //CAMBIO EL STOCK DE LOS PRODUCTOS EN BD
                $cantActual = $compra->getProducto->prdStock;
                $stockEnCar = $compra->carCantidadPrd;
                //comparo si la cantidad publicada existe
                $existeStock = true;
                if($cantActual > 0 && $cantActual >= $stockEnCar) {

                    //creo una instancia de venta en BD por cada producto
                    Venta::create(
                        [
                            'venIdProducto' => $compra->getProducto->prdId,
                            'venStock' => $compra->carCantidadPrd,
                            'venIdVendedor'=> $compra->getProducto->prdIdUsuario,
                            'venIdComprador'=>auth()->user()->usrId
                        ]);

                    //dd($stockEnCar);
                    //dd($cantActual);
                    Producto::where('prdId', '=', $compra->carIdProducto)->update([
                        'prdStock' => ($cantActual - $stockEnCar)
                    ]);

                    //ELIMINO LAS INSTANCIAS DE CARRITO EN BD, A MEDIDA QUE SE CREA CADA VENTA
                    Carrito::destroy($compra->carId);

                 }else{
                    return redirect('/carrito')->with('mensaje','No se pudo realizar alguna compra, verifique
                    que los productos/servicios siguen disponibles.');
                }

                 }
        return redirect('/compras')->with('mensaje', 'Felicidades por tu nueva compra, a continuación verás
                        la información de contacto del vendedor');
        }

}
