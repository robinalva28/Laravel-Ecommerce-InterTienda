<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = "usuario";
    public $primaryKey = "usId";
    public $guarded = [];
    public $timestamps = false;

}
