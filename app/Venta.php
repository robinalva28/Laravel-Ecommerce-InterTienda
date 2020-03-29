<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = 'ventas';
    protected $primaryKey = 'venId';
    protected $guarded = [];

    public function getProducto()
    {
        return $this->belongsTo('App\Producto', 'venIdProducto', 'prdId');
    }

    public function getComprador()
    {
        return $this->belongsTo('App\User', 'venIdComprador', 'usrId');
    }

    public function getVendedor()
    {
        return $this->belongsTo('App\User', 'venIdVendedor', 'usrId');
    }

}
