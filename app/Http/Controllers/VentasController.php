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

        /*================================================================================
        =======OBTENGO Y RETORNO LAS COMPRAS DEL USUARIO AUTENTICADO======================
        ==================================================================================*/

        $compras = Venta::with('getComprador','getVendedor','getProducto')
            ->where('venIdComprador', '=', auth()->user()->usrId)->paginate(6);

        return view('/adminUsuarioCompras',[
            'compras'=>$compras
        ]);
    }

    public function ventas(){


        /*================================================================================
        =======OBTENGO Y RETORNO LAS VENTAS DEL USUARIO AUTENTICADO======================
        ==================================================================================*/
        $ventas = Venta::with('getComprador','getVendedor','getProducto')
            ->where('venIdVendedor', '=', auth()->user()->usrId)->paginate(6);

        return view('/adminUsuarioVentas',[
            'ventas'=>$ventas
        ]);
    }

    public function detalleVendedor($id){


            $venta = Venta::find($id);
           //dd($venta[0]->getVendedor);
        /*TRY CATCH PARA OBTENER DETALLE DE UN VENDEDOR
        NOTA: EL TRY IMPIDE UN ERROREXCEPTION AL ACCEDER A UN VENDEDOR AJENO*/
        try {
            if (auth()->user()->usrId == $venta->venIdComprador) {
                return view('/detalleVendedor',
                    [
                        'venta' => $venta
                    ]);
            } else {
                return redirect('/compras');
            }
            /* REDIRECCIONA SI UN USUARIO INTENTA
            VER DATOS DE UN VENDEDOR ASOCIADO A UNA COMPRA AJENA */
        }catch(\ErrorException $e){
            return redirect('/compras');
        }
    }


    public function detalleComprador($id){
        /*PASO POR PARÁMETRO EL ID DELA VENTA*/

        $compra= Venta::find($id);
        // dd($compra->getVendedor->nombre);
        /*TRY CATCH PARA OBTENER DETALLE DE UN COMPRADOR
        NOTA: EL TRY IMPIDE UN ERROREXCEPTION AL ACCEDER A UN COMPRADOR AJENO*/
        try {
            if ($compra->venIdVendedor == auth()->user()->usrId) {
                return view('/detalleComprador',
                    [
                        'compra' => $compra
                    ]);
            } else {
                return redirect('/ventas');
            }
            /* REDIRECCIONA SI UN USUARIO INTENTA
            VER DATOS DE UN COMPRADOR ASOCIADO A UNA VENTA AJENA */
        }catch (\ErrorException $e){
            return redirect('/ventas');
        }
    }

    public function addCompra(){
        /*
         * HACE EFECTIVA UNA COMPRA CONFIRMÁNDOLA DESDE EL CARRITO
         * */
        $enCarrito = Carrito::with('getUsuario')
            ->where('carUsuarios_usrId','=',auth()->user()->usrId)->get();
       // dd($enCarrito[1]);
        /*LISTO CADA PRODUCTO EN EL CARRITO*/
        foreach($enCarrito as $compra) {
           // dd($compra->getProducto->eliminado);

                 //VARIABLES QUE CONTIENEN STOCK EN TABLE PRODUCTOS
                // Y STOCK EN CARRITO DE LA MISMA PUBLICACION
                $cantActual = $compra->getProducto->prdStock;
                $stockEnCar = $compra->carCantidadPrd;

                //COMPARO SI LA CANTIDAD EN CARRITO ESTÁ DISPONIBLE, Y SI NO ESTÁ ELIMINADO
                if( $compra->getProducto->eliminado == 0 && $cantActual > 0 && $cantActual >= $stockEnCar) {

                    //CREO UNA INSTANCIA DE VENTA EN LA TABLE VENTAS POR CADA PRODUCTO
                    Venta::create(
                        [
                            'venIdProducto' => $compra->getProducto->prdId,
                            'venStock' => $compra->carCantidadPrd,
                            'venIdVendedor'=> $compra->getProducto->prdIdUsuario,
                            'venIdComprador'=>auth()->user()->usrId
                        ]);

                    //dd($stockEnCar);
                    //dd($cantActual);

                    //CAMBIO EL STOCK DEL PRODUCTO EN BD (LE RESTO LA CANTIDAD EN CARRITO)
                    Producto::where('prdId', '=', $compra->carIdProducto)->update([
                        'prdStock' => ($cantActual - $stockEnCar)
                    ]);

                    //ELIMINO LAS INSTANCIAS DE CARRITO EN BD, A MEDIDA QUE SE CREA CADA VENTA
                    Carrito::destroy($compra->carId);

                 }else{
                    //POR FALSE
                    return redirect('/carrito')->with('mensaje','No se pudo realizar alguna compra, verifique
                    que los productos/servicios siguen disponibles.');
                }

                 }
        //POR TRUE
        return redirect('/compras')->with('mensaje', 'Felicidades por tu nueva compra, a continuación verás
                        la información de contacto del vendedor');
        }

}
