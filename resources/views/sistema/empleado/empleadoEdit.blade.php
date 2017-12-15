@extends('template.layout')

@section('FormularioTitulo','Empleado')
@section('FormularioDescripcion','Actualizar datos del empleado en el sistema, para poder asignar a un personal')
@section('FormularioActual','Empleado')
@section('FormularioDetalle','Actualizar Empleado')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('archivos/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    {!! Form::model($empleado,['route' => ['empleado.update',$empleado->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
        
        <div class="row">
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Generales del Empleado</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('em_nombre')?' has-error':'' }}">
                            {!! Form::label('em_nombre', 'Nombre del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    {!! Form::text('em_nombre', null, ['placeholder' => 'Ej. Juan Carlos', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_paterno')?' has-error':'' }}">
                            {!! Form::label('em_paterno', 'Apellido Paterno del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    {!! Form::text('em_paterno', null, ['placeholder' => 'Ej. Salcer', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_materno')?' has-error':'' }}">
                            {!! Form::label('em_materno', 'Apellido Materno del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    {!! Form::text('em_materno', null, ['placeholder' => 'Ej. Calcina', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_especial')?' has-error':'' }}">
                            {!! Form::label('em_especial', 'Apellido Especial del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    {!! Form::text('em_especial', null, ['placeholder' => 'Ej. de Marquez', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_especial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_especial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_cedula')?' has-error':'' }}">
                            {!! Form::label('em_cedula', 'Carnet de Identidad del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    {!! Form::text('em_cedula', null, ['class' => 'form-control']) !!}
                                </div>
                                @if($errors->has('em_cedula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('em_cedula') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_expedido')?' has-error':'' }}">
                            {!! Form::label('em_expedido', 'Expedido del Carnet de Identidad', ['class' => 'col-md-12']) !!}
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    {!! Form::select('em_expedido', ['LP' => 'LP', 'OR' => 'OR', 'PT' => 'PT', 'CH' => 'CH', 'BN' => 'BN', 'PA' => 'PA', 'SC' => 'SC', 'TJ' => 'TJ', 'CBBA' => 'CBBA'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_nacimiento')?' has-error':'' }}">
                            {!! Form::label('em_nacimiento', 'Fecha de Nacimiento del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::text('em_nacimiento', null, ['class' => 'form-control']) !!}
                                </div>
                                @if($errors->has('em_nacimiento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('em_nacimiento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_genero')?' has-error':'' }}">
                            {!! Form::label('em_genero', 'Género', ['class' => 'col-md-12']) !!}
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::select('em_genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_nacionalidad')?' has-error':'' }}">
                            {!! Form::label('em_nacionalidad', 'Nacionalidad del Empleado', ['class' => 'col-md-12']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    {!! Form::select('em_nacionalidad', [
                                                    'Boliviana' => 'Boliviana', 
                                                    'Peruana' => 'Peruana',
                                                    'Chilena' => 'Chilena',
                                                    'Argentina' => 'Argentina',
                                                    'Paraguaya' => 'Paraguaya',
                                                    'Uruguaya' => 'Uruguaya',
                                                    'Brasileña' => 'Brasileña',
                                                    'Panameña' => 'Panameña'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dirección del Empleado</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('em_departamento')?' has-error':'' }}">
                            {!! Form::label('em_departamento', 'Departamento', ['class' => 'col-md-12']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    {!! Form::select('em_departamento', ['La Paz' => 'La Paz',
                                                                         'Oruro' => 'Oruro',
                                                                         'Potosi' => 'Potosi',
                                                                         'Chuquisaca' => 'Chuquisaca',
                                                                         'Beni' => 'Beni',
                                                                         'Pando' => 'Pando',
                                                                         'Santa Cruz' => 'Santa Cruz',
                                                                         'Tarija' => 'Tarija',
                                                                         'Cochabamba' => 'Cochabamba'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_ciudad')?' has-error':'' }}">
                            {!! Form::label('em_ciudad', 'Ciudad', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    {!! Form::text('em_ciudad', null, ['placeholder' => 'Ej. El Alto', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_zona')?' has-error':'' }}">
                            {!! Form::label('em_zona', 'Zona', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    {!! Form::text('em_zona', null, ['placeholder' => 'Ej. 1ro. de Mayo', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_zona'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_zona') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_calle')?' has-error':'' }}">
                            {!! Form::label('em_calle', 'Avenidad/Calle', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    {!! Form::text('em_calle', null, ['placeholder' => 'Ej. Las Retamas', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_calle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_calle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_numero')?' has-error':'' }}">
                            {!! Form::label('em_numero', 'Número de la Puerta', ['class' => 'col-md-12']) !!}
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    {!! Form::text('em_numero', null, ['placeholder' => 'Ej. 1867', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_telefono')?' has-error':'' }}">
                            {!! Form::label('em_telefono', 'Número Telefónico', ['class' => 'col-md-12']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::text('em_telefono', null, ['placeholder' => 'Ej. 2826270', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('em_celular')?' has-error':'' }}">
                            {!! Form::label('em_celular', 'Número de Celular', ['class' => 'col-md-12']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::text('em_celular', null, ['placeholder' => 'Ej. 67003456', 'class' => 'form-control']) !!} 
                                </div>
                                @if($errors->has('em_celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('em_celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Otros datos del Empleado</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('em_fecha_ingeso')?' has-error':'' }}">
                                    {!! Form::label('em_fecha_ingeso', 'Fecha de Ingreso', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {!! Form::text('em_fecha_ingeso', null, ['class' => 'form-control']) !!} 
                                        </div>
                                        @if($errors->has('em_fecha_ingeso'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('em_fecha_ingeso') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group {{ $errors->has('id_cargo')?' has-error':'' }}">
                                    {!! Form::label('id_cargo', 'Cargo del Empleado', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-list"></i>
                                            </div>
                                            {!! Form::select('id_cargo', $cargo, null, ['class' => 'form-control chosen-select-deselect']) !!} 
                                        </div>
                                    </div>
                                </div>                                 
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('em_sueldo_basico')?' has-error':'' }}">
                                    {!! Form::label('em_sueldo_basico', 'Sueldo Básico (Bs.)', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            {!! Form::text('em_sueldo_basico', null, ['placeholder' => 'Ej. 2800.00', 'class' => 'form-control']) !!} 
                                        </div>
                                        @if($errors->has('em_sueldo_basico'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('em_sueldo_basico') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> 

                                <div class="form-group {{ $errors->has('id_area')?' has-error':'' }}">
                                    {!! Form::label('id_area', 'Area del Empleado', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-list"></i>
                                            </div>
                                            {!! Form::select('id_area', $area, null, ['class' => 'form-control chosen-select-deselect']) !!} 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('em_bono')?' has-error':'' }}">
                                    {!! Form::label('em_bono', 'Bono Antiguedad (Bs.)', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            {!! Form::text('em_bono', null, ['placeholder' => 'Ej. 500.00', 'class' => 'form-control']) !!} 
                                        </div>
                                        @if($errors->has('em_bono'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('em_bono') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('em_estado')?' has-error':'' }}">
                                    {!! Form::label('em_estado', 'Estado del Empleado', ['class' => 'col-md-12']) !!}
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-unlock"></i>
                                            </div>
                                            {!! Form::select('em_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('em_observaciones')?' has-error':'' }}">
                    {!! Form::label('em_observaciones', 'Observaciones Generales', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bars"></i>
                            </div>
                                    {!! Form::textarea('em_observaciones', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'editor1']) !!}
                        </div>
                        @if($errors->has('em_observaciones'))
                            <span class="help-block">
                                <strong>{{ $errors->first('em_observaciones') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>       
            </div>
        </div>

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Actualizar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la Actualización"><a href="{{ route('empleado.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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
    <!-- Ckeditor load-->
    <script type="text/javascript">
        $(function() 
        {
            CKEDITOR.replace('editor1');
            $(".textarea").wysihtml5();
        });
    </script>
    <!-- /Ckeditor-->
@endsection