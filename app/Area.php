<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $table = 'area';
	protected $fillable = ['ar_nombre','ar_descripcion','ar_estado'];

	public function empleado()
	{
		return $this->hasMany('App\Empleado');
	}
}
