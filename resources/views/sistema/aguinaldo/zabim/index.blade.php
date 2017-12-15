@extends('template.layout')

@section('FormularioTitulo','Aguinaldos de la empresa Zabim SRL.')
@section('FormularioDescripcion','en este formulario se pueden observar todos los pagos a empleados, con referente a aguinaldos')
@section('FormularioActual','Aguinaldos')
@section('FormularioDetalle','Aguinaldos Registrados')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nuevo Aguinaldo de Zabim S.R.L."><a  href="{{ route('aguinaldoZabim.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Aguinaldo Zabim S.R.L.</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%" style="font-size:10px">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Operaciones</th>
                <th style="text-align: center !important;">Nombre del Empleado</th>
                <th style="text-align: center !important;">Meses/Gestión</th>
                <th style="text-align: center !important;">Fecha de Registro</th>
                <th style="text-align: center !important;">Haber Básico</th>
                <th style="text-align: center !important;">Bono Antiguedad</th>
                <th style="text-align: center !important;">Bono Producción</th>
                <th style="text-align: center !important;">Otros Bonos</th>
                <th style="text-align: center !important;">Total Ganado</th>
                <th style="text-align: center !important;">Liquido Pagable</th>
                <th style="text-align: center !important;">Tipo</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($aguinaldo as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        @if($item->agui_estado)
                            <span class="hint--top  hint--error" aria-label="Obtener Boleta de Aguinaldo de: {{ $item->nombre_empleado }}"><a href="{{ url('/bpZabim', $item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-file"></i></a></span>
                        @endif
                        <span class="hint--top  hint--info" aria-label="Actualizar Aguinaldo de: {{ $item->nombre_empleado }}"><a href="{{ route('aguinaldoZabim.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                        <span class="hint--top  hint--warning" aria-label="Ver Aguinaldo de: {{ $item->nombre_empleado }}"><a href="{{ route('aguinaldoZabim.show', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->nombre_empleado }}</td>
                <td>{{ $item->agui_meses }}</td>
                <td>{{ $item->created_at }}</td>

                <td align="right">{{ number_format($item->agui_sueldo,2,',','.').' Bs.'}}</td>
                <td align="right">{{ number_format($item->agui_bono,2,',','.').' Bs.' }}</td>
                <td align="right">{{ number_format($item->agui_produccion,2,',','.').' Bs.' }}</td>
                <td align="right">{{ number_format($item->agui_otrobono,2,',','.').' Bs.' }}</td>
                <td align="right">{{ number_format($item->agui_totalganado,2,',','.').' Bs.' }}</td>
                <td align="right">{{ number_format($item->agui_totalliquido,2,',','.').' Bs.' }}</td>

                <td align="right">{{ $item->agui_tipo_empleado }}</td>
                <td align="center">
                    @if($item->agui_estado)
                        <span class="hint--top  hint--warning" aria-label="Aguinaldo habilitado"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Aguinaldo inhabilitado"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
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