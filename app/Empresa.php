<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'empresas';
    protected $primaryKey = 'empId';
    protected $guarded = [];
    public $timestamps = false;
}
