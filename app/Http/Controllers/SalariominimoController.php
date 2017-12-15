<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Salariominimo;
use Carbon\Carbon;

class SalariominimoController extends Controller
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
        $salario = Salariominimo::orderBy('created_at', 'DESC')->get();
        return view('sistema.salario.salarioIndex')->with('salario', $salario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.salario.salarioCreate');
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
            $salario = new Salariominimo($request->all());
            $salario->save();
            flash('Se guardó de manera satisfactoria el nuevo salario minimo, de <b>'. $salario->sm_salario.' Bs.</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar el nuevo salario, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('salario.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salario = Salariominimo::find($id);
        return view('sistema.salario.salarioEdit')->with('salario', $salario);
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
            $salario = Salariominimo::find($id);
            $salario->fill($request->all());
            $salario->update();
            flash('Se actualizo de manera satisfactoria el salario minimo: <b>'.$salario->sm_salario.' Bs.</b>', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar el salario, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('salario.index');
    }
}
