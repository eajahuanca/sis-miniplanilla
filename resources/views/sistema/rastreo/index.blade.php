@extends('template.layout')

@section('FormularioTitulo','Rastreos de Contenedores')
@section('FormularioDescripcion','en este formulario se pueden observar todos los rastreos registrados de contenedores')
@section('FormularioActual','Rastreo de Contenedores')
@section('FormularioDetalle','Mis contenedores registrados')

@section('stylesheet')
    <link href="{{ asset('archivos/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nuevo Rastreo de Contenedor"><a  href="{{ route('rastreo.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Rastreo de Contenedor</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Sigla del contenedor</th>
                <th style="text-align: center !important;">Arribo</th>
                <th style="text-align: center !important;">Último Movimiento</th>
                <th style="text-align: center !important;">Localización</th>
                <th style="text-align: center !important;">Barco</th>
                <th style="text-align: center !important;">Nro. de Viaje</th>
                <th style="text-align: center !important;">Estado</th>
                <th style="text-align: center !important;">Fecha Registro</th>
                <th style="text-align: center !important;">Fecha Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($rastreo as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar Rastreo"><a href="{{ route('rastreo.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->res_sigla }}</td>
                <td>{{ $item->res_fecha }}</td>
                <td>{{ $item->res_movimiento }}</td>
                <td>{{ $item->res_localizacion }}</td>
                <td>{{ $item->res_barco }}</td>
                <td>{{ $item->res_numviaje }}</td>
                <td align="center">
                    @if($item->res_estado)
                        <span class="hint--top  hint--warning" aria-label="Contenedor en Verificación"><button class="btn btn-warning btn-xs">Rastreando</button></span>
                    @else
                        <span class="hint--top  hint--success" aria-label="Contenedor Verificado"><button class="btn btn-success btn-xs">Verificado</button></span>
                    @endif
                </td>
                <td align="center">{{ $item->created_at->diffForHumans() }}</td>
                <td align="center">{{ $item->updated_at->diffForHumans() }}</td>
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