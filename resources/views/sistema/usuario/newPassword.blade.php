@extends('template.layout')

@section('FormularioTitulo','Usuarios')
@section('FormularioDescripcion','actualizar la contraseña respectiva del usuario')
@section('FormularioActual','usuarios')
@section('FormularioDetalle','Actualizar Contraseña')

@section('ContenidoPagina')
    {!! Form::model($user,['route' => ['user.update',$user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        
        <div class="row">
            <div class="col-md-6">
                <center>
                    <img src="{{ asset($user->usuario_fotografia) }}" width="200px" height="200px">
                    <h2>{{ $user->empleado->em_nombre.' '.$user->empleado->em_paterno.' '.$user->empleado->em_materno.' '.$user->empleado->em_especial }}</h2>
                    <h1>{{ $user->usuario_cuenta }}</h1>
                </center>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('password_actual')?' has-error':'' }}">
                    {!! Form::label('password_actual', 'Contraseña Actual', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-key"></i>
                            </div>
                            {!! Form::password('password_actual', null, ['class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('password_actual'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_actual') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                    {!! Form::label('password', 'Contraseña Nueva', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-key"></i>
                            </div>
                            {!! Form::password('password', null, ['class' => 'form-control']) !!} 
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
                            {!! Form::password('password_confirm', null, ['class' => 'form-control']) !!} 
                        </div>
                        @if($errors->has('password_confirm'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <center>
                        <span class="hint--top  hint--success" aria-label="Actualizar Contraseña"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
                        <span class="hint--top  hint--error" aria-label="Cancelar la Actualización"><a href="{{ url('/principal') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
                    </center>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection