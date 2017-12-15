<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmpleadoRequest;

use Carbon\Carbon;
use App\Empleado;
use App\Cargo;
use App\Area;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('es');
    }
    public function index()
    {
        $empleado = Empleado::orderBy('updated_at','DESC')->get();
        return view('sistema.empleado.empleadoIndex')->with('empleado',$empleado);
    }

    public function create()
    {
        $cargo = Cargo::where('car_estado',1)->orderBy('car_nombre', 'ASC')->lists('car_nombre','id');
        $area = Area::where('ar_estado',1)->orderBy('ar_nombre', 'ASC')->lists('ar_nombre','id');
        return view('sistema.empleado.empleadoCreate')->with('cargo', $cargo)->with('area', $area);
    }

    public function store(EmpleadoRequest $request)
    {
        try
        {
            $empleado = new Empleado($request->all());
            $empleado->save();
            flash('Se guardó de manera satisfactoria los datos del empleado, con nombre: <b>'. $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar guardar los datos del empleado en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empleado.index');
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('sistema.empleado.empleadoShow')->with('empleado', $empleado);
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $cargo = Cargo::where('car_estado',1)->orderBy('car_nombre', 'ASC')->lists('car_nombre','id');
        $area = Area::where('ar_estado',1)->orderBy('ar_nombre', 'ASC')->lists('ar_nombre','id');
        return view('sistema.empleado.empleadoEdit')->with('cargo', $cargo)->with('area', $area)->with('empleado',$empleado);
    }

    public function update(EmpleadoRequest $request, $id)
    {
        try
        {
            $empleado = Empleado::find($id);
            $empleado->fill($request->all());
            $empleado->update();
            flash('Se actualizó de manera satisfactoria los datos del empleado, con nombre: <b>'. $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar los datos del empleado en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empleado.index');
    }

    public function sueldo($id)
    {
        $empleado = Empleado::find($id);
        return $empleado->em_sueldo_basico;
    }

    public function changeImage($id)
    {
        $empleado = Empleado::find($id);
        return view('sistema.empleado.empleadoChangeImage')->with('empleado',$empleado);
    }

    public function updateImage(Request $request, $id)
    {
        try
        {
            $empleado = Empleado::find($id);
            $empleado->fill($request->all());
            $empleado->update();
            flash('Se actualizó de manera satisfactoria la fotografia del empleado, con nombre: <b>'. $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar la fotografia del  empleado en el sistema, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('empleado.index');
    }
}