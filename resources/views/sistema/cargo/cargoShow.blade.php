@extends('template.layout')

@section('FormularioTitulo','Cargos')
@section('FormularioDescripcion','en este formulario se puede observar el detalle del cargo')
@section('FormularioActual','Cargos')
@section('FormularioDetalle','Detalle del Cargo')

@section('ContenidoPagina')    
	<div class="small-box bg-yellow">
	    <div class="inner">
	        <h3>
	            {{ $cargo->car_nombre }}
	        </h3>
	        <div class="row">
	        	<div class="col-md-6">
	        		<h4>Descripción del Cargo</h4>
	            	{!! $cargo->car_descripcion !!}
	            	<br>
	            	@include('sistema.formatoFecha')
	            	<i class="fa fa-calendar"></i> Fecha de Creación : <span> {{ formatoFecha($cargo->created_at) }}</span><br>
	        		<i class="fa fa-calendar"></i> Fecha de Actualización : <span> {{ formatoFecha($cargo->updated_at) }}</span>
	        	</div>
	        	<div class="col-md-6">
					<h4>Estado del Cargo</h4>
					@if($cargo->car_estado)
					Cargo: Habilitado
					@else
					Cargo: Inhabilitado
					@endif
	        	</div>
	        </div>
	    </div>
	    <div class="icon">
	        <i class="ion ion-ios7-briefcase-outline"></i>
	    </div>
	    <a href="" class="small-box-footer">
	    </a>
	</div>
	<div class="form-group">
		        <div class="row">
		            <div class="col-xs-12 col-md-12">
		                <span class="hint--top  hint--info" aria-label="Regresar al Pagina Anterior"><a  href="{{ route('cargo.index') }}" class="btn btn-primary"><i class="fa fa-reply-all""></i> Volver</a></span>
		            </div>
		        </div>
		    </div>
@endsection