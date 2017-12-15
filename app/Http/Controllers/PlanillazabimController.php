<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use PDF;
use Carbon\Carbon;
use App\Empleado;
use App\Pago;
use App\Empresa;
use App\Asignar;

class PlanillazabimController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es');
    }

    public function index()
    {
        return view('sistema.planilla.planillazabim.planillaIndex');
    }

    public function store(Request $request)
    {
        $nombreEmpresa = 'zabim';
        $mes = trim($request->input('pag_mes'));
        $tipo_empleado = trim($request->input('tipo_empleado'));
        $gestion = trim($request->input('gestion'));
        
        $empresa = Empresa::where('emp_nombre','LIKE',"%$nombreEmpresa%")->get();

        $pago = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')
                ->join('empresa','empresa.id','=','asignar_empresa.id_empresa')
                ->join('pago','pago.id_empleado','=','empleado.id')
                ->join('cargo','cargo.id','=','empleado.id_cargo')
                ->select
                    (
                        DB::raw('CONCAT(empleado.em_cedula," ",empleado.em_expedido) AS empleado_cedula'),
                        DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial," ",empleado.em_nombre) AS empleado_nombre'),
                        'empleado.em_nacionalidad',
                        'empleado.em_nacimiento',
                        'empleado.em_genero',
                        'empleado.id_cargo',
                        'cargo.car_nombre',
                        'empleado.em_fecha_ingeso',
                        'empleado.em_sueldo_basico',
                        'pago.pag_dias',
                        'pago.pag_sueldo',
                        'pago.pag_bono_antiguedad',
                        'pago.pag_cantidad',
                        'pago.pag_pagado',
                        'pago.pag_produccion',
                        'pago.pag_dominical',
                        'pago.pag_otrobono',
                        'pago.pag_total_ganado',
                        'pago.pag_afp',
                        'pago.pag_aporte',
                        'pago.pag_iva',
                        'pago.pag_anticipos',
                        'pago.pag_total_descuento',
                        'pago.pag_total_liquido'
                    )
                ->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")
                ->where('pago.pag_mes','LIKE',"%$mes%")
                ->where('pago.pag_gestion','LIKE',"%$gestion%")
                ->where('pago.pag_tipo_empleado','LIKE',"%$tipo_empleado%")
                ->where('pago.pag_estado',1)
                ->orderBy('empleado.em_fecha_ingeso','ASC')->get();
        
        $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');

        $view = \View::make('sistema.planilla.planillazabim.planillaStore', compact('empresa','fechaImpresion','mes','gestion','tipo_empleado','pago'))->render();
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('legal','portrait'); vertical
        $pdf->setPaper('Legal','landscape');
        $pdf->loadHTML($view);
        return $pdf->download('Planilla'.date('d-m-Y').date('H-i-s').'.pdf');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
