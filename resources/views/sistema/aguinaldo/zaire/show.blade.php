@extends('template.layout')

@section('FormularioTitulo','Aguinaldo')
@section('FormularioDescripcion','detalle del Aguinaldo del empleado de la empresa Zaire LTDA.')
@section('FormularioActual','Aguinaldo')
@section('FormularioDetalle','Detalle del Aguinaldo')

@section('ContenidoPagina')
<div class="row">
    <div class="col-md-2">
        <div class="small-box bg-green">
            <div class="inner">
                <center>
                <h1>Moneda</h1>
                <br><br><br><br>
                </center>
            </div>
            <div class="icon">Bs</div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="small-box bg-yellow">
            <div class="inner">
                <center>
                <h3>{{ $aguinaldo->empleado->em_nombre.' '.$aguinaldo->empleado->em_paterno.' '.$aguinaldo->empleado->em_materno.' '.$aguinaldo->empleado->em_especial}}</h3>
                </center>
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-left">Meses Trabajados : <b>{{ $aguinaldo->agui_meses }}</b>
                        <br>Aguinaldo Gestión : <b>{{ $aguinaldo->agui_gestion }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <center>
                        <img src="{{ asset($aguinaldo->empleado->em_fotografia) }}" class="img-circle" width="70px" height="70px" />
                        </center>
                    </div>
                    @include('sistema.formatoFecha')
                    <div class="col-md-4">
                        <p class="text-right">Gestión : <b>{{ $aguinaldo->agui_gestion }}</b>
                        <br>Fecha de Ingreso: <b>{{ formatoFechaCorta($aguinaldo->empleado->em_fecha_ingeso) }}</b></p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <center><h2>Salario Ganado</h2></center>
                        <table width="100%" >
                            <tbody style="font-size:15px">
                                <tr>
                                    <td>Haber Básico</td><td>:</td><td align="right" width="65%"><b>{{ number_format($aguinaldo->agui_sueldo,2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Bono Antiguedad</td><td>:</td><td align="right"><b>{{ number_format($aguinaldo->agui_bono,2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Bono Producción</td><td>:</td><td align="right"><b>{{ $aguinaldo->agui_produccion.' Horas' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Subsidio Frontera</td><td>:</td><td align="right"><b>{{ number_format($aguinaldo->agui_subsidio,2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Labor Extraordinaria</td><td>:</td><td align="right"><b>{{ number_format($aguinaldo->aqui_extraordinario,2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Otros Bonos</td><td>:</td><td align="right"><b>{{ number_format($aguinaldo->agui_otrobono,2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr style="font-size:18px">
                                    <td><b>Total Ganado</b></td><td>:</td><td align="right"><b>{{ number_format($aguinaldo->agui_totalganado,2,'.',',').' Bs.'}}</b></td>
                                </tr>
                            </tbody>
                        </table>                         
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <center><h2>Descuentos</h2></center>
                        <table width="100%" >
                            <tbody style="font-size:15px">
                                <tr>
                                    <td>AFP's (12.71%)</td><td>:</td><td align="right" width="50%"><b>{{ number_format('0.00',2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Aporte Nacional Solidario</td><td>:</td><td align="right"><b>{{ number_format('0.00',2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>IVA (13.00%)</td><td>:</td><td align="right"><b>{{ number_format('0.00',2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Anticipos y Otros</td><td>:</td><td align="right"><b>{{ number_format('0.00',2,'.',',').' Bs.' }}</b></td>
                                </tr>
                                <tr><td>-</td><td></td><td></td></tr>
                                <tr><td>-</td><td></td><td></td></tr>
                                <tr style="font-size:18px">
                                    <td><b>Total Descuento</b></td><td>:</td><td align="right"><b>{{ number_format('0.00',2,'.',',').' Bs.' }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td align="left"><h3>Líquido Pagable : </h3></td>
                                    <td align="right"><h3>{{ number_format($aguinaldo->agui_totalliquido,2,'.',',').' Bs.' }}</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <span class="hint--top  hint--info" aria-label="Regresar al Pagina Anterior"><a  href="{{ route('aguinaldoZaire.index') }}" class="btn btn-primary"><i class="fa fa-reply-all""></i> Volver</a></span>
        </div>
    </div>
</div>
@endsection