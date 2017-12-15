<div class="col-md-12">
    <div class="form-group {{ $errors->has('car_nombre')?' has-error':'' }}">
        {!! Form::label('car_nombre', 'Nombre del cargo', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-wrench"></i>
                </div>
                {!! Form::text('car_nombre', null, ['placeholder' => 'Ej. Contador General', 'class' => 'form-control']) !!} 
            </div>
            @if($errors->has('car_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('car_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('car_descripcion')?' has-error':'' }}">
        {!! Form::label('car_descripcion', 'Descripcion del cargo', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bars"></i>
                </div>
                {!! Form::textarea('car_descripcion', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'editor1']) !!}
            </div>
            @if($errors->has('car_descripcion'))
                <span class="help-block">
                    <strong>{{ $errors->first('car_descripcion') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('car_estado')?' has-error':'' }}">
        {!! Form::label('car_estado', 'Estado del cargo', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('car_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
            </div>
        </div>
    </div>

</div>