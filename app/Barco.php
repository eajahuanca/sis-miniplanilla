<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barco extends Model
{
    protected $table = 'barcos';
    protected $fillable = ['bar_nombre','bar_estado','created_at'.'updated_at'];

    public function rastreo()
    {
    	return $this->hasMany('App\Rastreo');
    }
}
