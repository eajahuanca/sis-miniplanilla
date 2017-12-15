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
			height:15px; 
		}
		.miPie{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 2px;
			text-align: right;
			font-weight: bold;
			font-size: 8px;
			text-align: center;
			height: 17px;
		}
	</style>
</head>
<body>
<div class="miBorde">
	<div class="cabecera">
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
	</div>
	
	<center class="nombrePlanilla">
		<b class="nombrePlanilla">PERSONAL {{ $tipo_empleado }}</b><br>
		<b class="nombrePlanilla"><u>PLANILLA DE PAGO DE AGUINALDO DE NAVIDAD</u></b><br>
		<b class="nombreEmpleador">
			Correspondiente a la Gestión {{ $gestion }}
			<br>(Expresado en Bolivianos)
		</b>
	</center>
	<br>
	<table class="miBordeTabla">
		<thead>
			<tr>
				<td class="miTitulo">N°</td>
				<td class="miTitulo">CARNET DE IDENTIDAD</td>
				<td class="miTitulo">APELLIDO PATERNO</td>
				<td class="miTitulo">APELLIDO MATERNO</td>
				<td class="miTitulo" width="85px">NOMBRES</td>
				<td class="miTitulo">NACIONALIDAD</td>
				<td class="miTitulo">FECHA DE NACIMIENTO</td>
				<td class="miTitulo">SEXO (F/M)</td>
				<td class="miTitulo" width="100px">OCUPACION QUE DESEMPEÑA</td>
				<td class="miTitulo">FECHA DE INGRESO</td>
				<td class="miTitulo">HABER BASICO<br/>(A)</td>
				<td class="miTitulo">Bono<br/>Antiguedad<br/>(B)</td>
				<td class="miTitulo">Bono<br/>Producción<br/>(C)</td>
				<td class="miTitulo">Subsidio<br/>Frontera<br/>(D)</td>
				<td class="miTitulo">Labor<br/>extraordinaria<br/>(E)</td>
				<td class="miTitulo">Otros Bonos<br/>(F)</td>
				<td class="miTitulo">TOTAL GANADO<br>(G=A+B+C+D+E+F)</td>
				<td class="miTitulo">Meses Trabajados<br/>(H)</td>
				<td class="miTitulo">LIQUIDO PAGABLE<br>(I=G*H/12)</td>
				<td class="miTitulo" width="80px">FIRMA DEL EMPLEADO</td>
			</tr>
		</thead>
		<tbody>	
			<?php $contadorFilas = 1; $totalHaberBasico = $totalBonoAntiguedad = $totalBonoProduccion = $totalSubsidio = $totalLabor = $totalOtroBono = $totalGanado = $totalLiquido = 0; ?>
			@include('sistema.formatoFecha')
			@foreach($aguinaldo as $item)
			<tr>
				<td class="miContenido" align="center">{{ $contadorFilas++ }}</td>
				<td class="miContenido" align="center">{{ $item->empleado_cedula }}</td>
				<td class="miContenido" align="center">{{ strtoupper($item->em_paterno) }}</td>
				<td class="miContenido" align="center">{{ strtoupper($item->em_materno) }}</td>
				<td class="miContenido" align="center">{{ strtoupper($item->em_nombre) }}</td>
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

				<td class="miContenido" align="center">{{ number_format($item->agui_sueldo,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_bono,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_produccion,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_subsidio,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->aqui_extraordinario,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_otrobono,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_totalganado,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ $item->agui_meses }}</td>
				<td class="miContenido" align="center">{{ number_format($item->agui_totalliquido,2,'.',',') }}</td>
				<td class="miContenido" align="center">{{ $item->agui_firma }}</td>
			</tr>
			<?php 
				$totalHaberBasico += $item->agui_sueldo;
				$totalBonoAntiguedad += $item->agui_bono;
				$totalBonoProduccion += $item->agui_produccion;
				$totalSubsidio += $item->agui_subsidio;
				$totalLabor += $item->aqui_extraordinario;
				$totalOtroBono += $item->agui_otrobono;
				$totalGanado += $item->agui_totalganado;
				$totalLiquido += $item->agui_totalliquido;
			?>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td class="miPie" colspan="10" style="text-align: center !important;">TOTALES</td>
				<td class="miPie">{{ number_format($totalHaberBasico,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalBonoAntiguedad,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalBonoProduccion,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalSubsidio,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalLabor,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalOtroBono,2,'.',',') }}</td>
				<td class="miPie">{{ number_format($totalGanado,2,'.',',') }}</td>
				<td class="miPie" style="background-color: #BDBDBD;"></td>
				<td class="miPie">{{ number_format($totalLiquido,2,'.',',') }}</td>
				<td class="miPie" style="background-color: #BDBDBD;"></td>
			</tr>
		</tfoot>
	</table>
	<br><br><br><br><br><br>

	<table width="100%">
		<tbody>
			<tr>
				<td width="25%" align="center" class="nombreRepresentante">{{ strtoupper($empresa[0]->empleado->em_nombre.' '.$empresa[0]->empleado->em_paterno.' '.$empresa[0]->empleado->em_materno.' '.$empresa[0]->empleado->em_especial) }}<br>_______________________________________________<br>NOMBRE DEL EMPLEADOR O REPRESENTANTE LEGAL</td>
				<td width="25%" align="center" class="nombreRepresentante">{{ $empresa[0]->empleado->em_cedula.' '.$empresa[0]->empleado->em_expedido }}<br>___________________________________<br>N° DE DOCUMENTO DE IDENTIDAD</td>
				<td width="25%" align="center" class="nombreRepresentante"><br>_________________________________<br>F I R M A</td>
				<td width="25%" align="center" class="nombreRepresentante">{{ $fechaImpresion }}</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>