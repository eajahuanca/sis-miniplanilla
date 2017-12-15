@extends('template.layout')

@section('FormularioTitulo','Usuarios del Sistema')
@section('FormularioDescripcion','listado de todos los usuarios registrados en Sistema')
@section('FormularioActual','Usuarios')
@section('FormularioDetalle','Usuarios')

@section('stylesheet')
    <link href="{{ asset('archivos/chosen/chosen.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar Nuevo Usuario"><a  href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Usuario</a></span>
            </div>
        </div>
    </div>
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Nombre del Empleado</th>
                <th style="text-align: center !important;">Fotografia</th>
                <th style="text-align: center !important;">Cuenta de Usuario</th>
                <th style="text-align: center !important;">Correo Electrónico</th>
                <th style="text-align: center !important;">Estado</th>
                <th style="text-align: center !important;">Fecha de Registro</th>
                <th style="text-align: center !important;">Fecha de Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($user as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->empleado->em_nombre.', '.$item->empleado->em_paterno.' '.$item->empleado->em_materno.' '.$item->empleado->em_especial }}</td>
                <td align="center"><img src="{{ asset($item->usuario_fotografia) }}" width="40px" height="40px"></td>
                <td>{{ $item->usuario_cuenta }}</td>
                <td>{{ $item->email}}</td>                
                <td align="center">
                    @if($item->usuario_estado)
                        <span class="hint--top  hint--warning" aria-label="Usuario habilitada"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Usuario inhabilitada"><button class="btn btn-danger btn-xs">Inhabilitado</button></span>
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
    <script src="{{ asset('archivos/chosen/chosen.jquery.min.js') }}"></script>
    <!-- chosen load-->
    <script type="text/javascript">
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, Sin Resultados!'},
            '.chosen-select-width'     : {width:"100%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
    <!-- /chosen -->
@endsection