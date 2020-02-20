<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    public $table = "usuarios";
    protected $primaryKey = "usrId";
    public $guarded = [];
   /* public $timestamps = false;*/

}
