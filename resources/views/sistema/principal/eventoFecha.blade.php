@extends('template.layout')

@section('FormularioTitulo','Actividades')
@section('FormularioDescripcion','Obtener reporte de actividades por rango de fechas')
@section('FormularioActual','Actividades')
@section('FormularioDetalle','Reporte de Actividades')

@section('stylesheet')
    <link href="{{ asset('plugin/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
	{!! Form::open(['url' => 'pdfActivity', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-md-1"></div>
		<div class="col-md-3">
            <div class="form-group {{ $errors->has('fecha_inicial')?' has-error':'' }}">
                {!! Form::label('fecha_inicial', 'Fecha Inicial', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('fecha_inicial', null, ['class' => 'form-control form_datetime', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{ $errors->has('fecha_final')?' has-error':'' }}">
                {!! Form::label('fecha_final', 'Fecha Final', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('fecha_final', null, ['class' => 'form-control form_datetime', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group {{ $errors->has('estado')?' has-error':'' }}">
                {!! Form::label('estado', 'Estado de la Actividad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        {!! Form::select('estado', [true => 'Actividad habilitada', false => 'Actividad Inhabilitada'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
	</div>
	<div class="form-group">
        <center>
            <span class="hint--top  hint--info" aria-label="Obtener Reporte de Actividades"><button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Reporte de Actividades</button></span>
        </center>
    </div>
	{!! Form::close() !!}

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            //datetimepicker
            $('.form_datetime').datepicker({format: 'yyyy-mm-dd',language:  'es'});
        });
    </script>
@endsection