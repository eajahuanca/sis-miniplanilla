<section class="content">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Salario y Bono</h3>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('pag_tipo_empleado')?' has-error':'' }}">
                    {!! Form::label('pag_tipo_empleado', 'Tipo de Empleado', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            {!! Form::select('pag_tipo_empleado', ['PERMANENTE' => 'Personal Permanente', 'EVENTUAL' => 'Personal Eventual'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('id_empleado')?' has-error':'' }}">
                    {!! Form::label('id_empleado', 'Nombre del Empleado', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            {!! Form::select('id_empleado', $empleado, null, ['class' => 'form-control chosen-select-deselect', 'id' => 'obtenerSueldo']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_sueldo')?' has-error':'' }}">
                    {!! Form::label('pag_sueldo', 'Salario Ganado (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_sueldo', null, ['placeholder' => 'Ej. 2800.78', 'class' => 'form-control', 'id' => 'mostrarSueldo']) !!} 
                        </div>
                        @if($errors->has('pag_sueldo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_sueldo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_dias')?' has-error':'' }}">
                    {!! Form::label('pag_dias', 'Días Trabajados', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            {!! Form::text('pag_dias', null, ['placeholder' => '30', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_dias'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_dias') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_mes')?' has-error':'' }}">
                    {!! Form::label('pag_mes', 'Mes del Sueldo', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::select('pag_mes', ['Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Horas Extras y Otros Bonos</h3>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <div class="col-md-12"><br>
                        <center>
                            <span class="hint--top  hint--info" aria-label="Poner Campos con Ceros (0.00)"><button type="button" class="btn btn-primary" onclick="ponerCeros()"><i class="fa fa-dollar"></i> Sin Bonos</button></span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group {{ $errors->has('pag_cantidad')?' has-error':'' }}">
                    {!! Form::label('pag_cantidad', 'Cantidad', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            {!! Form::text('pag_cantidad', null, ['placeholder' => 'Ej. 3.00', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_cantidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_cantidad') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_pagado')?' has-error':'' }}">
                    {!! Form::label('pag_pagado', 'Monto Pagado (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_pagado', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_pagado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_pagado') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('pag_produccion')?' has-error':'' }}">
                    {!! Form::label('pag_produccion', 'Bono Producción (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_produccion', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_produccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_produccion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_dominical')?' has-error':'' }}">
                    {!! Form::label('pag_dominical', 'Dominicales (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_dominical', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_dominical'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_dominical') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_otrobono')?' has-error':'' }}">
                    {!! Form::label('pag_otrobono', 'Otros Bonos (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_otrobono', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_otrobono'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_otrobono') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Descuentos y estado</h3>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('pag_aporte')?' has-error':'' }}">
                    {!! Form::label('pag_aporte', 'Aporte Nacional Solidario (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_aporte', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_aporte'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_aporte') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group {{ $errors->has('pag_anticipos')?' has-error':'' }}">
                    {!! Form::label('pag_anticipos', 'Anticipos y Otros Descuentos (Bs.)', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-dollar"></i>
                            </div>
                            {!! Form::text('pag_anticipos', null, ['placeholder' => 'Ej. 120.50', 'class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('pag_anticipos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pag_anticipos') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('pag_estado')?' has-error':'' }}">
                    {!! Form::label('pag_estado', 'Estado del pago', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock"></i>
                            </div>
                            {!! Form::select('pag_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::hidden('pag_firma','') !!}
            {!! Form::hidden('id_salariominimo', $idsalariominimo[0]->id) !!} 
        </div>
    </div>

</section>
   