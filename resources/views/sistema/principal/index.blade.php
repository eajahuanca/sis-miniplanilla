@extends('template.layout')

@section('FormularioTitulo','Calendario')
@section('FormularioDescripcion','mi calendario personal')
@section('FormularioActual','Calendario')
@section('FormularioDetalle','Calendario Personal de Actividades')

@section('stylesheet')
    <link rel='stylesheet' href="{{ URL::asset('fullcalendar/lib/cupertino/jquery-ui.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
@endsection

@section('ContenidoPagina')
        		
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('principal.create') }}" class="btn btn-primary btn-block hint--top  hint--info" aria-label="Adicionar nueva Actividad"><i class="fa fa-plus"></i> Adicionar Actividad</a>
            <br>
            <br>
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">Actividades Recientes</h4>
                </div>
                <div class="box-body">
                    <div id="external-events">
                        @foreach($eventos as $item)
                        <span class="hint--top  hint--info" aria-label="{{ $item->tipoevento->te_nombre }}">
                            <div class="external-event btn-block" style="font-size:12px;color:#FFFFFF;background:{{ $item->tipoevento->te_color }}">{!! $item->descripcion !!}</div>
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary box-solid">
                <div class="box-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
      		
@endsection

@section('javascript')
	<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locale/es.js') }}"></script>

    <script>
        $(document).ready(function () 
        {
         	_modal = $('#myModal');

         	var date = new Date();
        	var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        	$('#calendar').fullCalendar({
                navLinks: true,
        		eventLimit: true,
          		header: {
		            left: 'prev,next today',
		            center: 'title',
		            right: 'month,agendaDay,listDay,listWeek,listMonth'
          		},
          		buttonText: {
            		today: 'Hoy',
          		},
                views: {
                    month: { buttonText: 'Mes' },
                    agendaDay: { buttonText: 'Dia' },
                    listDay: { buttonText: 'Listar Dias' },
                    listWeek: { buttonText: 'Listar Semana' },
                    listMonth: { buttonText: 'Listar Mes' }
                },
                defaultView: 'month',
          		events: [
		           	@foreach($eventos as $item)
                    {
                        title: '{{ $item->lugar." - ".$item->descripcion }}',
                        start: '{{ $item->fecha }}',
                        url: '{{ $item->id }}',
                        backgroundColor: "{{ $item->tipoevento->te_color }}",
                        borderColor: "{{ $item->tipoevento->te_color }}",
                        textColor: "#FFFFFF"
                    },
                    @endforeach
          		],

          		eventClick: function(event)
          		{
                	if (event.url)
                	{
                		$.ajax({
                			url: "{{ url('/showEvent') }}"+"/"+event.url,
                            type: 'GET',
                			success:function(response)
                			{
                    			_modal.find('#myModalLabel').html('Detalle de la Actividad');
                    			_modal.find('.modal-body').html(response);
                    			_modal.modal('show');
                			}
            			});
                		return false;
                	}
          		},
          		editable: false,
          		droppable: false,
        	});
      	});
	</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
        	<div class="modal-body" id="modal-bodyku"></div>
            <div class="modal-footer btn-warning" id="modal-footerq">
            	<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection