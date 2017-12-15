<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movimiento;

class MovimientoController extends Controller
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
        $movimiento = new Movimiento($request->all());
        $movimiento->save();
        $datos = Movimiento::where('mov_nombre', $movimiento->mov_nombre)->select('id','mov_nombre')->get();
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
