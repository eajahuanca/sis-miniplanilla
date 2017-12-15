@extends('template.layout')

@section('FormularioTitulo','Empresa')
@section('FormularioDescripcion','Cambiar el logo de la empresa')
@section('FormularioActual','Empresa')
@section('FormularioDetalle','Cambiar el logo de la empresa')

@section('ContenidoPagina')
    
<div class="row">
    <div class="col-md-5">
        <center>
            <span class="hint--top  hint--info" aria-label="{{ $empresa->emp_nombre }}"><img src="{{ asset($empresa->emp_imagen) }}"  width="350px" height="300px" class="thumbs" style="border:2px solid orange;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px"></span>
            <br><br><p><b>Logo Actual</b></p>
        </center>
    </div>
    <div class="col-md-7">
        <br><br><br><br>
        {!! Form::model($empresa,['url' => ['imageUpdateEmpresa', $empresa->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('sistema.empresa.empresaImagen')
        <br><br>
        <center>
        <div class="form-group">
            <span class="hint--top  hint--success" aria-label="Actualizar Logo"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Actualizar</button></span>
            <span class="hint--top  hint--error" aria-label="Cancelar Actualizacion"><a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
        </div>
        </center>
        {!! Form::close() !!}          
    </div>
</div>
        
@endsection