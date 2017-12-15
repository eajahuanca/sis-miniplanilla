<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $fillable = 
    				[
    					'pag_tipo_empleado',
    					'id_empleado',
                        'pag_dias',
    					'pag_mes',
    					'pag_gestion',
    					'pag_sueldo',
    					'pag_bono_antiguedad',
    					'pag_cantidad',
    					'pag_pagado',
    					'pag_produccion',
    					'pag_dominical',
    					'pag_otrobono',
    					'pag_total_ganado',
    					'pag_afp',
    					'pag_aporte',
    					'pag_iva',
    					'pag_anticipos',
    					'pag_total_descuento',
    					'pag_total_liquido',
    					'pag_firma',
    					'pag_estado',
                        'user_registra',
                        'user_actualiza',
                        'id_salariominimo'
    				];

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado','id_empleado','id');
    }

    public function salariominimo()
    {
        return $this->belongsTo('App\Salariominimo','id_salariominimo','id');
    }
}
