<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;
use Carbon\Carbon;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $fillable =
    			[
    				'id_empresa',
    				'em_nombre',
    				'em_paterno',
    				'em_materno',
    				'em_especial',
    				'em_cedula',
    				'em_expedido',
    				'em_nacimiento',
    				'em_genero',
    				'em_nacionalidad',
    				'em_departamento',
    				'em_ciudad',
    				'em_zona',
    				'em_calle',
    				'em_numero',
    				'em_telefono',
    				'em_celular',
    				'em_fotografia',
    				'em_fecha_ingeso',
                    'em_sueldo_basico',
    				'id_cargo',
    				'id_area',
    				'em_estado',
                    'em_bono',
                    'em_observaciones'];

    public function cargo()
    {
    	return $this->belongsTo('App\Cargo','id_cargo','id');
    }

    public function area()
    {
    	return $this->belongsTo('App\Area','id_area','id');
    }

    public function empresa()
    {
        return $this->hasMany('App\Empresa');
    }

    public function pago()
    {
        return $this->hasMany('App\Pago');
    }

    public function asignar()
    {
        return $this->hasMany('App\Asignar');
    }

    public function aguinaldo(){
        return $this->hasMany('App\Aguinaldo');   
    }

    public function setEmFotografiaAttribute($imagen)
    {
        $nuevoNombre = Carbon::now()->year . Carbon::now()->month . Carbon::now()->day. "-" .
                       Carbon::now()->hour . Carbon::now()->minute . Carbon::now()->second . "." .
                       $imagen->getClientOriginalExtension();

        $this->attributes['em_fotografia'] = 'storage/usuario/'.$nuevoNombre;
        
        $storage = Storage::disk('usuario')->put($nuevoNombre, \File::get($imagen));
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}