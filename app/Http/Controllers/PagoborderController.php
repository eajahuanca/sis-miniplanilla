<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use DB;
use Carbon\Carbon;
use App\Empleado;
use App\Empresa;
use App\Asignar;
use App\Pago;
use App\Salariominimo;

class PagoborderController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $nombreEmpresa = 'bolivian';
        $pago = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')->
                        join('empresa','empresa.id','=','asignar_empresa.id_empresa')->
                        join('pago','pago.id_empleado','=','empleado.id')->
                        select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_empleado'), DB::raw('CONCAT(pago.pag_mes,"/",pago.pag_gestion) AS pago_mes'),
                                'empleado.em_sueldo_basico','pago.pag_sueldo','pago.pag_bono_antiguedad','pago.pag_total_ganado','pago.pag_afp','pago.pag_total_descuento','pago.pag_total_liquido','pago.pag_tipo_empleado','pago.pag_estado','pago.id')->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")->orderBy('pago.created_at','DESC')->get();

        return view('sistema.pago.pagoborder.pagoIndex')->with('pago', $pago);
    }

    public function create()
    {
        $nombreEmpresa = 'bolivian';
        $empleado = Asignar::join('empleado','empleado.id','=','asignar_empresa.id_empleado')
                                ->join('empresa','empresa.id','=','asignar_empresa.id_empresa')
                                ->select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_completo'),'empleado.id')
                                ->where('empleado.em_estado',1)
                                ->where('empresa.emp_nombre','LIKE',"%$nombreEmpresa%")
                                ->orderBy('empleado.em_paterno','ASC')
                                ->lists('nombre_completo','empleado.id');
        $idsalariominimo = Salariominimo::where('sm_estado',1)->first()->get();
        return view('sistema.pago.pagoborder.pagoCreate')->with('empleado',$empleado)->with('idsalariominimo', $idsalariominimo);
    }

    public function store(PagoRequest $request)
    {
        $pagoVerificar = Pago::where('id_empleado',$request->input('id_empleado'))
                    ->where('pag_mes',$request->input('pag_mes'))
                    ->where('pag_gestion',date('Y'))
                    ->where('pag_estado',1)->get();
        if(count($pagoVerificar)==0)
        {
            try
            {
                $pago = new Pago($request->all());
                $pago->pag_gestion = date('Y');

                $empleado = Empleado::find($request['id_empleado']);
                $salario = Salariominimo::where('id','=',$request['id_salariominimo'])->get();

                $pago->pag_bono_antiguedad = $empleado->em_bono;
                $pago->pag_firma = ($request['pag_tipo_empleado'] == 'PERMANENTE') ? 'PAPELETA DE PAGO':'';

                $totalGanado = (
                                $request['pag_sueldo'] +
                                $pago->pag_bono_antiguedad +
                                $request['pag_pagado'] +
                                $request['pag_produccion'] +
                                $request['pag_dominical'] +
                                $request['pag_otrobono'] 
                            );
                $pago->pag_total_ganado = $totalGanado;
                
                $pago->pag_afp = ($request['pag_tipo_empleado'] == 'PERMANENTE')? (($pago->pag_total_ganado)*(0.1271)):'0.00';
                if($totalGanado >= 9165){
                    $pago->pag_iva = (($totalGanado - $pago->pag_afp) - 2*($salario[0]->sm_salario)) - (0.13 * 2 * ($salario[0]->sm_salario));
                }else{
                    $pago->pag_iva = '0.00';
                }
                //$pago->pag_iva = $this->rcIva($request['id_salariominimo'], $pago->pag_total_ganado);

                $totalDescuento = (
                                    $pago->pag_afp +
                                    $request['pag_aporte'] +
                                    $pago->pag_iva +
                                    $request['pag_anticipos']
                                );
                $pago->pag_total_descuento = $totalDescuento;
                $pago->pag_total_liquido = ($totalGanado - $totalDescuento);
                $pago->user_registra = Auth::user()->id;
                $pago->user_actualiza = Auth::user()->id;
                $pago->save();
                flash('Se guardó de manera satisfactoria el pago de <b>'.$pago->empleado->em_nombre.' '.$pago->empleado->em_paterno.' '.$pago->empleado->em_materno.' '.$pago->empleado->em_especial.'</b>','success');
            }
            catch(\Exception $ex)
            {
                flash('Ocurrió un problema al intentar guardar el pago, error: '.$ex->getMessage(),'danger');
            }
        }
        else
        {
            flash('Ya existe un pago registrado con el mes <b>'.$request->input('pag_mes').'/'.date('Y').'</b> de : <b>'.$pagoVerificar[0]->empleado->em_nombre.' '.$pagoVerificar[0]->empleado->em_paterno.' '.$pagoVerificar[0]->empleado->em_materno.'</b>','danger');
        }

        return redirect()->route('pagoBorder.index');
    }

    public function show($id)
    {
        $pago = Pago::find($id);
        return view('sistema.pago.pagoborder.pagoShow')->with('pago',$pago);
    }

    public function edit($id)
    {
        $pago = Pago::find($id);
        $idsalariominimo = Salariominimo::where('id',$pago->id_salariominimo)->first()->get();
        $empleado = Empleado::select(DB::raw('CONCAT(empleado.em_paterno," ",empleado.em_materno," ",empleado.em_especial,", ",empleado.em_nombre) AS nombre_completo'),'empleado.id')->where('empleado.id',$pago->id_empleado)->lists('nombre_completo','empleado.id');

        return view('sistema.pago.pagoborder.pagoEdit')->with('pago',$pago)->with('empleado',$empleado)->with('idsalariominimo',$idsalariominimo);
    }

    public function update(PagoRequest $request, $id)
    {
        $pagoVerificar = Pago::where('pag_mes',$request->input('pag_mes'))
                                ->where('pag_estado',1)
                                ->where('pag_gestion',date('Y'))
                                ->where('id_empleado',$request->input('id_empleado'))->get();
        $variableBandera = 0;
        
        if($request->input('pag_estado'))
        {    
            $variableBandera = (count($pagoVerificar) > 0)? 1:0;
        }
        if($variableBandera == 0)
        {
            try
            {
                $pago = Pago::find($id);
                $pago->fill($request->all());
                $pago->user_actualiza = Auth::user()->id;
                
                $empleado = Empleado::find($request['id_empleado']);
                $salario = Salariominimo::where('id','=',$request['id_salariominimo'])->get();
                
                $pago->pag_bono_antiguedad = $empleado->em_bono;

                $pago->pag_firma = ($request['pag_tipo_empleado'] == 'PERMANENTE') ? 'PAPELETA DE PAGO':'';

                $pago->pag_total_ganado = (
                                            $request['pag_sueldo'] +
                                            $pago->pag_bono_antiguedad +
                                            $request['pag_pagado'] +
                                            $request['pag_produccion'] +
                                            $request['pag_dominical'] +
                                            $request['pag_otrobono'] 
                                        );
                //$pago->pag_iva = $this->rcIva($request['id_salariominimo'], $pago->pag_total_ganado);
                $pago->pag_afp = ($request['pag_tipo_empleado'] == 'PERMANENTE')? (($pago->pag_total_ganado)*(0.1271)):'0.00';
                if($pago->pag_total_ganado >= 9165){
                    $pago->pag_iva = (($pago->pag_total_ganado - $pago->pag_afp) - 2*($salario[0]->sm_salario)) - (0.13 * 2 * ($salario[0]->sm_salario));
                }else{
                    $pago->pag_iva = '0.00';
                }
                 
                $pago->pag_total_descuento = (
                                            $pago->pag_afp +
                                            $request['pag_aporte'] +
                                            $pago->pag_iva +
                                            $request['pag_anticipos']
                                        );
                $pago->pag_total_liquido = ($pago->pag_total_ganado - $pago->pag_total_descuento);
                $pago->update();
                flash('Se actualizo de manera satisfactoria el registro de pago', 'success');
            }
            catch(\Exception $ex)
            {
                flash('Ocurrió un problema al intentar actualizar el registro de pago, error: '.$ex->getMessage(),'danger');
            }
        }
        else
        {
            flash('No se puede actualizar el pago de <b>'.$pagoVerificar[0]->empleado->em_nombre.' '.$pagoVerificar[0]->empleado->em_paterno.' '.$pagoVerificar[0]->empleado->em_materno.'</b>, ya que existe un pago habilitado del mes de <b>'.$pagoVerificar[0]->pag_mes.'/'.$pagoVerificar[0]->pag_gestion.'</b>','danger');
        }
        
        return redirect()->route('pagoBorder.index');
    }

    public function boletaPago($idPago)
    {
        $pago = Pago::find($idPago);                //todo el pago
        $idEmpleado = $pago->id_empleado;
        $empleado = Empleado::find($idEmpleado);    //todo sobre el empleado
        $asignar = Asignar::where('id_empleado',$idEmpleado)->lists('id_empresa');
        $idEmpresa = $asignar[0];                   //aqui verificar si un empleado fue asignado a una empresa
        $empresa = Empresa::find($idEmpresa);       //todo sobre la empresa
        $view = \View::make('sistema.pago.pagoborder.pagoReporte', compact('pago','empleado','empresa'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('Boleta'.$pago->pag_mes.'-'.str_replace(' ', '',($empleado->em_paterno.$empleado->em_nombre)).'.pdf');
    }

    public function rcIva($idSalarioMinimo, $totalGanado)
    {
        $salario = Salariominimo::where('id',$idSalarioMinimo)->get();
        return ((4 * $salario[0]->sm_salario) >= $totalGanado) ? '0.00' : (0.13*$totalGanado);
    }
}