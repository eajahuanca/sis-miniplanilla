<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rastreo extends Model
{
    protected $table = 'rastreos';
    protected $fillable = ['res_sigla','res_fecha','id_movimiento','res_movimiento','id_localizacion','res_localizacion','id_barco','res_barco','res_numviaje','user_registra','user_actualiza','res_estado','res_observaciones'];

    public function movimiento()
    {
    	return $this->belongsTo('App\Movimiento','id_movimiento','id');
    }

    public function localizacion()
    {
    	return $this->belongsTo('App\Localizacion','id_localizacion','id');
    }

    public function barco()
    {
    	return $this->belongsTo('App\Barco','id_barco','id');
    }

    public function useregistra()
    {
    	return $this->belongsTo('App\User','user_registra','id');
    }

    public function useractualiza()
    {
    	return $this->belongsTo('App\User','user_actualiza','id');
    }
}
