<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
//use App\Http\Requests\PagoRequest;
use DB;
use Carbon\Carbon;
use App\Empleado;
use App\Empresa;
use App\Asignar;
use App\Aguinaldo;
use App\Pago;

class AguinaldoZaireController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index(){
    	$nombreEmpresa = 'zaire';
        $aguinaldo = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')->
                        join('empresa','empresa.id','=','asignar_empresa.id_empresa')->
                        join('aguinaldos','aguinaldos.id_empleado','=','empleado.id')->
                        select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_empleado'), 
                        	DB::raw('CONCAT(aguinaldos.agui_meses,"/",aguinaldos.agui_gestion) AS agui_meses'),
                                
                                'aguinaldos.agui_sueldo',
                                'aguinaldos.agui_bono',
                                'aguinaldos.agui_produccion',
                                'aguinaldos.agui_subsidio',
                                'aguinaldos.aqui_extraordinario',
                                'aguinaldos.agui_otrobono',
                                'aguinaldos.agui_totalganado',
                                'aguinaldos.agui_totalliquido',
                                'aguinaldos.agui_tipo_empleado',
                                'aguinaldos.agui_estado',
                                'aguinaldos.id',
                            	'aguinaldos.created_at')
                        ->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")->orderBy('aguinaldos.created_at','DESC')->get();

        return view('sistema.aguinaldo.zaire.index')->with('aguinaldo', $aguinaldo);
    }

    public function create()
    {
        $nombreEmpresa = 'zaire';
        $empleado = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')
                                ->join('empresa','empresa.id','=','asignar_empresa.id_empresa')
                                ->select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_completo'),'empleado.id')
                                ->where('empleado.em_estado',1)
                                ->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")
                                ->orderBy('empleado.em_paterno','ASC')
                                ->lists('nombre_completo','empleado.id');
 
        return view('sistema.aguinaldo.zaire.create')->with('empleado',$empleado);
    }

    public function store(Request $request)
    {
        $aguinaldoVerificar = Aguinaldo::where('id_empleado','=',$request->input('id_empleado'))
                    ->where('agui_gestion','=',$request->input('agui_gestion'))
                    ->where('agui_estado',1)->get();
        if(count($aguinaldoVerificar)==0)
        {
            try
            {
                $aguinaldo = new Aguinaldo($request->all());
                $empleado = Empleado::find($request['id_empleado']);
                $noviembre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','NOVIEMBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();
                $octubre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','OCTUBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();
                $septiembre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','SEPTIEMBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();

                $aguinaldo->agui_sueldo = ($noviembre->pag_sueldo + $octubre->pag_sueldo + $septiembre->pag_sueldo)/3;
                $aguinaldo->agui_bono = ($noviembre->pag_bono_antiguedad + $octubre->pag_bono_antiguedad + $septiembre->pag_bono_antiguedad)/3;
                $aguinaldo->agui_produccion = ($noviembre->pag_produccion + $octubre->pag_produccion + $septiembre->pag_produccion)/3;
                $aguinaldo->agui_otrobono = ($noviembre->pag_otrobono + $octubre->pag_otrobono + $septiembre->pag_otrobono)/3;
                $aguinaldo->agui_totalganado = $aguinaldo->agui_sueldo + $aguinaldo->agui_bono + $aguinaldo->agui_produccion + $aguinaldo->agui_otrobono;
                $aguinaldo->agui_totalliquido = ($aguinaldo->agui_totalganado * $aguinaldo->agui_meses)/12;
                $aguinaldo->agui_firma = ($request['agui_tipo_empleado'] == 'PERMANENTE') ? 'PAPELETA DE PAGO':'';
                $aguinaldo->user_registra = Auth::user()->id;
                $aguinaldo->user_actualiza = Auth::user()->id;
                $aguinaldo->save();
                flash('Se guardó de manera satisfactoria el aguinaldo de <b>'.$aguinaldo->empleado->em_nombre.' '.$aguinaldo->empleado->em_paterno.' '.$aguinaldo->empleado->em_materno.' '.$aguinaldo->empleado->em_especial.'</b>','success');
            }
            catch(\Exception $ex)
            {
                flash('Ocurrió un problema al intentar guardar el aguinaldo, error: '.$ex->getMessage(),'danger');
            }
        }
        else
        {
            flash('Ya existe un aguinaldo registrado con la gestion <b>'.$request->input('agui_gestion').'</b> de : <b>'.$aguinaldoVerificar[0]->empleado->em_nombre.' '.$aguinaldoVerificar[0]->empleado->em_paterno.' '.$aguinaldoVerificar[0]->empleado->em_materno.'</b>','danger');
        }

        return redirect()->route('aguinaldoZaire.index');
    }

    public function show($idaguinaldo)
    {
        $aguinaldo = Aguinaldo::find($idaguinaldo);
        return view('sistema.aguinaldo.Zaire.show')->with('aguinaldo',$aguinaldo);
    }

    public function edit($idaguinaldo)
    {
        $aguinaldo = Aguinaldo::find($idaguinaldo);
        $empleado = Empleado::select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_completo'),'empleado.id')->where('empleado.id',$aguinaldo->id_empleado)->lists('nombre_completo','empleado.id');

        return view('sistema.aguinaldo.zaire.edit')->with('aguinaldo',$aguinaldo)->with('empleado',$empleado);
    }

    public function update(Request $request, $idaguinaldo)
    {
        $aguinaldoVerificar = Aguinaldo::where('agui_gestion',$request->input('agui_gestion'))
                                ->where('agui_estado',1)
                                ->where('agui_gestion',$request->input('agui_gestion'))
                                ->where('id_empleado',$request->input('id_empleado'))->get();

        $variableBandera = 0;
        
        if($request->input('agui_estado'))
        {    
            $variableBandera = (count($aguinaldoVerificar) > 0)? 1:0;
        }
        if($variableBandera == 0)
        {
            try
            {
                $aguinaldo = Aguinaldo::find($idaguinaldo);
                $aguinaldo->fill($request->all());

                $noviembre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','NOVIEMBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();
                $octubre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','OCTUBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();
                $septiembre = Pago::where('pag_estado','=',1)->where('id_empleado','=',$request['id_empleado'])->where('pag_mes','=','SEPTIEMBRE')->where('pag_gestion','=',$request['agui_gestion'])->first();

                $aguinaldo->agui_sueldo = ($noviembre->pag_sueldo + $octubre->pag_sueldo + $septiembre->pag_sueldo)/3;
                $aguinaldo->agui_bono = ($noviembre->pag_bono_antiguedad + $octubre->pag_bono_antiguedad + $septiembre->pag_bono_antiguedad)/3;
                $aguinaldo->agui_produccion = ($noviembre->pag_produccion + $octubre->pag_produccion + $septiembre->pag_produccion)/3;
                $aguinaldo->agui_otrobono = ($noviembre->pag_otrobono + $octubre->pag_otrobono + $septiembre->pag_otrobono)/3;
                $aguinaldo->agui_totalganado = $aguinaldo->agui_sueldo + $aguinaldo->agui_bono + $aguinaldo->agui_produccion + $aguinaldo->agui_otrobono;
                $aguinaldo->agui_totalliquido = ($aguinaldo->agui_totalganado * $aguinaldo->agui_meses)/12;
                
                $aguinaldo->user_actualiza = Auth::user()->id;
                $aguinaldo->update();
                flash('Se actualizo de manera satisfactoria el registro del aguinaldo', 'success');
            }
            catch(\Exception $ex)
            {
                flash('Ocurrió un problema al intentar actualizar el registro de pago, error: '.$ex->getMessage(),'danger');
            }
        }
        else
        {
            flash('No se puede actualizar el aguinaldo de <b>'.$aguinaldoVerificar[0]->empleado->em_nombre.' '.$aguinaldoVerificar[0]->empleado->em_paterno.' '.$aguinaldoVerificar[0]->empleado->em_materno.'</b>, ya que existe un aguinaldo habilitado de la gestión de <b>'.$aguinaldoVerificar[0]->agui_gestion.'</b>','danger');
        }
        
        return redirect()->route('aguinaldoZaire.index');
    }

    public function boletaAguinaldo($idaguinaldo)
    {
    	try{
	        $aguinaldo = Aguinaldo::find($idaguinaldo);
	        $idEmpleado = $aguinaldo->id_empleado;
	        $empleado = Empleado::find($idEmpleado);
	        $asignar = Asignar::where('id_empleado',$idEmpleado)->lists('id_empresa');
	        $idEmpresa = $asignar[0];
	        $empresa = Empresa::find($idEmpresa);
	        $view = \View::make('sistema.aguinaldo.zaire.boleta', compact('aguinaldo','empleado','empresa'))->render();
	        $pdf = \App::make('dompdf.wrapper');
	        $pdf->loadHTML($view);

        	return $pdf->download('boletaAguinaldo'.$aguinaldo->agui_gestion.'-'.str_replace(' ', '',($empleado->em_paterno.$empleado->em_nombre)).'.pdf');
    	}catch(\Exception $ex){

    	}
    }
}
