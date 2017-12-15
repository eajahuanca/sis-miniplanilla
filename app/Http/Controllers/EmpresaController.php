<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmpresaRequest;

use DB;
use Carbon\Carbon;
use App\Empresa;
use App\Empleado;

class EmpresaController extends Controller
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
        $empresa = Empresa::orderBy('updated_at', 'DESC')->get();
        return view('sistema.empresa.empresaIndex')->with('empresa', $empresa);
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
        return view('sistema.empresa.empresaCreate')->with('empleado', $empleado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        try
        {
            $empresa = new Empresa($request->all());
            $empresa->save();
            flash('Se guardó de manera satisfactoria la empresa, con nombre: <b>'. $empresa->emp_nombre.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar la empresa en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view('sistema.empresa.empresaShow')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $empleado = Empleado::select(DB::raw('CONCAT(em_paterno," ",em_materno," ",em_especial,", ",em_nombre) AS nombre_completo'),'id')
                                ->where('em_estado',1)
                                ->orderBy('em_paterno','DESC')
                                ->lists('nombre_completo','id');
        return view('sistema.empresa.empresaEdit')->with('empresa', $empresa)->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        try
        {
            $empresa = Empresa::find($id);
            $empresa->fill($request->all());
            $empresa->update();
            flash('Se actualizo de manera satisfactoria la empresa: <b>'.$empresa->emp_nombre.'</b>', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar la empresa, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empresa.index');
    }

    public function changeImage($id)
    {
        $empresa = Empresa::find($id);
        return view('sistema.empresa.empresaChangeImage')->with('empresa',$empresa);
    }

    public function updateImage(Request $request, $id)
    {
        try
        {
            $empresa = Empresa::find($id);
            $empresa->fill($request->all());
            $empresa->update();
            flash('Se actualizó de manera satisfactoria el logo de la empresa, con nombre: <b>'. $empresa->emp_nombre.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar el logo de la empresa en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empresa.index');
    }
}