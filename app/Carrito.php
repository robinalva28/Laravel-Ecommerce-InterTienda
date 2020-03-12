<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    protected $primaryKey = 'carId';
    protected $guarded = [];
    public $timestamps = false;

}
