@extends('template.layout')

@section('FormularioTitulo','Empresa')
@section('FormularioDescripcion','en este formulario se puede observar el detalle de la Empresa')
@section('FormularioActual','Empresa')
@section('FormularioDetalle','Detalle de datos de la Empresa')

@section('ContenidoPagina')
<div class="row">
	<div class="col-lg-8 col-xs-8"> 
		<div class="small-box bg-yellow">
		    <div class="inner">
		        <h3>
		            {{ $empresa->emp_nombre }}
		        </h3>
		        <h4>NIT: {{ $empresa->emp_nit }}</h4>
		        <h4>Nro. del Empleador (Ministerio de Trabajo): {{ $empresa->emp_empleador }}</h4>
		        <h4>Nro. de Empleador (Caja Nacional de Salud): {{ $empresa->emp_caja }}</h4>
		    </div>
		    <a href="" class="small-box-footer">
		    	<h4>Representante Legal: {{ $empresa->empleado->em_nombre.' '.$empresa->empleado->em_paterno.' '.$empresa->empleado->em_materno }}
		    	</h4>
		    </a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-4">
		<span class="hint--left  hint--info" aria-label="{{ $empresa->emp_nombre }}"><img src="{{ asset($empresa->emp_imagen) }}"  width="250px" height="200px" class="thumbs" style="border:2px solid orange;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px"></span>
		<span class="hint--left  hint--success" aria-label="Cambiar Imagen"><a  href="{{ url('imageChangeEmpresa',$empresa->id) }}" class="btn btn-success"><i class="fa fa-user-md""></i> Otra Imagen</a></span>
	</div>
</div>

<div class="small-box bg-green">
	<div class="inner">    	
        <div class="row">
        	<div class="col-md-6">  	
            	@include('sistema.formatoFecha')
            	<i class="fa fa-calendar"></i> Fecha de Registro : <span> {{ formatoFecha($empresa->created_at) }}</span><br>
        		<i class="fa fa-calendar"></i> Fecha de Actualización : <span> {{ formatoFecha($empresa->updated_at) }}</span>
        	</div>
        	<div class="col-md-6">	
				@if($empresa->emp_estado)
				<h4>Empresa: Habilitado</h4>
				@else
				<h4>Empresa: Inhabilitado</h4>
				@endif
	        </div>
	    </div>
	</div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <span class="hint--top  hint--info" aria-label="Regresar al Pagina Anterior"><a  href="{{ route('empresa.index') }}" class="btn btn-primary"><i class="fa fa-reply-all""></i> Volver</a></span>
        </div>
    </div>
</div>
@endsection