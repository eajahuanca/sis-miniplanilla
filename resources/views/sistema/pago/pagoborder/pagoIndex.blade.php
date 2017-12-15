@extends('template.layout')

@section('FormularioTitulo','Pagos de la empresa BBS SRL.')
@section('FormularioDescripcion','en este formulario se pueden observar todos los pagos a empleados')
@section('FormularioActual','Pagos')
@section('FormularioDetalle','Pagos Registrados')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nuevo Pago de BBS"><a  href="{{ route('pagoBorder.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Pago BBS</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%" style="font-size:11px">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Operaciones</th>
                <th style="text-align: center !important;">Nombre del Empleado</th>
                <th style="text-align: center !important;">Mes de Pago</th>
                <th style="text-align: center !important;">Sueldo Básico</th>
                <th style="text-align: center !important;">Salario Ganado</th>
                <th style="text-align: center !important;">Bono Antiguedad</th>
                <th style="text-align: center !important;">Total Ganado</th>
                <th style="text-align: center !important;">AFP (12.71%)</th>
                <th style="text-align: center !important;">Total Descuentos</th>
                <th style="text-align: center !important;">Liquido Pagable</th>
                <th style="text-align: center !important;">Tipo</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($pago as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        @if($item->pag_estado)
                            <span class="hint--top  hint--error" aria-label="Obtener Boleta de Pago de: {{ $item->nombre_empleado }}"><a href="{{ url('/boletabr', $item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-file"></i></a></span>
                        @endif
                        <span class="hint--top  hint--info" aria-label="Actualizar Pago de: {{ $item->nombre_empleado }}"><a href="{{ route('pagoBorder.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                        <span class="hint--top  hint--warning" aria-label="Ver Pago de: {{ $item->nombre_empleado }}"><a href="{{ route('pagoBorder.show', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->nombre_empleado }}</td>
                <td>{{ $item->pago_mes }}</td>
                <td align="right">{{ $item->em_sueldo_basico.' Bs.'}}</td>
                <td align="right">{{ $item->pag_sueldo.' Bs.' }}</td>
                <td align="right">{{ $item->pag_bono_antiguedad.' Bs.' }}</td>
                <td align="right">{{ $item->pag_total_ganado.' Bs.' }}</td>
                <td align="right">{{ $item->pag_afp.' Bs.' }}</td>
                <td align="right">{{ $item->pag_total_descuento.' Bs.' }}</td>
                <td align="right">{{ $item->pag_total_liquido.' Bs.' }}</td>
                <td align="right">{{ $item->pag_tipo_empleado }}</td>
                <td align="center">
                    @if($item->pag_estado)
                        <span class="hint--top  hint--warning" aria-label="Pago habilitado"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Pago inhabilitado"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
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