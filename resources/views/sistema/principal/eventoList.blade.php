@extends('template.layout')

@section('FormularioTitulo','Actividades')
@section('FormularioDescripcion','listado de mis actividades registradas')
@section('FormularioActual','Actividades')
@section('FormularioDetalle','Listado de mis Actividades')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Fecha de la Actividad</th>
                <th style="text-align: center !important;">Tipo</th>
                <th style="text-align: center !important;">Lugar</th>
                <th style="text-align: center !important;">Descripción</th>
                <th style="text-align: center !important;">Fecha Registro</th>
                <th style="text-align: center !important;">Fecha Actualización</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($eventos as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar Actividad"><a href="{{ route('principal.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->tipoevento->te_nombre }}</td>
                <td>{{ $item->lugar }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td align="center">
                    @if($item->estado)
                        <span class="hint--top  hint--warning" aria-label="Actividad habilitada"><button class="btn btn-success btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Actividad inhabilitada"><button class="btn btn-warning btn-xs">Inhabilitado</button></span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('javascript')
    <script src="{{ asset('/archivos/js/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/archivos/js/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <!-- Datatables -->
    <script type="text/javascript">
        $(function() {
            $("#myTable").dataTable();
        });
    </script>
    <!-- /Datatables -->
@endsection