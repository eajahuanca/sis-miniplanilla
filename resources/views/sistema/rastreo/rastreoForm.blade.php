<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('res_sigla')?' has-error':'' }}">
            {!! Form::label('res_sigla', 'Sigla del Contenedor', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    {!! Form::text('res_sigla', null, ['placeholder' => 'Ej. ABCD7593-1', 'class' => 'form-control']) !!} 
                </div>
                @if($errors->has('res_sigla'))
                    <span class="help-block">
                        <strong>{{ $errors->first('res_sigla') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('res_fecha')?' has-error':'' }}">
            {!! Form::label('res_fecha', 'Fecha de Arribo', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {!! Form::datetime('res_fecha', null, ['class' => 'form-control form_datetime', 'readonly' => true]) !!} 
                </div>
                @if($errors->has('res_fecha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('res_fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('res_numviaje')?' has-error':'' }}">
            {!! Form::label('res_numviaje', 'Número de Viaje', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    {!! Form::text('res_numviaje', null, ['placeholder' => 'Ej. 3231-32', 'class' => 'form-control']) !!} 
                </div>
                @if($errors->has('res_fecha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('res_numviaje') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('id_movimiento')?' has-error':'' }}">
                    {!! Form::label('id_movimiento', 'Último Movimiento del Contenedor', ['class' => 'col-md-12']) !!}
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-truck"></i>
                            </div>
                            {!! Form::select('id_movimiento', $movimiento, null, ['class' => 'form-control chosen-select-deselect id_movimiento']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <span class="hint--top  hint--info" aria-label="Adicionar Movimiento">
                                <button type="button" class="btn btn-primary" id="idMovimiento"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('id_localizacion')?' has-error':'' }}">
                {!! Form::label('id_localizacion', 'Localización del Contenedor', ['class' => 'col-md-12']) !!}
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            {!! Form::select('id_localizacion', $localizacion, null, ['class' => 'form-control chosen-select-deselect id_localizacion']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <span class="hint--top  hint--info" aria-label="Adicionar Localización">
                                <button type="button" class="btn btn-primary" id="idLocalizacion"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('id_barco')?' has-error':'' }}">
                    {!! Form::label('id_barco', '¿ En que Barco ?', ['class' => 'col-md-12']) !!}
                    <div class="col-md-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            {!! Form::select('id_barco', $barco, null, ['class' => 'form-control chosen-select-deselect id_barco']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <span class="hint--top  hint--info" aria-label="Adicionar Barco">
                                <button type="button" class="btn btn-primary" id="idBarco"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('res_estado')?' has-error':'' }}">
            {!! Form::label('res_estado', 'Estado del Rastreo', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </div>
                    {!! Form::select('res_estado', [true => 'Rastreando', false => 'Rastreo Completada'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('res_observaciones')?' has-error':'' }}">
            {!! Form::label('res_observaciones', 'Observaciones Generales', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-bars"></i>
                    </div>
                            {!! Form::textarea('res_observaciones', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'editor1']) !!}
                </div>
                @if($errors->has('res_observaciones'))
                    <span class="help-block">
                        <strong>{{ $errors->first('res_observaciones') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>