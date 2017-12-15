@extends('template.layout')

@section('FormularioTitulo','Empresa')
@section('FormularioDescripcion','Actualizar datos de la empresa en el sistema, para poder asignar a un personal')
@section('FormularioActual','Empresa')
@section('FormularioDetalle','Actualizar Empresa')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::model($empresa,['route' => ['empresa.update',$empresa->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('emp_nombre')?' has-error':'' }}">
                    {!! Form::label('emp_nombre', 'Nombre de la empresa', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list"></i>
                            </div>
                            {!! Form::text('emp_nombre', null, ['placeholder' => 'Ej. ZAHUA LTDA.', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('emp_nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('emp_nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('emp_nit')?' has-error':'' }}">
                    {!! Form::label('emp_nit', 'Nro. de Identificación Tributaria - NIT', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bars"></i>
                            </div>
                            {!! Form::text('emp_nit', null, ['class' => 'form-control', 'placeholder' => 'Ej. 10083983993']) !!}
                        </div>
                        @if($errors->has('emp_nit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('emp_nit') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('emp_empleador')?' has-error':'' }}">
                    {!! Form::label('emp_empleador', 'Nro. del Empleador del Ministerio de Trabajo', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bars"></i>
                            </div>
                            {!! Form::text('emp_empleador', null, ['class' => 'form-control', 'placeholder' => 'Ej. 1000636378']) !!}
                        </div>
                        @if($errors->has('emp_empleador'))
                            <span class="help-block">
                                <strong>{{ $errors->first('emp_empleador') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('emp_caja')?' has-error':'' }}">
                    {!! Form::label('emp_caja', 'Nro. de Empleador de la Caja Nacional de Salud', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bars"></i>
                            </div>
                            {!! Form::text('emp_caja', null, ['class' => 'form-control', 'placeholder' => 'Ej. 1000-63637-823']) !!}
                        </div>
                        @if($errors->has('emp_caja'))
                            <span class="help-block">
                                <strong>{{ $errors->first('emp_caja') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('id_representante')?' has-error':'' }}">
                    {!! Form::label('id_representante', 'Representante Legal de la Empresa', ['class' => 'col-md-12']) !!}
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            {!! Form::select('id_representante', $empleado, null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('emp_estado')?' has-error':'' }}">
                    {!! Form::label('emp_estado', 'Estado de la Empresa', ['class' => 'col-md-12']) !!}
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock"></i>
                            </div>
                            {!! Form::select('emp_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Actualizar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la Actualización"><a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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