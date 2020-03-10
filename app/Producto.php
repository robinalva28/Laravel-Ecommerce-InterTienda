<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
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






}
