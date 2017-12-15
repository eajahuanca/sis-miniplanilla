<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use PDF;
use Carbon\Carbon;
use App\Empleado;
use App\Aguinaldo;
use App\Empresa;
use App\Asignar;

class PABorderController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es');
    }

    public function index()
    {
        return view('sistema.aguinaldo.border.planilla.index');
    }

    public function store(Request $request)
    {
        $nombreEmpresa = 'bolivian';
        $tipo_empleado = trim($request->input('tipo_empleado'));
        $gestion = trim($request->input('agui_gestion'));
        
        $empresa = Empresa::where('emp_nombre','LIKE',"%$nombreEmpresa%")->get();

        $aguinaldo = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')
                ->join('empresa','empresa.id','=','asignar_empresa.id_empresa')
                ->join('aguinaldos','aguinaldos.id_empleado','=','empleado.id')
                ->join('cargo','cargo.id','=','empleado.id_cargo')
                ->select
                    (
                        DB::raw('CONCAT(empleado.em_cedula," ",empleado.em_expedido) AS empleado_cedula'),
                        //DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial," ",empleado.em_nombre) AS empleado_nombre'),
                        'empleado.em_paterno',
                        'empleado.em_materno',
                        'empleado.em_especial',
                        'empleado.em_nombre',
                        'empleado.em_nacionalidad',
                        'empleado.em_nacimiento',
                        'empleado.em_genero',
                        'empleado.id_cargo',
                        'cargo.car_nombre',
                        'empleado.em_fecha_ingeso',
                        'empleado.em_sueldo_basico',
                        'agui_sueldo',
    					'agui_bono',
    					'agui_produccion',
    					'agui_subsidio',
    					'aqui_extraordinario',
    					'agui_otrobono',
    					'agui_totalganado',
    					'agui_totalliquido',
    					'agui_meses',
    					'agui_firma'
                    )
                ->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")
                ->where('aguinaldos.agui_gestion','LIKE',"%$gestion%")
                ->where('aguinaldos.agui_tipo_empleado','LIKE',"%$tipo_empleado%")
                ->where('aguinaldos.agui_estado','=',1)
                ->orderBy('empleado.em_fecha_ingeso','ASC')->get();

        $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');
        
        $view = \View::make('sistema.aguinaldo.border.planilla.planilla', compact('empresa','fechaImpresion','mes','gestion','tipo_empleado','aguinaldo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('legal','portrait'); vertical
        //$paper_size = array(0,0,3210,2160);
        //$dompdf->set_paper($paper_size);
        $pdf->setPaper('LEGAL','landscape');
        $pdf->loadHTML($view);
        return $pdf->download('PlanillaAguinaldoBBS'.date('d-m-Y').date('H-i-s').'.pdf');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }
}
