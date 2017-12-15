<!DOCTYPE html>
<html >
<head>
	<title>Boleta de Pago</title>
	<style type="text/css" media="screen">
		body{
			margin-top: -1em;
			margin-right: -2em;
			margin-left: 4em;
			margin-bottom: -1em;
		}
		.miBorde{
			font-family: sans-serif,arial;
		}
		.nombreEmpresa{
			font-size: 13px;
			font-weight: bolder;
		}
		.nombreEmpleador{
			font-size: 11px;
			font-weight: bolder;
		}
		.tituloPlanilla{
			font-size: 9px;
		}
		.nombreRepresentante{
			font-size: 10px;
			font-weight: bolder;
		}
		.rotarTexto{
			-webkit-transform:rotate(-90deg);
			-moz-transform:rotate(-90deg);
			width: 6px;
			height: 40px;
		}
		.cabecera{
			width: 100%;
		}
		.miBordeTabla{
			border: 1px solid #000000;
			border-collapse: collapse;
		}
		.miTitulo{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 1px;
			font-size: 7px;
			font-weight: bold;
			text-align: center;
		}
		.miContenido{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 1px;
			font-size: 7px;
		}
		.miPie{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 2px;
			text-align: right;
			font-weight: bold;
			font-size: 8px;
			text-align: center;
			height: 20px;
		}
	</style>
