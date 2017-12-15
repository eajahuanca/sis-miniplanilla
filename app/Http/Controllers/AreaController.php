<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AreaRequest;
use App\Area;
use Carbon\Carbon;

class AreaController extends Controller
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
        $area = Area::orderBy('created_at', 'DESC')->get();
        return view('sistema.area.areaIndex')->with('area',$area);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.area.areaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        try
        {
            $area = new Area($request->all());
            $area->save();
            flash('Se guardó de manera satisfactoria el area, con nombre: <b>'. $area->ar_nombre.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar el area en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('area.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);
        return view('sistema.area.areaShow')->with('area',$area);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('sistema.area.areaEdit')->with('area',$area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        try
        {
            $area = Area::find($id);
            $area->fill($request->all());
            $area->update();
            flash('Se actualizo de manera satisfactoria el area: <b>'.$area->ar_nombre.'</b>', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar el area, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('area.index');
    }
}
