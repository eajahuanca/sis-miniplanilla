<div class="col-md-12">
    <div class="form-group {{ $errors->has('id_empresa')?' has-error':'' }}">
        {!! Form::label('id_empresa', 'Nombre de la Empresa', ['class' => 'col-md-12']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                </div>
                {!! Form::select('id_empresa', $empresa, null, ['class' => 'form-control chosen-select-deselect']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('id_empleado')?' has-error':'' }}">
        {!! Form::label('id_empleado', 'Empleado a Asignar', ['class' => 'col-md-12']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user-md"></i>
                </div>
                {!! Form::select('id_empleado', $empleado, null, ['class' => 'form-control chosen-select-deselect']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('estado')?' has-error':'' }}">
        {!! Form::label('estado', 'Estado de la Asignacion', ['class' => 'col-md-12']) !!}
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