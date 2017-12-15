@extends('template.layout')

@section('FormularioTitulo','Asignar Empresa a Personal')
@section('FormularioDescripcion','en este formulario se pueden observar todos los empleados en una empresa')
@section('FormularioActual','Asignar Empresa a Personal')
@section('FormularioDetalle','Asiganciones Registradas')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nueva Asignacion"><a  href="{{ route('asignar.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Asignacion de Empresa</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Operaciones</th>
                <th style="text-align: center !important;">Nombre de la Empresa</th>
                <th style="text-align: center !important;">Nombre del Empleado</th>
                <th style="text-align: center !important;">Estado</th>
                <th style="text-align: center !important;">Fecha de Registro</th>
                <th style="text-align: center !important;">Fecha de Actualizacion</th>                
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($asignar as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('asignar.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->empresa->emp_nombre }}</td>
                <td>{{ $item->empleado->em_nombre.' '.$item->empleado->em_paterno.' '.$item->empleado->em_materno }}</td>
                <td align="center">
                    @if($item->estado)
                        <span class="hint--top  hint--warning" aria-label="Empleado habilitado en la Empresa"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Empleado inhabilitado de la Empresa"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
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