@foreach($evento as $item)

   	<table class="table table-striped">
   		<tbody>
   			<tr>
   				<td><b>Tipo de Actividad</b></td>
   				<td>: </td>
   				<td><b style="color: #FFFFFF; padding: 4px;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;background: {{ $item->tipoevento->te_color }}">{{ $item->tipoevento->te_nombre }}</b></td>
   			</tr>
   			<tr>
   				<td><b>Lugar</b></td>
   				<td>: </td>
   				<td>{{ $item->lugar }}</td>
   			</tr>
   			<tr>
   				<td><b>Descripción</b></td>
   				<td>: </td>
   				<td align="justify">{{ $item->descripcion }}</td>
   			</tr>
   			<tr>
   				<td><b>Fecha de la Actividad</b></td>
   				<td>: </td>
   				<td><b style="color: #FFFFFF; padding: 4px;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;background: {{ $item->tipoevento->te_color }}">{{ $item->fecha }}</b></td>
   			</tr>
   			<tr>
   				<td><b>La Actividad pertenece a</b></td>
   				<td>: </td>
   				<td>{{ $item->users->usuario_nombre }}</td>
   			</tr>
   			<tr>
   				<td><b>Registrado por</b></td>
   				<td>: </td>
   				<td>{{ $item->userregistra->usuario_nombre }}<br>en fecha {{  $item->created_at }}</td>
   			</tr>
   			<tr>
   				<td><b>Actualizado por</b></td>
   				<td>: </td>
   				<td>{{ $item->useractualiza->usuario_nombre }}<br>en fecha {{  $item->updated_at }}</td>
   			</tr>
   		</tbody>
   	</table>

@endforeach