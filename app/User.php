<?php

namespace App;

Use App\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "usuarios";
    protected $primaryKey = "usrId";
   public $guarded = [];

    use Notifiable;

    public function getEmpresa()
    {
        return $this->belongsTo('App\Empresa', 'usrIdEmpresa', 'empId');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','celular', 'email', 'fechaNacimiento','usrIdEmpresa','cuilEmpresa','avatar','password', 'validado','isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
