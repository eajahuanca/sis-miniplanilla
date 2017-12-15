<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $table = 'asignar_empresa';
    protected $fillable = ['id_empresa','id_empleado','estado'];

    public function empresa()
    {
    	return $this->belongsTo('App\Empresa','id_empresa','id');
    }

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado','id_empleado','id');
    }
}
