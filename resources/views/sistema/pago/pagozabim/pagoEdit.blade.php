@extends('template.layout')

@section('FormularioTitulo','Pago')
@section('FormularioDescripcion','Actualizar datos de Pago de la Empresa ZABIM SRL.')
@section('FormularioActual','Pago ')
@section('FormularioDetalle','Actualizar Pago Correspondiente')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::model($pago,['route' => ['pagoZabim.update',$pago->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        
        @include('sistema.pago.pagozabim.pagoForm')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Actualizar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la Actualización"><a href="{{ route('pagoZabim.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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
    <script type="text/javascript">
        function ponerCeros()
        {
            document.getElementById('pag_cantidad').value = '0.00';
            document.getElementById('pag_pagado').value = '0.00';
            document.getElementById('pag_produccion').value = '0.00';
            document.getElementById('pag_dominical').value = '0.00';
            document.getElementById('pag_otrobono').value = '0.00';
            document.getElementById('pag_aporte').value = '0.00';
            document.getElementById('pag_anticipos').value = '0.00';
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(event) {
            $('#obtenerSueldo').change(function(e) {
                var idEmpleado = e.target.options[e.target.selectedIndex].value
                $.ajax({
                    url:"{{ url('sueldo') }}" + "/" + idEmpleado,
                    success: function(miSueldo){
                        document.getElementById('mostrarSueldo').value = miSueldo;
                        document.getElementById('pag_dias').value = '30';
                    }
                });
            });
        });
    </script>
@endsection