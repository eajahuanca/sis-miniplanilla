<!DOCTYPE html>
<html>
<head>
	<title>Boleta de Pago</title>
	<?php
		function fechaNacimiento($fecha)
		{
			$fechaNueva = explode('-', $fecha);
			$arrayMes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
			return $fechaNueva[2].'/'.$arrayMes[((int)$fechaNueva[1])-1].'/'.$fechaNueva[0];
		}
	?>
	<style type="text/css" media="screen">
		body{
			margin-top:-4em;
			margin-right:-2.5em;
			margin-left:-2.5em;
			margin-bottom:-6em;
			background-image: url({{ asset('archivos/img/fondo.gif') }});
		}
		.miBorde{
			border: 5px solid #FACC2E;
			border-radius: 6px;
			-moz-border-radius: 6px;
			-webkit-border-radius: 6px;
			padding: 5px;
			margin: 2em;
			width: 100%;

		}
		.titulosLogo{
			font-size: 14px;
			font-family: sans-serif,arial;
			font-weight: bolder;
		}
		.titulosTitulo{
			font-family: sans-serif, arial;
			font-size: 22px;
			font-weight: bolder;
			text-align: center;
			margin-top: -5em;
		}
		.titulosA{
			border: 1px solid #FACC2E;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 5px;
			width: 100%;/*aqui*/
			font-size: 12px;
			font-family: sans-serif, arial;
		}
		.titulosB{
			border: 1px solid #FACC2E;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 5px;
			width: 250px;
			font-size: 12px;
			font-family: sans-serif, arial;
		}
		.tituloSello{
			font-family: 'currier new',sans-serif, arial;
			font-size: 12px;
			height: 60px;
			width: 100%;
			float: right;
			line-height: 80px;
		}
		.pequenos1{
			border: 1px solid #FACC2E;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-right: 7px;
			width: 100%;
			float: right;
			font-size: 12px;
			font-family: sans-serif, arial;
		}
		.pequenos2{
			border: 1px solid #FACC2E;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-right: 7px;
			width: 100%;
			float: right;
			font-size: 12px;
			font-family: sans-serif, arial;
		}
		.contenidoSueldo{
			font-family: sans-serif, arial;
			font-size: 13px;
			border: 2px solid #FACC2E;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-collapse: collapse;
		}
		.encabezado1{
			background-color: #01DF74;/*58ACFA;#58FA58;*/
			border-radius: 3px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			margin-top:-0.8em;
			margin-left:-0.4em;
			color: #ffffff;
			padding: 7px;
		}
		.encabezado2{
			background-color: #FA5858;
			border-radius: 3px;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			margin-top:-0.8em;
			margin-left:-0.3em;
			margin-right:-0.4em;
			color: #ffffff;
			padding: 7px;
		}
		.division1{
			padding-left: 8px;
			padding-top: 10px;
			margin-top: -1em; 
		}
		.division2{
			border-right: 2px solid #FACC2E;
			padding-right: 10px;
			padding-top: 11px;
			font-weight: bolder;
			margin-top: -1.5em;
			margin-right: -0.1em;
		}
		.division3{
			padding-right: 10px;
			padding-top: 11px;
			font-weight: bolder;
			margin-top: -1.3em;
		}
		.division11{
			padding-left: 8px;
			padding-top: 4px; 
		}
		.division22{
			border-right: 2px solid #FACC2E;
			padding-right: 10px;
			padding-top: 7px;
			font-weight: bolder;
			margin-top: -0.35em;
			margin-right: -0.1em;
		}
		.division33{
			padding-right: 10px;
			padding-top: 7px;
			font-weight: bolder;
			margin-top: -0.4em;
		}
		.pie1{
			background-color: #FACC2E;
			padding-left:20px;
			padding-top:7px;
			padding-bottom: 7px;
			margin-left: -1em;
			font-size: 15px;
		}
		.pie2{
			background-color: #FACC2E;
			padding-top:7px;
			padding-bottom: 7px;
			padding-right: 10px;
			font-size: 15px;
			margin-left: -1em;
		}
		.pie3{
			background-color: #FACC2E;
			padding-top:7px;
			padding-bottom: 7px;
			padding-right: 25px;
			font-size: 15px;
			margin-left: -1em;
			margin-right: -1em;
		}
		.tituloPie{
			padding-left: 20px;
			padding-bottom: 2px;
			padding-top: 3px;
			padding-right: 20px;
			font-size: 15px;
			font-weight: bolder;
		}
		.sueldo{
			text-align:right;
		}
	</style>
