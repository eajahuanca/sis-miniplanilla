<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    protected $table = 'localizaciones';
    protected $fillable = ['loc_nombre','loc_estado','created_at','updated_at'];

    public function rastreo()
    {
    	return $this->hasMany('App\Rastreo');
    }
}