@extends('template.layout')

@section('FormularioTitulo','Areas')
@section('FormularioDescripcion','en este formulario se puede observar el detalle del area')
@section('FormularioActual','Areas')
@section('FormularioDetalle','Detalle del Area')

@section('ContenidoPagina')    
	<div class="small-box bg-aqua">
	    <div class="inner">
	        <h3>
	            {{ $area->ar_nombre }}
	        </h3>
	        <div class="row">
	        	<div class="col-md-6">
	        		<h4>Descripción del area</h4>
	            	{!! $area->ar_descripcion !!}
	            	<br>
	            	@include('sistema.formatoFecha')
	            	<i class="fa fa-calendar"></i> Fecha de Creación : <span> {{ formatoFecha($area->created_at) }}</span><br>
	        		<i class="fa fa-calendar"></i> Fecha de Actualización : <span> {{ formatoFecha($area->updated_at) }}</span>
	        	</div>
	        	<div class="col-md-6">
					<h4>Estado del area</h4>
					@if($area->ar_estado)
					area: Habilitado
					@else
					area: Inhabilitado
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
		                <span class="hint--top  hint--info" aria-label="Regresar al Pagina Anterior"><a  href="{{ route('area.index') }}" class="btn btn-primary"><i class="fa fa-reply-all""></i> Volver</a></span>
		            </div>
		        </div>
		    </div>
@endsection