</head>
<body>
<div class="miBorde">
	<table width="100%">
		<tbody>
			<tr>
				<td align="left">
					<img src="{{ asset($empresa->emp_imagen) }}" alt="Empresa" width="180px" height="90px">
				</td>
				<td align="right">
					<b class="titulosLogo">
						<u>{{ $empresa->emp_nombre }}</u>
						<br>NIT : {{ $empresa->emp_nit }}
						<br>N° PATRONAL CNS : {{ $empresa->emp_caja }}
					</b>
				</td>
			</tr>
		</tbody>
	</table>
		<div class="titulosTitulo">
			<u>BOLETA DE PAGO</u>
		</div>
		<br>
	<table width="100%">
		<tbody>
			<tr>
				<td align="left" width="20%"><div class="titulosA">Nombre del Empleado</div></td>
				<td align="left" width="45%"><div class="titulosB"><b>: {{ $empleado->em_paterno.' '.$empleado->em_materno.' '.$empleado->em_especial.' '.$empleado->em_nombre}}</b></div></td>
				<td align="right"><div class="pequenos1">Boleta: <b>ORIGINAL</b></div></td>
			</tr>
			<tr>
				<td align="left"><div class="titulosA">Carnet de Identidad</div></td> 
				<td align="left"><div class="titulosB"><b>: {{ $empleado->em_cedula.' '.$empleado->em_expedido }}</b></div></td>
				<td align="right"><div class="pequenos2">Correspondiente a:<b> {{ $pago->pag_mes.'/'.$pago->pag_gestion }}</b></div></td>
			</tr>
			<tr>
				<td><div class="titulosA">Fecha de Nacimiento</div></td>
				<td><div class="titulosB"><b>: {{ fechaNacimiento($empleado->em_nacimiento) }}</b></div></td>
				<td align="center" rowspan="3"><div class="tituloSello">SELLO EMPRESA</div></td>
			</tr>
			<tr>
				<td align="left"><div class="titulosA">Género</div></td>
				<td align="left"><div class="titulosB"><b>: {{ $empleado->em_genero }}</b></div></td>
			</tr>
			<tr>
				<td><div class="titulosA">Cargo del Empleado</div></td>
				<td><div class="titulosB"><b>: {{ $empleado->cargo->car_nombre }}</b></div></td>
			</tr>
		</tbody>
	</table>
	<br>
	<div class="contenidoSueldo">
		<table width="100%">
			<thead>
				<tr>
					<th colspan="2" width="50%"><div class="encabezado1">I N G R E S O S</div></th>
					<th colspan="2" width="50%"><div class="encabezado2">D E S C U E N T O S</div></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td align="left"><div class="division11">DIAS TRABAJADOS</div></td>
					<td align="right"><div class="division22">{{ $pago->pag_dias }}</div></td>
					<td align="left"><div class="division11">AFP's 12.71%</td>
					<td align="right"><div class="division33">{{ number_format($pago->pag_afp,2,'.',',').' Bs.' }}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">HABER BASICO</div></td>
					<td align="right"><div class="division2">{{ number_format($pago->pag_sueldo,2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">RC-IVA 13%</div></td>
					<td align="right"><div class="division3">{{ number_format($pago->pag_iva,2,'.',',').' Bs.'}}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">BONO DE ANTIGUEDAD</div></td>
					<td align="right"><div class="division2">{{ number_format($pago->pag_bono_antiguedad,2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">OTROS</div></td>
					<td align="right"><div class="division3">{{ number_format($pago->pag_anticipos,2,'.',',').' Bs.' }}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">OTROS</div></td>
					<td align="right"><div class="division2">{{ number_format(($pago->pag_pagado + $pago->pag_produccion + $pago->pag_dominical + $pago->pag_otrobono),2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">-</div></td>
					<td align="right"><div class="division3">-</div></td>
				</tr>
			</tbody>
			
			<tfoot>
				<tr>
					<th align="left"><div class="pie1">TOTALES</div></th>
					<th align="right"><div class="pie2">{{ number_format($pago->pag_total_ganado,2,'.',',').' Bs.' }}</div></th>
					<th align="right" colspan="2"><div class="pie3">{{ number_format($pago->pag_total_descuento,2,'.',',').' Bs.'}}</div></th>
				</tr>
			</tfoot>
		</table>
		<div class="tituloPie">
			<table width="100%">
				<tr>
					<td align="left">LIQUIDO PAGABLE</td>
					<td align="right"><b>{{ number_format($pago->pag_total_liquido,2,'.',',').' Bs.'}}</b></td>
				</tr>
			</table>
		</div>
	</div>
</div>

 	<hr style="margin-top: -2em;margin-bottom: -3em; color: #FACC2E;" >
<div class="miBorde">
	<table width="100%">
		<tbody>
			<tr>
				<td align="left">
					<img src="{{ asset($empresa->emp_imagen) }}" alt="Empresa" width="180px" height="90px">
				</td>
				<td align="right">
					<b class="titulosLogo">
						<u>{{ $empresa->emp_nombre }}</u>
						<br>NIT : {{ $empresa->emp_nit }}
						<br>N° PATRONAL CNS : {{ $empresa->emp_caja }}
					</b>
				</td>
			</tr>
		</tbody>
	</table>
		<div class="titulosTitulo">
			<u>BOLETA DE PAGO</u>
		</div>
		<br>
	<table width="100%">
		<tbody>
			<tr>
				<td align="left" width="20%"><div class="titulosA">Nombre del Empleado</div></td>
				<td align="left" width="45%"><div class="titulosB"><b>: {{ $empleado->em_paterno.' '.$empleado->em_materno.' '.$empleado->em_especial.' '.$empleado->em_nombre}}</b></div></td>
				<td align="right" width="35%"><div class="pequenos1">Boleta: <b>COPIA</b></div></td>
			</tr>
			<tr>
				<td align="left"><div class="titulosA">Carnet de Identidad</div></td> 
				<td align="left"><div class="titulosB"><b>: {{ $empleado->em_cedula.' '.$empleado->em_expedido }}</b></div></td>
				<td align="right"><div class="pequenos2">Correspondiente a:<b> {{ $pago->pag_mes.'/'.$pago->pag_gestion }}</b></div></td>
			</tr>
			<tr>
				<td><div class="titulosA">Fecha de Nacimiento</div></td>
				<td><div class="titulosB"><b>: {{ fechaNacimiento($empleado->em_nacimiento) }}</b></div></td>
				<td align="center" rowspan="3"><div class="tituloSello">SELLO EMPRESA</div></td>
			</tr>
			<tr>
				<td align="left"><div class="titulosA">Género</div></td>
				<td align="left"><div class="titulosB"><b>: {{ $empleado->em_genero }}</b></div></td>
			</tr>
			<tr>
				<td><div class="titulosA">Cargo del Empleado</div></td>
				<td><div class="titulosB"><b>: {{ $empleado->cargo->car_nombre }}</b></div></td>
			</tr>
		</tbody>
	</table>
	<br>
	<div class="contenidoSueldo">
		<table width="100%">
			<thead>
				<tr>
					<th colspan="2" width="50%"><div class="encabezado1">I N G R E S O S</div></th>
					<th colspan="2" width="50%"><div class="encabezado2">D E S C U E N T O S</div></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td align="left"><div class="division11">DIAS TRABAJADOS</div></td>
					<td align="right"><div class="division22">{{ $pago->pag_dias }}</div></td>
					<td align="left"><div class="division11">AFP's 12.71%</td>
					<td align="right"><div class="division33">{{ number_format($pago->pag_afp,2,'.',',').' Bs.' }}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">HABER BASICO</div></td>
					<td align="right"><div class="division2">{{ number_format($pago->pag_sueldo,2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">RC-IVA 13%</div></td>
					<td align="right"><div class="division3">{{ number_format($pago->pag_iva,2,'.',',').' Bs.'}}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">BONO DE ANTIGUEDAD</div></td>
					<td align="right"><div class="division2">{{ number_format($pago->pag_bono_antiguedad,2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">OTROS</div></td>
					<td align="right"><div class="division3">{{ number_format($pago->pag_anticipos,2,'.',',').' Bs.' }}</div></td>
				</tr>
				<tr>
					<td align="left"><div class="division1">OTROS</div></td>
					<td align="right"><div class="division2">{{ number_format(($pago->pag_pagado + $pago->pag_produccion + $pago->pag_dominical + $pago->pag_otrobono),2,'.',',').' Bs.' }}</div></td>
					<td align="left"><div class="division1">-</div></td>
					<td align="right"><div class="division3">-</div></td>
				</tr>
			</tbody>
			
			<tfoot>
				<tr>
					<th align="left"><div class="pie1">TOTALES</div></th>
					<th align="right"><div class="pie2">{{ number_format($pago->pag_total_ganado,2,'.',',').' Bs.' }}</div></th>
					<th align="right" colspan="2"><div class="pie3">{{ number_format($pago->pag_total_descuento,2,'.',',').' Bs.'}}</div></th>
				</tr>
			</tfoot>
		</table>
		<div class="tituloPie">
			<table width="100%">
				<tr>
					<td align="left">LIQUIDO PAGABLE</td>
					<td align="right"><b>{{ number_format($pago->pag_total_liquido,2,'.',',').' Bs.'}}</b></td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>