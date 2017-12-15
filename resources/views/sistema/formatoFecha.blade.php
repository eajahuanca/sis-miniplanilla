<?php
	function formatoFecha($fecha)
	{
		$nuevaFechaArray = explode('-', $fecha);
		$fechaHoraArray = explode(' ', $nuevaFechaArray[2]);
		$mesesArray = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		$cadenaMes = $mesesArray[(int)$nuevaFechaArray[1]-1];

		return $fechaHoraArray[0].' de '.$cadenaMes.' del '.$nuevaFechaArray[0].' a horas '.$fechaHoraArray[1];
	}

	function formatoFechaCorta($fecha)
	{
		$nuevaFechaArray = explode('-', $fecha);
		return ($nuevaFechaArray[2].'/'.$nuevaFechaArray[1].'/'.$nuevaFechaArray[0]);
	}

	function formatoFechaCortaString($fecha)
	{
		$mesesArray = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		$nuevaFechaArray = explode('-', $fecha);
		$cadenaMes = $mesesArray[(int)$nuevaFechaArray[1] - 1];
		return ($nuevaFechaArray[2].'/'.$cadenaMes.'/'.$nuevaFechaArray[0]);
	}
?>