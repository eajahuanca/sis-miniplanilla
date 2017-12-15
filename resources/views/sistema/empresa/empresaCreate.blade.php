@extends('template.layout')

@section('FormularioTitulo','Empresa')
@section('FormularioDescripcion','registrar nueva empresa en el sistema, para poder asignar a un personal')
@section('FormularioActual','Empresas')
@section('FormularioDetalle','Registrar Empresa')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::open(['route' => 'empresa.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('sistema.empresa.empresaForm')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    <script src="{{ asset('archivos/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('archivos/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('archivos/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
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