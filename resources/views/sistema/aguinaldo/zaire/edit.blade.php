@extends('template.layout')

@section('FormularioTitulo','Aguinaldo')
@section('FormularioDescripcion','Actualizar datos de Aguinaldo de la Empresa Zaire LTDA.')
@section('FormularioActual','Aguinaldo ')
@section('FormularioDetalle','Actualizar Aguinaldo Correspondiente')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::model($aguinaldo,['route' => ['aguinaldoZaire.update',$aguinaldo->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        
        @include('sistema.aguinaldo.zaire.form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Actualizar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la Actualización"><a href="{{ route('aguinaldoZaire.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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