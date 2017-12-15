<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
use File;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = 
    				[
    					'emp_nombre',
    					'emp_nit',
    					'emp_empleador',
    					'emp_caja',
    					'id_representante',
    					'emp_imagen',
    					'emp_estado'
    				];

    public function setEmpImagenAttribute($imagen)
    {
    	$nuevoNombre = Carbon::now()->year . Carbon::now()->month . Carbon::now()->day. "-" .
                       Carbon::now()->hour . Carbon::now()->minute . Carbon::now()->second . "." .
                       $imagen->getClientOriginalExtension();

        $this->attributes['emp_imagen'] = 'storage/empresa/'.$nuevoNombre;
        $storage = Storage::disk('empresa')->put($nuevoNombre, \File::get($imagen));
    }

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado','id_representante', 'id');
    }

    public function asignar()
    {
        return $this->hasMany('App\Asignar');
    }
}
