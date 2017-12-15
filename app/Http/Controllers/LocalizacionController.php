<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Localizacion;

class LocalizacionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $localizacion = new Localizacion($request->all());
        $localizacion->save();
        $datos = Localizacion::where('loc_nombre', $localizacion->loc_nombre)->select('id','loc_nombre')->get();
        return json_encode($datos);
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
