<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CargoRequest;
use Carbon\Carbon;
use App\Cargo;

class CargoController extends Controller
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
        $cargo = Cargo::orderBy('created_at', 'DESC')->get();
        return view('sistema.cargo.cargoIndex')->with('cargo', $cargo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.cargo.cargoCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoRequest $request)
    {
        try
        {
            $cargo = new Cargo($request->all());
            $cargo->save();
            flash('Se guardó de manera satisfactoria el cargo, con nombre: <b>'. $cargo->car_nombre.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar el cargo en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('cargo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo = Cargo::find($id);
        return view('sistema.cargo.cargoShow')->with('cargo', $cargo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('sistema.cargo.cargoEdit')->with('cargo', $cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoRequest $request, $id)
    {
        try
        {
            $cargo = Cargo::find($id);
            $cargo->fill($request->all());
            $cargo->update();
            flash('Se actualizo de manera satisfactoria el cargo: <b>'.$cargo->car_nombre.'</b>', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar el cargo, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('cargo.index');
    }
}