</head>
<body>
<div class="miBorde">
	<div class="cabecera">
		@if($tipo_empleado == 'PERMANENTE')
		<table width="100%">
			<tr>
				<td align="left" width="50%">
					<b>
						<u class="nombreEmpresa">{{ $empresa[0]->emp_nombre }}</u>
						<br><b class="nombreEmpleador">NIT : {{ $empresa[0]->emp_nit }}</b>
						<br><b class="nombreEmpleador">N° DEL EMPLEADOR DEL MINISTERIO DE TRABAJO : {{ $empresa[0]->emp_empleador }}</b>
						<br><b class="nombreEmpleador">N° EMPLEADOR - PATRONAL CNS : {{ $empresa[0]->emp_caja }}</b>
					</b>
				</td>
				<td align="right" width="50%">
					<img src="{{ asset($empresa[0]->emp_imagen) }}" alt="Empresa" widtd="160px" height="70px">
				</td>
			</tr>
		</table>
		@else
		<table width="100%">
			<tr>
				<td align="left" width="50%">
					<b class="nombreEmpleador">{{ strtoupper('Empleador: Boris Richard Zabala Huanca') }}</b>
				</td>
			</tr>
		</table>
		@endif
	</div>
	
	<center class="nombrePlanilla">
		<b class="nombrePlanilla">PERSONAL {{ $tipo_empleado }}</b><br>
		<b class="nombrePlanilla"><u>PLANILLA DE SUELDOS Y SALARIOS</u></b><br>
		<b class="nombreEmpleador">
			Correspondiente al mes de {{ $mes }} de {{ $gestion }}
			<br>(Expresado en Bolivianos)
		</b>
	</center>
	<br>
	<table class="miBordeTabla">
		<thead>
			<tr>
				<td class="miTitulo" rowspan="2">N°</td>
				<td class="miTitulo" rowspan="2">CARNET DE IDENTIDAD</td>
				<td class="miTitulo" rowspan="2" width="80px">APELLIDOS Y NOMBRES</td>
				<td class="miTitulo" rowspan="2">NACIONALIDAD</td>
				<td class="miTitulo" rowspan="2">FECHA DE NACIMIENTO</td>
				<td class="miTitulo" rowspan="2">SEXO (F/M)</td>
				<td class="miTitulo" rowspan="2">OCUPACION QUE DESEMPEÑA</td>
				<td class="miTitulo" rowspan="2">FECHA DE INGRESO</td>
				<td class="miTitulo" rowspan="2">SUELDO BASICO</td>
				<td class="miTitulo" rowspan="2">DIAS PAGADOS MES</td>
				<td class="miTitulo" rowspan="2">SALARIO GANADO<br>(A)</td>
				<td class="miTitulo" rowspan="2">BONO DE ANTIGUEDAD<br>(B)</td>
				<td class="miTitulo" colspan="2">HORAS EXTRAS</td>
				<td class="miTitulo" colspan="3">OTROS BONOS</td>
				<td class="miTitulo" rowspan="2">TOTAL GANADO<br>(G)<br>A+B+C+D+E+F</td>
				<td class="miTitulo" colspan="4">DESCUENTOS</td>
				<td class="miTitulo" rowspan="2">TOTAL DESCUENTOS<br>(L)<br>H+I+J+K</td>
				<td class="miTitulo" rowspan="2">LIQUIDO PAGABLE<br>(LL)<br>G-L</td>
				<td class="miTitulo" rowspan="2" width="80px">FIRMA DEL EMPLEADO</td>
			</tr>
			<tr>
				<td class="miTitulo" width="20px;">CANTIDAD</td>
				<td class="miTitulo">MONTO PAGADO<br>(C)</td>
				<td class="miTitulo">BONO DE PRODUCCION<br>(D)</td>
				<td class="miTitulo">DOMINICALES<br>(E)</td>
				<td class="miTitulo">OTROS BONOS<br>(F)</td>
				<td class="miTitulo">AFP 12,71%<br>(H)</td>
				<td class="miTitulo">APORTE NACIONAL SOLIDARIO<br>(I)</td>
				<td class="miTitulo">RC-IVA 13%<br>(J)</td>
				<td class="miTitulo">ANTICIPO Y OTROS DESCUENTOS<br>(K)
			</tr>
		</thead>
		<tbody>	
			<?php $contadorFilas = 1; $totalSueldoBasico = 0; $totalSueldo = 0; $totalBonoAntiguedad = 0; $totalCantidad = 0; $totalPagado = 0; $totalProduccion = 0; $totalDominical = 0; $totalOtroBono = 0; $totalGanado = 0; $totalAfp = 0; $totalAporte = 0; $totalIva = 0; $totalAnticipos = 0; $totalDescuento = 0; $totalLiquido = 0;?>
			@include('sistema.formatoFecha')
			@foreach($pago as $item)
			<tr >
				<td class="miContenido" align="center" height="25px">{{ $contadorFilas++ }}</td>
				<td class="miContenido" align="center">{{ $item->empleado_cedula }}</td>
				<td class="miContenido" style="padding: 2px !important;font-size: 6px !important;">{{ strtoupper($item->empleado_nombre) }}</td>
				<td class="miContenido" align="center">{{ strtoupper($item->em_nacionalidad) }}</td>
				<td class="miContenido" align="center">{{ formatoFechaCorta($item->em_nacimiento) }}</td>
				<td class="miContenido" align="center">
				@if($item->em_genero == 'Masculino')
					M
				@else
					F
				@endif
				</td>
				<td class="miContenido" align="center">{{ strtoupper($item->car_nombre) }}</td>
				<td class="miContenido" align="center">{{ formatoFechaCorta($item->em_fecha_ingeso) }}</td>
				<td class="miContenido" align="center">{{ number_format($item->em_sueldo_basico,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ $item->pag_dias }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_sueldo,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_bono_antiguedad,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ $item->pag_cantidad }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_pagado,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_produccion,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_dominical,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_otrobono,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_total_ganado,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_afp,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_aporte,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_iva,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_anticipos,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_total_descuento,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->pag_total_liquido,2,'.',',') }}</td>
				<td class="miContenido" align="center">@if($tipo_empleado == 'PERMANENTE') PAPELETA DE PAGO @endif</td>
			</tr>
			<?php $totalSueldoBasico += $item->em_sueldo_basico;?>
			<?php $totalSueldo += $item->pag_sueldo;?>
			<?php $totalBonoAntiguedad += $item->pag_bono_antiguedad;?>
			<?php $totalCantidad += $item->pag_cantidad;?>
			<?php $totalPagado += $item->pag_pagado;?>
			<?php $totalProduccion += $item->pag_produccion;?>
			<?php $totalDominical += $item->pag_dominical;?>
			<?php $totalOtroBono += $item->pag_otrobono;?>
			<?php $totalGanado += $item->pag_total_ganado;?>
			<?php $totalAfp += $item->pag_afp;?>
			<?php $totalAporte += $item->pag_aporte;?>
			<?php $totalIva += $item->pag_iva;?>
			<?php $totalAnticipos += $item->pag_anticipos;?>
			<?php $totalDescuento += $item->pag_total_descuento;?>
			<?php $totalLiquido += $item->pag_total_liquido;?>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td class="miPie" colspan="8" style="text-align: center !important;">TOTALES</td>
				<td class="miPie">{{ number_format($totalSueldoBasico,2,'.',',') }}</td>
				<td class="miPie"></td>
				<td class="miPie">{{ number_format($totalSueldo,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalBonoAntiguedad,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalCantidad,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalPagado,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalProduccion,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalDominical,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalOtroBono,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalGanado,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalAfp,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalAporte,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalIva,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalAnticipos,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalDescuento,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalLiquido,2,'.',',') }}</td>
				<td class="miPie"></td>
			</tr>
		</tfoot>
	</table>
	<br><br><br><br><br><br>

	<table width="100%">
		<tbody>
			<tr>
				<td width="25%" align="center" class="nombreRepresentante">@if($tipo_empleado=='PERMANENTE') {{ strtoupper($empresa[0]->empleado->em_nombre.' '.$empresa[0]->empleado->em_paterno.' '.$empresa[0]->empleado->em_materno.' '.$empresa[0]->empleado->em_especial) }}@else {{ strtoupper('Boris Richard Zabala Huanca') }} @endif<br>_______________________________________________<br>NOMBRE DEL EMPLEADOR O REPRESENTANTE LEGAL</td>
				<td width="25%" align="center" class="nombreRepresentante">@if($tipo_empleado=='PERMANENTE') {{ $empresa[0]->empleado->em_cedula.' '.$empresa[0]->empleado->em_expedido }} @else {{ strtoupper('4775179 LP') }} @endif<br>___________________________________<br>N° DE DOCUMENTO DE IDENTIDAD</td>
				<td width="25%" align="center" class="nombreRepresentante"><br>_________________________________<br>F I R M A</td>
				<td width="25%" align="center" class="nombreRepresentante">{{ $fechaImpresion }}</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>