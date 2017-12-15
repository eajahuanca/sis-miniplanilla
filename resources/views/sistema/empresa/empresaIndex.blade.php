@extends('template.layout')

@section('FormularioTitulo','Empresas')
@section('FormularioDescripcion','en este formulario se pueden observar todas las empresas')
@section('FormularioActual','Empresas')
@section('FormularioDetalle','Empresas Registradas')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nueva Empresa"><a  href="{{ route('empresa.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Empresa</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Operaciones</th>
                <th style="text-align: center !important;">Nombre de la Empresa</th>
                <th style="text-align: center !important;">Nro. de NIT</th>
                <th style="text-align: center !important;">Nro. de Ministerio</th>
                <th style="text-align: center !important;">Caja Nacional</th>
                <th style="text-align: center !important;">Representante Legal</th>
                <th style="text-align: center !important;">Logo de la Empresa</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($empresa as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('empresa.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                        <span class="hint--top  hint--warning" aria-label="Ver Contenido"><a href="{{ route('empresa.show', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->emp_nombre }}</td>
                <td>{{ $item->emp_nit }}</td>
                <td>{{ $item->emp_empleador }}</td>
                <td>{{ $item->emp_caja }}</td>
                <td>{{ $item->empleado->em_nombre.' '.$item->empleado->em_paterno.' '.$item->empleado->em_materno }}</td>
                <td align="center"><img src="{{ asset($item->emp_imagen) }}" width="50px" height="30px"></td>
                <td align="center">
                    @if($item->emp_estado)
                        <span class="hint--top  hint--warning" aria-label="Empresa habilitada"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Empresa inhabilitada"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
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