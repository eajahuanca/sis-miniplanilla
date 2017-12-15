<div class="form-group {{ $errors->has('em_fotografia')?' has-error':'' }}">
    {!! Form::label('em_fotografia', 'Fotografía del Empleado', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user-md"></i>
            </div>
            {!! Form::file('em_fotografia', null, ['placeholder' => 'Seleccione Imagen', 'class' => 'form-control']) !!} 
        </div>
        @if($errors->has('em_fotografia'))
            <span class="help-block">
                <strong>{{ $errors->first('em_fotografia') }}</strong>
            </span>
        @endif
    </div>
</div>