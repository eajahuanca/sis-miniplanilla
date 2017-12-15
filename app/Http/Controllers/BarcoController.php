<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Barco;

class BarcoController extends Controller
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
        $barco = new Barco($request->all());
        $barco->save();
        $datos = Barco::where('bar_nombre', $barco->bar_nombre)->select('id','bar_nombre')->get();
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
