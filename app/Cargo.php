<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $fillable = ['car_nombre','car_descripcion','car_estado'];

    public function empleado()
    {
    	return $this->hasMany('App\Empleado');
    }
}
