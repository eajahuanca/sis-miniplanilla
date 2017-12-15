@extends('template.layout')

@section('FormularioTitulo','Actividades')
@section('FormularioDescripcion','registrar nueva actividad en el sistema')
@section('FormularioActual','Actividades')
@section('FormularioDetalle','Registrar Actividad')

@section('stylesheet')
    <link href="{{ asset('plugin/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('plugin/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::open(['route' => 'principal.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('sistema.principal.eventoForm')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('principal.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('plugin/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
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
            $('#idTipoEvento').click(function(e) {
                e.preventDefault();
                document.getElementById('te_nombre').value = "";
                document.getElementById('te_color').value = "";
                _modal = $('#myModalTipoActividad');
                _modal.modal('show');
                $('#idbtnTipoEvento').click(function(event) {
                    var _url  = $('#FormTipoevento').attr('action');
                    var _data = $('#FormTipoevento').serialize();
                    $.ajax({
                        url: _url,
                        type: 'POST',
                        data: _data,
                        success: function(response){
                            var datos = JSON.parse(response);                            
                            $('.id_tipoevento').append($('<option>', {
                                value: datos[0].id,
                                text: datos[0].te_nombre
                            }));
                            $('.id_tipoevento').val(datos[0].id);
                            $('.id_tipoevento').trigger("chosen:updated");
                            _modal.modal('hide');
                        }
                    }); 
                });
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker();

            //datetimepicker
            $('.form_datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii',language:  'es'});
        });
    </script>
    <!--Form Modal for Tipo de Actividad-->
    <div class="modal fade" id="myModalTipoActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                {!! Form::open(['route' => 'tipoevento.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'FormTipoevento']) !!}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Registrar nuevo tipo de actividad</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::label('te_nombre', 'Tipo de Actividad', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                {!! Form::text('te_nombre', null, ['class' => 'form-control', 'required' => true]) !!} 
                            </div>
                        </div>
                        {!! Form::label('te_color', 'Color de la Actividad', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-paint-brush"></i>
                                </div>
                                {!! Form::text('te_color', null, ['class' => 'form-control my-colorpicker1', 'required' => true]) !!} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="idbtnTipoEvento">Guardar</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection