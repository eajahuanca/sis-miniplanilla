<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $fillable = ['mov_nombre','mov_estado','created_at','updated_at'];

    public function rastreo()
    {
    	return $this->hasMany('App\Rastreo');
    }
}
