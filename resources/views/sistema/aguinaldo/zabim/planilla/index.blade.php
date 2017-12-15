@extends('template.layout')

@section('FormularioTitulo','Planilla de Aguinaldo Zabim SRL')
@section('FormularioDescripcion','Obtener la Planilla de Aguinaldos de la empresa respectiva')
@section('FormularioActual','Planilla')
@section('FormularioDetalle','Obtener Planilla de Aguinaldo')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
	{!! Form::open(['route' => 'paZabim.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-md-3"></div>
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
            <div class="form-group {{ $errors->has('agui_gestion')?' has-error':'' }}">
                {!! Form::label('agui_gestion', 'Gestión del Aguinaldo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::select('agui_gestion', ['2017' => 'Gestión 2017', '2018' => 'Gestión 2018', '2019' => 'Gestión 2019', '2020' => 'Gestión 2020', '2021' => 'Gestión 2021', '2022' => 'Gestión 2022', '2023' => 'Gestión 2023', '2024' => 'Gestión 2024', '2025' => 'Gestión 2025'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
      
	</div>
	<div class="form-group">
        <center>
            <span class="hint--top  hint--info" aria-label="Obtener Planilla solicitada"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Obtener Planilla de Aguinaldo Zabim SRL</button></span>
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