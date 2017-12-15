<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Storage;
use File;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = 
                [
                    'id_empleado',
                    'usuario_fotografia',
                    'email',
                    'usuario_cuenta',
                    'usuario_tipo',
                    'usuario_estado'
                ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
                [
                    'password', 'remember_token',
                ];

    public function empleado()
    {
        return $this->belongsTo('App\Empleado','id_empleado','id');
    }
}
