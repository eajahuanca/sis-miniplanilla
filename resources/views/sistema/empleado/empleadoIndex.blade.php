@extends('template.layout')

@section('FormularioTitulo','Empleado')
@section('FormularioDescripcion','en este formulario se pueden observar todos los empleados')
@section('FormularioActual','Empleados')
@section('FormularioDetalle','Empleados Registrados')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nuevo Empleado"><a  href="{{ route('empleado.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Empleado</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Operaciones</th>
                <th style="text-align: center !important;">Nombre del Empledo</th>
                <th style="text-align: center !important;">Nro. CI</th>
                <th style="text-align: center !important;">F. Nacimiento</th>
                <th style="text-align: center !important;">F. Ingreso</th>
                <th style="text-align: center !important;">Sueldo (Bs.)</th>
                <th style="text-align: center !important;">Cargo</th>
                <th style="text-align: center !important;">Area/Unidad</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @include('sistema/formatoFecha')
            @foreach($empleado as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('empleado.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                        <span class="hint--top  hint--warning" aria-label="Ver Contenido"><a href="{{ route('empleado.show', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->em_nombre.' '.$item->em_paterno.' '.$item->em_materno }}</td>
                <td>{{ $item->em_cedula.' '.$item->em_expedido }}</td>
                <td>{{ formatoFechaCortaString($item->em_nacimiento) }}</td>
                <td>{{ formatoFechaCortaString($item->em_fecha_ingeso) }}</td>
                <td align="right">{{ $item->em_sueldo_basico }}</td>
                <td>{{ $item->cargo->car_nombre }}</td>
                <td>{{ $item->area->ar_nombre }}</td>
                <td align="center">
                    @if($item->em_estado)
                        <span class="hint--top  hint--warning" aria-label="Empleado habilitado"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Empleado inhabilitado"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
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