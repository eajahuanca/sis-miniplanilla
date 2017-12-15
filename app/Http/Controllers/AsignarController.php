<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use App\Empresa;
use App\Empleado;
use App\Asignar;

class AsignarController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignar = Asignar::orderBy('updated_at', 'DESC')->get();
        return view('sistema.asignar.asignarIndex')->with('asignar', $asignar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = Empleado::select(DB::raw('CONCAT(em_paterno," ",em_materno," ",em_especial,", ",em_nombre) AS nombre_completo'),'id')
                                ->where('em_estado',1)
                                ->orderBy('em_paterno','DESC')
                                ->lists('nombre_completo','id');
        $empresa = Empresa::where('emp_estado',1)->orderBy('emp_nombre', 'ASC')->lists('emp_nombre','id');
        return view('sistema.asignar.asignarCreate')->with('empleado',$empleado)->with('empresa', $empresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $asignar = new Asignar($request->all());
            $asignar->save();
            flash('Se guardó de manera satisfactoria la Asignacion de Empresa con el Empleado','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar la asignacion en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('asignar.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignar = Asignar::find($id);
        $empleado = Empleado::select(DB::raw('CONCAT(em_paterno," ",em_materno," ",em_especial,", ",em_nombre) AS nombre_completo'),'id')
                                ->where('em_estado',1)
                                ->orderBy('em_paterno','DESC')
                                ->lists('nombre_completo','id');
        $empresa = Empresa::where('emp_estado',1)->orderBy('emp_nombre', 'ASC')->lists('emp_nombre','id');
        return view('sistema.asignar.asignarEdit')->with('asignar', $asignar)->with('empleado',$empleado)->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $asignar = Asignar::find($id);
            $asignar->fill($request->all());
            $asignar->update();
            flash('Se actualizo de manera satisfactoria la asignacion', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar la asignacion, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('asignar.index');
    }
}