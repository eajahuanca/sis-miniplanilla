@extends('template.layout')

@section('FormularioTitulo','Planilla Bolivian Border Shop SRL')
@section('FormularioDescripcion','Obtener la Planilla de pagos de la empresa respectiva')
@section('FormularioActual','Planilla')
@section('FormularioDetalle','Obtener Planilla')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
	{!! Form::open(['route' => 'planillaBorder.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-md-1"></div>
		<div class="col-md-3">
            <div class="form-group {{ $errors->has('tipo_empleado')?' has-error':'' }}">
                {!! Form::label('tipo_empleado', 'Tipo de Empleado', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-list-alt"></i>
                        </div>
                        {!! Form::select('tipo_empleado', ['PERMANENTE' => 'Personal Permanente', 'EVENTUAL' => 'Personal Eventual'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{ $errors->has('pag_mes')?' has-error':'' }}">
                {!! Form::label('pag_mes', 'Mes del Sueldo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::select('pag_mes', ['Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group {{ $errors->has('gestion')?' has-error':'' }}">
                {!! Form::label('gestion', 'Gestión', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::select('gestion', ['2017' => 'Gestion 2017', '2018' => 'Gestion 2018', '2019' => 'Gestion 2019', '2020' => 'Gestion 2020'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group {{ $errors->has('tipo_archivo')?' has-error':'' }}">
                {!! Form::label('tipo_archivo', 'Exportar a', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </div>
                        {!! Form::select('tipo_archivo', ['pdf' => 'Archivo PDF', 'excel' => 'Archivo EXCEL'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>    
        </div>
        <div class="col-md-1"></div>
	</div>
	<div class="form-group">
        <center>
            <span class="hint--top  hint--info" aria-label="Obtener Planilla solicitada"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Obtener Planilla de BBS SRL</button></span>
        </center>
    </div>
	{!! Form::close() !!}

@endsection

@section('javascript')
    <script src="{{ asset('archivos/chosen/chosen.jquery.min.js') }}"></script>
    <!-- chosen load-->
    <script type="text/javascript">
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, Sin Resultados!'},
            '.chosen-select-width'     : {width:"100%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
    <!-- /chosen -->
@endsection