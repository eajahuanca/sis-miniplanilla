@extends('template.layout')

@section('FormularioTitulo','Empleados')
@section('FormularioDescripcion','en este formulario se puede observar el detalle del Empleado')
@section('FormularioActual','Empleados')
@section('FormularioDetalle','Detalle de datos del Empleado')

@section('ContenidoPagina')
<div class="row">
	<div class="col-lg-8 col-xs-8"> 
		<div class="small-box bg-yellow">
		    <div class="inner">
		        <h3>
		            {{ $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno }}
		        </h3>
		        <h4>Carnet de Identidad: {{ $empleado->em_cedula.' - '.$empleado->em_expedido }}</h4>
		        <h4>Fecha de Nacimiento: {{ $empleado->em_nacimiento }}</h4>
		        <h4>Género: {{ $empleado->em_genero }}</h4>
		        <h4>Nacionalidad: {{ $empleado->em_nacionalidad }}</h4>
		    </div>
		    <a href="" class="small-box-footer">
		    	<h4>Dirección: Departamento: {{ $empleado->em_departamento }},
		            	Ciudad: {{ $empleado->em_ciudad }},
		            	Zona: {{ $empleado->em_zona }},
		            	Avenida/Calle: {{ $empleado->em_calle }},
		            	Número de la Puerta: {{ $empleado->em_numero }}</h4>
		    </a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-4">
		<span class="hint--left  hint--info" aria-label="{{ $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno }}"><img src="{{ asset($empleado->em_fotografia) }}"  width="250px" height="250px" class="thumbs" style="border:2px solid orange;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px"></span>
		<span class="hint--left  hint--success" aria-label="Cambiar Imagen"><a  href="{{ url('imageChangeEmpleado',$empleado->id) }}" class="btn btn-success"><i class="fa fa-user-md""></i> Otra Imagen</a></span>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="small-box bg-green">
            <div class="inner">
                <h3>
                    Sueldo<br><center>
                    {{ $empleado->em_sueldo_basico.' Bs.' }}</center>
                </h3><br>
                <p>Bono: {{ $empleado->em_bono.' Bs.' }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
        </div>
	</div>
	<div class="col-md-4">
		<div class="small-box bg-blue">
            <div class="inner">
                <h3>Otros</h3>
                <p>
                	<h4>Cargo : {{ $empleado->cargo->car_nombre }}</h4>
					<h4>Area : {{ $empleado->area->ar_nombre }}</h4>
					<h4>Fecha de Ingreso: {{ $empleado->em_fecha_ingeso }}</h4>
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
        </div>
	</div>
	<div class="col-md-4">
		<div class="small-box bg-red">
            <div class="inner">
                <h3>Contacto</h3>
                <p>
                	<h4>Teléfono: {{ $empleado->em_telefono }}</h4>
					<h4>Celular: {{ $empleado->em_celular }}</h4>
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
        </div>
	</div>
</div>

<div class="small-box bg-green">
	<div class="inner">    	
        <div class="row">
        	<div class="col-md-6">  	
            	@include('sistema.formatoFecha')
            	<i class="fa fa-calendar"></i> Fecha de Registro : <span> {{ formatoFecha($empleado->created_at) }}</span><br>
        		<i class="fa fa-calendar"></i> Fecha de Actualización : <span> {{ formatoFecha($empleado->updated_at) }}</span>
        	</div>
        	<div class="col-md-6">	
				@if($empleado->em_estado)
				<h4>Empleado: Habilitado</h4>
				@else
				<h4>Empleado: Inhabilitado</h4>
				@endif
	        </div>
	    </div>
	</div>
</div>

<div class="small-box bg-green">
	<div class="inner">    	
        <div class="row">
        	<div class="col-md-6">
        	<b>Observaciones Generales :</b> {!! $empleado->em_observaciones !!}
        	</div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <span class="hint--top  hint--info" aria-label="Regresar al Pagina Anterior"><a  href="{{ route('empleado.index') }}" class="btn btn-primary"><i class="fa fa-reply-all""></i> Volver</a></span>
        </div>
    </div>
</div>
@endsection