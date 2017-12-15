<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('id_empleado')?' has-error':'' }}">
            {!! Form::label('id_empleado', 'Nombre del Empleado', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    {!! Form::select('id_empleado', $empleado, null, ['class' => 'form-control chosen-select-deselect']) !!}
                </div>
                @if($errors->has('id_empleado'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_empleado') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('email')?' has-error':'' }}">
            {!! Form::label('email', 'Correo Electrónico del Usuario (Corporativo)', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. nombre.apellido@zaire.com.bo']) !!}
                </div>
                @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('usuario_tipo')?' has-error':'' }}">
            {!! Form::label('usuario_tipo', 'Tipo de Usuario', ['class' => 'col-md-12']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                    </div>
                    {!! Form::select('usuario_tipo', 
                                [
                                    'Admin' => 'Administrador del Sistema',
                                    'Adminzaire' => 'Administra Zaire',
                                    'Adminzabim' => 'Administra Zabim',
                                    'Adminborder' => 'Administra Bolivian Border Shop',
                                    'Adminventas' => 'Ventas',
                                    'Admincontabilidad' => 'Contabilidad',
                                    'Admincontrol' => 'Monitoreo',
                                    'Adminimportaciones' => 'Importaciones'
                                ], null, ['class' => 'form-control chosen-select-deselect']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('usuario_estado')?' has-error':'' }}">
            {!! Form::label('usuario_estado', 'Estado del Usuario', ['class' => 'col-md-12']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-unlock"></i>
                    </div>
                    {!! Form::select('usuario_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('usuario_cuenta')?' has-error':'' }}">
            {!! Form::label('usuario_cuenta', 'Cuenta de Usuario', ['class' => 'col-md-12']) !!}
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    {!! Form::text('usuario_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Ej. nombre.apellido']) !!}
                </div>
                @if($errors->has('usuario_cuenta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usuario_cuenta') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
            {!! Form::label('password', 'Contraseña', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </div>
                    {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => '**********']) !!}
                </div>
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('password_confirm')?' has-error':'' }}">
            {!! Form::label('password_confirm', 'Confirmar Contraseña', ['class' => 'col-md-12']) !!}
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-key"></i>
                    </div>
                    {!! Form::password('password_confirm', null, ['class' => 'form-control', 'placeholder' => '**********']) !!}
                </div>
                @if($errors->has('password_confirm'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirm') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>