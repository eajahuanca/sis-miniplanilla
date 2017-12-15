<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Carbon\Carbon;
use App\Movimiento;
use App\Localizacion;
use App\Barco;
use App\Rastreo;

class RastreoController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $rastreo = Rastreo::orderBy('created_at','DESC')->get();
        return view('sistema.rastreo.index')->with('rastreo',$rastreo);
    }

    public function create()
    {
        $movimiento     = Movimiento::orderBy('created_at','ASC')->lists('mov_nombre','id');
        $localizacion   = Localizacion::orderBy('created_at','ASC')->lists('loc_nombre','id');
        $barco          = Barco::orderBy('created_at','ASC')->lists('bar_nombre','id');
        return view('sistema.rastreo.rastreoCreate')
                    ->with('movimiento', $movimiento)
                    ->with('localizacion', $localizacion)
                    ->with('barco', $barco);
    }

    public function store(Request $request)
    {
        try 
        {
            $rastreo = new Rastreo($request->all());
            $movimiento = Movimiento::find($rastreo->id_movimiento);
            $localizacion = Localizacion::find($rastreo->id_localizacion);
            $barco = Barco::find($rastreo->id_barco);

            $rastreo->res_movimiento = $movimiento->mov_nombre;
            $rastreo->res_localizacion = $localizacion->loc_nombre;
            $rastreo->res_barco = $barco->bar_nombre;

            $rastreo->user_registra = Auth::user()->id;
            $rastreo->user_actualiza = Auth::user()->id;
            $rastreo->save();
            flash('se ha guardado de manera satisfactoria los datos del rastreo de contenedor con sigla: <b>'.$rastreo->res_sigla.'</b>','success');
        } 
        catch (\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar los datos del rastreo en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('rastreo.create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
