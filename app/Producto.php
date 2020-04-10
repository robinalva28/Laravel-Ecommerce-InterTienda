<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    protected $primaryKey = 'prdId';
    protected $guarded = [];
   public $timestamps = false;

    public function getMarca()
    {
        return $this->belongsTo('App\Marca', 'prdIdMarca', 'marId');
    }

    public function getCategoria()
    {
        return $this->belongsTo('App\Categoria', 'prdIdCategoria', 'catId');
    }

    public function getUsuario()
    {
        return $this->belongsTo('App\User', 'prdIdUsuario', 'usrId');
    }
    public function getVenta()
    {
        return $this->belongsTo('App\Venta', 'prdId', 'venIdProducto');
    }






}
