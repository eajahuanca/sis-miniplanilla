<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salariominimo extends Model
{
    protected $table = 'salario_minimo';
    protected $fillable = [
    						'sm_salario',
    						'sm_descripcion',
    						'sm_estado'
    					];

    public function pago()
    {
    	return $this->hasMany('App\Pago');
    }
}
