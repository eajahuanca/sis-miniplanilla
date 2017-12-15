<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tipoevento;

class TipoeventoController extends Controller
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
        $tipoevento = new Tipoevento($request->all());
        $tipoevento->save();
        $datos = Tipoevento::where('te_nombre', $tipoevento->te_nombre)->select('id','te_nombre')->get();
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
