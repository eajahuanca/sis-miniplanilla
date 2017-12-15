<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = ['fecha','lugar','descripcion','id_usuario','id_tipoevento','id_userregistra','id_useractualiza','created_at','updated_at','estado'];

    public function tipoevento()
    {
    	return $this->belongsTo('App\Tipoevento','id_tipoevento','id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User','id_usuario','id');
    }

    public function userRegistra()
    {
    	return $this->belongsTo('App\User','id_userregistra','id');
    }

    public function userActualiza()
    {
    	return $this->belongsTo('App\User','id_useractualiza','id');
    }
}
