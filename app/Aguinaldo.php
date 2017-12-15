<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aguinaldo extends Model
{
    protected $table = 'aguinaldos';
    protected $fillable = 
    				[
    					'agui_tipo_empleado',
    					'id_empleado',
                        'agui_meses',
    					'agui_gestion',
    					'agui_sueldo',
    					'agui_bono',
    					'agui_produccion',
    					'agui_subsidio',
    					'aqui_extraordinario',
    					'agui_otrobono',
    					'agui_totalganado',
    					'agui_totalliquido',
    					'agui_firma',
    					'agui_estado',
                        'user_registra',
                        'user_actualiza'
    				];

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado','id_empleado','id');
    }
}
