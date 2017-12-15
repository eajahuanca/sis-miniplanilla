<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Http\Requests;
use App\Http\Requests\EventoRequest;
use App\Evento;
use App\Tipoevento;
use App\User;
use PDF;
use Carbon\Carbon;

class PrincipalController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        if(Auth::user()->usuario_tipo == 'Admin' || Auth::user()->usuario_tipo == 'Admincontrol')
        {
            $eventos = Evento::where('estado',1)->orderBy('fecha','DESC')->get();
            return view('sistema.principal.index')->with('eventos', $eventos);   
        }
        else
        {
            $eventos = Evento::where('id_usuario',Auth::user()->id)->where('estado',1)->orderBy('fecha','DESC')->get();
            return view('sistema.principal.index')->with('eventos', $eventos);
        }
    }

    public function listEvent()
    {
        $eventos = Evento::where('id_usuario',Auth::user()->id)->orderBy('fecha','DESC')->get();
        return view('sistema.principal.eventoList')->with('eventos', $eventos);
    }

    public function create()
    {
        $tipoevento = Tipoevento::orderBy('created_at','ASC')->lists('te_nombre','id');
        return view('sistema.principal.eventoCreate')->with('tipoevento', $tipoevento);
    }

    public function store(EventoRequest $request)
    {
        try 
        {
            $evento = new Evento($request->all());
            $evento->id_usuario = Auth::user()->id;
            $evento->id_userregistra = Auth::user()->id;
            $evento->id_useractualiza = Auth::user()->id;
            $evento->save();
            flash('Se guardó de manera satisfactoria la Actividad : <b>'.$evento->lugar.' - '.$evento->descripcion.'</b>','success');
        } 
        catch (\Exception $ex) 
        {
            flash('Ocurrio un problema al intentar guardar la actividad, error: '.$ex->getMessage(),'danger');
        }

        return redirect()->route('principal.create');
    }

    public function show($id)
    {

        $evento = Evento::where('id', $id)->get();
        return view('sistema.principal.detalle')->with('evento', $evento);
    }

    public function edit($id)
    {
        $evento = Evento::find($id);
        $tipoevento = Tipoevento::orderBy('created_at','ASC')->lists('te_nombre','id');
        return view('sistema.principal.eventoEdit')->with('tipoevento', $tipoevento)->with('evento', $evento);
    }

    public function update(EventoRequest $request, $id)
    {
        try
        {
            $evento = Evento::find($id);
            $evento->fill($request->all());
            $evento->id_useractualiza = Auth::user()->id;
            $evento->update();
            flash('Se actualizo de manera satisfactoria la actividad: <b>'.$evento->lugar.' - '.$evento->descripcion.'</b>', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar la actividad, error: '.$ex->getMessage(),'danger');
        }
        return back();
    }

    public function pdfActivity(Request $request)
    {
        $fechaInicial = trim($request->input('fecha_inicial'));
        $fechaFinal = trim($request->input('fecha_final'));
        $estado = trim($request->input('estado'));

        if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontrol' || Auth::user()->usuario_tipo=='Adminventas')
        {
            $eventos = Evento::whereDate('fecha','>=', $fechaInicial)
                        ->whereDate('fecha','<=', $fechaFinal)
                        ->where('estado', $estado)
                        ->orderBy('fecha','ASC')
                        ->get();
        }
        else
        {
            $eventos = Evento::whereDate('fecha','>=', $fechaInicial)
                        ->whereDate('fecha','<=', $fechaFinal)
                        ->where('estado', $estado)
                        ->where('id_usuario', Auth::user()->id)
                        ->orderBy('fecha','ASC')
                        ->get();
        }
        $fechaImpresion = 'El Alto, '.date('d').' de '.$this->fecha().' de '.date('Y');

        $view = \View::make('sistema.principal.eventoReport', compact('fechaInicial','fechaFinal','fechaImpresion','eventos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('Letter','portrait');
        $pdf->loadHTML($view);
        return $pdf->download('ReporteActividades'.date('d-m-Y').'_'.date('H-i-s').'.pdf');
    }

    public function fecha()
    {
        $arrayMes = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        return $arrayMes[(int)(date('m')) - 1];
    }

    public function showReport()
    {
        return view('sistema.principal.eventoFecha');
    }
}
