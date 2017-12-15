@extends('template.layout')

@section('FormularioTitulo','Empleado')
@section('FormularioDescripcion','Cambiar la Fotografia del Empleado')
@section('FormularioActual','Empleados')
@section('FormularioDetalle','Cambiar Fotografia del Empleado')

@section('ContenidoPagina')
    
<div class="row">
    <div class="col-md-5">
        <center>
            <span class="hint--top  hint--info" aria-label="{{ $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno }}"><img src="{{ asset($empleado->em_fotografia) }}"  width="350px" height="350px" class="thumbs" style="border:2px solid orange;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px"></span>
            <br><br><p><b>Fotografia Actual</b></p>
        </center>
    </div>
    <div class="col-md-7">
        <br><br><br><br>
        {!! Form::model($empleado,['url' => ['imageUpdateEmpleado', $empleado->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('sistema.empleado.empleadoImagen')
        <br><br>
        <center>
        <div class="form-group">
            <span class="hint--top  hint--success" aria-label="Actualizar Fotografia"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
            <span class="hint--top  hint--error" aria-label="Cancelar Actualizacion"><a href="{{ route('empleado.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
        </div>
        </center>
        {!! Form::close() !!}          
    </div>
</div>
        
@endsection