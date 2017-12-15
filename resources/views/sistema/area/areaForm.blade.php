<div class="col-md-12">
    <div class="form-group {{ $errors->has('ar_nombre')?' has-error':'' }}">
        {!! Form::label('ar_nombre', 'Nombre del Area', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-wrench"></i>
                </div>
                {!! Form::text('ar_nombre', null, ['placeholder' => 'Ej. Contabilidad', 'class' => 'form-control']) !!} 
            </div>
            @if($errors->has('ar_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('ar_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('ar_descripcion')?' has-error':'' }}">
        {!! Form::label('ar_descripcion', 'Descripcion del Area', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bars"></i>
                </div>
                {!! Form::textarea('ar_descripcion', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'editor1']) !!}
            </div>
            @if($errors->has('ar_descripcion'))
                <span class="help-block">
                    <strong>{{ $errors->first('ar_descripcion') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('ar_estado')?' has-error':'' }}">
        {!! Form::label('ar_estado', 'Estado del Area', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('ar_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
            </div>
        </div>
    </div>

</div>