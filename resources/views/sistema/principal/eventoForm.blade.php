<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('fecha')?' has-error':'' }}">
            {!! Form::label('fecha', 'Fecha y hora de la Actividad', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                    {!! Form::text('fecha', null, ['class' => 'form-control form_datetime', 'readonly' => true]) !!}
                </div>
                @if($errors->has('fecha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group {{ $errors->has('lugar')?' has-error':'' }}">
            {!! Form::label('lugar', 'Lugar de la Actividad', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                    </div>
                    {!! Form::text('lugar', null, ['placeholder' => 'Ej. La Paz, Baltazar alquiza', 'class' => 'form-control']) !!} 
                </div>
                @if($errors->has('lugar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lugar') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group {{ $errors->has('id_tipoevento')?' has-error':'' }}">
            {!! Form::label('id_tipoevento', 'Tipo de Actividad', ['class' => 'col-md-12']) !!}
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-list"></i>
                    </div>
                    {!! Form::select('id_tipoevento', $tipoevento, null, ['class' => 'form-control chosen-select-deselect id_tipoevento']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <span class="hint--top  hint--info" aria-label="Nuevo Tipo de Actividad">
                        <button type="button" class="btn btn-primary" id="idTipoEvento"><i class="fa fa-plus"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('descripcion')?' has-error':'' }}">
            {!! Form::label('descripcion', 'Descripcion de la Actividad', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-bars"></i>
                    </div>
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                @if($errors->has('descripcion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descripcion') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('estado')?' has-error':'' }}">
            {!! Form::label('estado', 'Estado de la Actividad', ['class' => 'col-md-12']) !!}
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-unlock"></i>
                    </div>
                    {!! Form::select('estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                </div>
            </div>
        </div>
    </div>
</div>