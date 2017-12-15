<div class="form-group {{ $errors->has('emp_imagen')?' has-error':'' }}">
    {!! Form::label('emp_imagen', 'Logo/Imagen de la Empresa', ['class' => 'col-md-12']) !!}
    <div class="col-md-12">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-list"></i>
            </div>
            {!! Form::file('emp_imagen', null, ['placeholder' => 'Seleccione Imagen', 'class' => 'form-control']) !!} 
        </div>
        @if($errors->has('emp_imagen'))
            <span class="help-block">
                <strong>{{ $errors->first('emp_imagen') }}</strong>
            </span>
        @endif
    </div>
</div>