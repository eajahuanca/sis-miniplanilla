@extends('template.layout')

@section('FormularioTitulo','Aguinaldo de la empresa Zabim SRL.')
@section('FormularioDescripcion','registrar nuevo aguinaldo en el sistema')
@section('FormularioActual','Aguinaldos')
@section('FormularioDetalle','Registrar Aguinaldo')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::open(['route' => 'aguinaldoZabim.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true, 'name' => 'frmpago']) !!}
        @include('sistema.aguinaldo.zabim.Form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Aguinaldo</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('aguinaldoZabim.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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