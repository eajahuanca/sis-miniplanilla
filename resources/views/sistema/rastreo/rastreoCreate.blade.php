@extends('template.layout')

@section('FormularioTitulo','Rastreo de Contenedor')
@section('FormularioDescripcion','registrar nuevo rastreo de contenedor en el sistema')
@section('FormularioActual','Rastreo de Contenedor')
@section('FormularioDetalle','Nuevo Rastreo de Contenedor')

@section('stylesheet')
    <link href="{{ asset('plugin/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('archivos/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::open(['route' => 'rastreo.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        @include('sistema.rastreo.rastreoForm')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('rastreo.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('plugin/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
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
    <!-- Ckeditor load-->
    <script type="text/javascript">
        $(function() 
        {
            CKEDITOR.replace('editor1');
            $(".textarea").wysihtml5();
        });
    </script>
    <!-- /Ckeditor-->
    <script type="text/javascript">
        $(document).ready(function() {
            //datetimepicker
            $('.form_datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii',language:  'es'});
            
            //Para Adicionar un nuevo Movimiento
            $('#idMovimiento').click(function(e) {
                e.preventDefault();
                document.getElementById('mov_nombre').value = "";
                _modal = $('#myModalMovimiento');
                _modal.modal('show');
                $('#idbtnMovimiento').click(function(event) {
                    var _url  = $('#FormMovimiento').attr('action');
                    var _data = $('#FormMovimiento').serialize();
                    $.ajax({
                        url: _url,
                        type: 'POST',
                        data: _data,
                        success: function(response){
                            var datos = JSON.parse(response);                            
                            $('.id_movimiento').append($('<option>', {
                                value: datos[0].id,
                                text: datos[0].mov_nombre
                            }));
                            $('.id_movimiento').val(datos[0].id);
                            $('.id_movimiento').trigger("chosen:updated");
                            _modal.modal('hide');
                        }
                    }); 
                });
            });

            //Para Adicionar una nueva Localizacion
            $('#idLocalizacion').click(function(e) {
                e.preventDefault();
                document.getElementById('loc_nombre').value = "";
                _modal = $('#myModalLocalizacion');
                _modal.modal('show');
                $('#idbtnLocalizacion').click(function(event) {
                    var _url  = $('#FormLocalizacion').attr('action');
                    var _data = $('#FormLocalizacion').serialize();
                    $.ajax({
                        url: _url,
                        type: 'POST',
                        data: _data,
                        success: function(response){
                            var datos = JSON.parse(response);                            
                            $('.id_localizacion').append($('<option>', {
                                value: datos[0].id,
                                text: datos[0].loc_nombre
                            }));
                            $('.id_localizacion').val(datos[0].id);
                            $('.id_localizacion').trigger("chosen:updated");
                            _modal.modal('hide');
                        }
                    }); 
                });
            });

            //Para Adicionar un nuevo Barco
            $('#idBarco').click(function(e) {
                e.preventDefault();
                document.getElementById('bar_nombre').value = "";
                _modal = $('#myModalBarco');
                _modal.modal('show');
                $('#idbtnBarco').click(function(event) {
                    var _url  = $('#FormBarco').attr('action');
                    var _data = $('#FormBarco').serialize();
                    $.ajax({
                        url: _url,
                        type: 'POST',
                        data: _data,
                        success: function(response){
                            var datos = JSON.parse(response);                            
                            $('.id_barco').append($('<option>', {
                                value: datos[0].id,
                                text: datos[0].bar_nombre
                            }));
                            $('.id_barco').val(datos[0].id);
                            $('.id_barco').trigger("chosen:updated");
                            _modal.modal('hide');
                        }
                    }); 
                });
            });
        });
    </script>

    <!--Form Modal for Movimiento-->
    <div class="modal fade" id="myModalMovimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                {!! Form::open(['route' => 'movimiento.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'FormMovimiento']) !!}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Registrar nuevo Movimiento</h4>
                </div>
                <div class="modal-body">    
                    {!! Form::label('mov_nombre', 'Nombre del nuevo movimiento', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list"></i>
                            </div>
                            {!! Form::text('mov_nombre', null, ['class' => 'form-control', 'required' => true]) !!} 
                        </div>
                    </div>    
                </div>
                <br><br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="idbtnMovimiento">Guardar</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!--Form Modal for Localizacion-->
    <div class="modal fade" id="myModalLocalizacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                {!! Form::open(['route' => 'localizacion.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'FormLocalizacion']) !!}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Registrar nueva Localización</h4>
                </div>
                <div class="modal-body">    
                    {!! Form::label('loc_nombre', 'Nombre de la nueva Localización', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list"></i>
                            </div>
                            {!! Form::text('loc_nombre', null, ['class' => 'form-control', 'required' => true]) !!} 
                        </div>
                    </div>    
                </div>
                <br><br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="idbtnLocalizacion">Guardar</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!--Form Modal for Barco-->
    <div class="modal fade" id="myModalBarco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                {!! Form::open(['route' => 'barco.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'FormBarco']) !!}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Registrar nuevo Barco</h4>
                </div>
                <div class="modal-body">    
                    {!! Form::label('bar_nombre', 'Nombre del nuevo barco', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list"></i>
                            </div>
                            {!! Form::text('bar_nombre', null, ['class' => 'form-control', 'required' => true]) !!} 
                        </div>
                    </div>    
                </div>
                <br><br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="idbtnBarco">Guardar</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection