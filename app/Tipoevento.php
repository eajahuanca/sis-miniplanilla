<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoevento extends Model
{
    protected $table = 'tipoeventos';
    protected $fillable = ['te_nombre','te_color','te_estado','created_at','updated_at'];

    public function evento()
    {
    	return $this->hasMany('App\Evento');
    }
}
