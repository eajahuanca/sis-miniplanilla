<?php
	function fechaTitulo($fecha)
	{
		$nuevaFecha = explode('-', $fecha);
		$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Sepriembre','Octubre','Noviembre','Diciembre');
		return $nuevaFecha[2].'/'.$meses[$nuevaFecha[1] - 1].'/'.$nuevaFecha[0];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Actividades</title>
	<style type="text/css" media="screen">
		body{
			font-family:sans-serif,arial; 
		}
		.miBordeTabla{
			border: 1px solid #000000;
			border-collapse: collapse;
		}
		.tituloTabla{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 2px;
			font-size: 10px;
			font-weight: bold;
			text-align: center;
		}
		.miUsuario{
			font-size: 11px;
		}
		.miContenido{
			border: 1px solid #000000;
			border-collapse: collapse;
			padding: 2px;
			font-size: 9px;
		}
	</style>
</head>
<body>
	<table width="100%">
		<tbody>
			<tr>
				<td width="10%"><img src="{{ asset('storage/empresa/logo.jpg') }}" width="130px" height="80px" /></td>
				<td width="90%"><b><center style="font-size:16px;font-weight: bolder;color: #000000;">REPORTE DE ACTIVIDADES<br>DEL {{ fechaTitulo($fechaInicial) }} AL {{ fechaTitulo($fechaFinal) }}</center></b></td>
			</tr>
		</tbody>
	</table>
	<table>
		<tbody>
			<tr>
				<td class="miUsuario">Del Sr(a).:</td>
				<td class="miUsuario">:</td>
				<td class="miUsuario">{{ Auth::user()->usuario_nombre }}</td>
			</tr>
			<tr>
				<td class="miUsuario">Fecha de Impresión</td>
				<td class="miUsuario">:</td>
				<td class="miUsuario">{{ $fechaImpresion }}</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="miBordeTabla">
		<thead>
			<tr>
				<td colspan="6"><center> D E T A L L E </center></td>
			</tr>
			<tr>
				<th class="tituloTabla">#</th>
				<th class="tituloTabla">DIA</th>
				<th class="tituloTabla">FECHA Y HORA</th>
				<th class="tituloTabla">TIPO DE ACTIVIDAD</th>
				<th class="tituloTabla">LUGAR DE LA ACTIVIDAD</th>
				<th class="tituloTabla">DESCRIPCION DE LA ACTIVIDAD</th>

			</tr>
		</thead>
		<?php $contadorFilas = 1; ?>
		<?php $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'); ?>
		<tbody>
			@foreach($eventos as $item)
			<tr>
				<td class="miContenido" align="center">{{ $contadorFilas++ }}</td>
				<td class="miContenido">{{ $dias[date('N', strtotime($item->fecha))-1] }}</td>
				<td class="miContenido" align="center">{{ $item->fecha }}</td>
				<td class="miContenido">{{ $item->tipoevento->te_nombre }}</td>
				<td class="miContenido" align="justify">{{ $item->lugar }}</td>
				<td class="miContenido" align="justify">{{ $item->descripcion }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>