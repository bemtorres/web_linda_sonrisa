@extends('perfil_cliente.layout')
@section('contenido')
@php
	$fecha = Carbon\Carbon::now()->format('Y-m-d');

	$nombreUsuario = "";
	$id_usuario =0;
	if (auth('cliente')->check()){
		$nombreUsuario =  auth('cliente')->user()->nombres;
		$id_usuario =  auth('cliente')->user()->id_ficha_cliente;
	}    
@endphp
<div class="content">
	<div class="page-inner ">
		<div class="page-header">
			<h4 class="page-title">Bienvenido</h4>
		</div>
		<div class="row">
			<div class="col-md-6">
				@if (isset($estado))
					@if ($estado==1)
						<div class="alert alert-success">
							Se ha agendado una hora correctamente.
						</div>
					@endif				
				@endif
				@if (session('info'))
					<div class="alert alert-danger">
						{{ session('info') }}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="card-title">Agenda tu hora con <strong>LindaSonrisa</strong></div>
					</div>
						
					<form action="{{ route('reservar-hora.store') }}" method="post">
						<div class="card-body">
							{!! csrf_field() !!}
							<input type="text" hidden name="id_cliente" value="{{ $id_usuario }}">
							<div class="form-group">
								<label for="text1">Servicio</label>
								<select class="form-control" id="id_servicio" name="id_servicio" required>
								@foreach ($servicios as $s)	
									<option value="{{ $s->id_servicio }}">{{ $s->nombre_servicio }}</option>
								@endforeach
								</select>
							</div>					
							<div class="form-group">
								<label for="text1">Fecha Agenda</label>
							<input type="date" class="form-control" id="fecha_agenda" name="fecha_agenda"  value="{{ $fecha }}" placeholder=""  onChange="CargarHorario()" min="{{ $fecha }}" max="2019-12-31" required>
								{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
							</div>
							<div class="form-group">
								<label for="text1">Hora Disponible</label>
								<select class="form-control" id="id_horario" name="id_horario"  required>
								</select>
							</div>									
						</div>
						<div class="card-action">
							<button type="submit" class="btn btn-success pull-right">Agendar Hora</button>
							<br>
						</div>
					</form>
				</div>							
			</div>	
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Nuestros Servicios</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link active show" id="id-ORTODONCIA" data-toggle="pill" href="#h-ORTODONCIA" role="tab" aria-controls="v-pills-profile" aria-selected="true">ORTODONCIA</a>
									<a class="nav-link" id="id-ODONTOLOGIA" data-toggle="pill" href="#h-ODONTOLOGIA" role="tab" aria-controls="v-pills-home" aria-selected="false">ODONTOLOGÍA GENERAL</a>
									<a class="nav-link" id="id-ODONTOPEDIATRIA" data-toggle="pill" href="#h-ODONTOPEDIATRIA" role="tab" aria-controls="v-pills-messages" aria-selected="false">ODONTOPEDIATRÍA</a>
									<a class="nav-link" id="id-IMPLANTOLOGIA" data-toggle="pill" href="#h-IMPLANTOLOGIA" role="tab" aria-controls="v-pills-messages" aria-selected="false">IMPLANTOLOGÍA</a>
									<a class="nav-link" id="id-PERIODONCIA" data-toggle="pill" href="#h-PERIODONCIA" role="tab" aria-controls="v-pills-messages" aria-selected="false">PERIODONCIA</a>
									<a class="nav-link" id="id-DISFUNCION" data-toggle="pill" href="#h-DISFUNCION" role="tab" aria-controls="v-pills-messages" aria-selected="false">DISFUNCIÓN</a>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="tab-content" id="v-pills-tabContent">
									<div class="tab-pane fade active show" id="h-ORTODONCIA" role="tabpanel" aria-labelledby="id-ORTODONCIA">
										<p>Especialidad que trata la alineación de los dientes y la resolución de problemas de mordida.</p>
									</div>
									<div class="tab-pane fade" id="h-ODONTOLOGIA" role="tabpanel" aria-labelledby="id-ODONTOLOGIA">
										<p>Cuando tienes dolor, caries, inflamación leve de las encías, o necesitas realizar un chequeo general.</p>
									</div>
									<div class="tab-pane fade" id="h-ODONTOPEDIATRIA" role="tabpanel" aria-labelledby="id-ODONTOPEDIATRIA">
										<p>Especialidad odontológica que trata el cuidado oral preventivo y terapéutico de niños y adolescentes.</p>
									</div>
									<div class="tab-pane fade" id="h-IMPLANTOLOGIA" role="tabpanel" aria-labelledby="id-IMPLANTOLOGIA">
										<p>Es bueno consultar cuando hay pérdida de uno o más dientes, para evaluar la posibilidad de sustituir.</p>
									</div>
									<div class="tab-pane fade" id="h-PERIODONCIA" role="tabpanel" aria-labelledby="id-PERIODONCIA">
										<p>Cuando tus encías están inflamadas o sangran al cepillarte los dientes, halitosis (mal olor en la cavidad bucal), o tienes piezas dentarias con movimiento.</p>
									</div>
									<div class="tab-pane fade" id="h-DISFUNCION" role="tabpanel" aria-labelledby="id-DISFUNCION">
										<p>Cuando hay desgaste de piezas dentaria. Dolor al morder, dolor de cabeza y de musculatura relacionada con la zona orofacial. Rechinamiento nocturno. Apnea del sueño.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@stop
@section('scripts')
	<script>
		CargarHorario();
        function CargarHorario() {
            var fecha = document.getElementById('fecha_agenda').value;
			console.log(fecha);
			
            web = "{{request()->getHttpHost()}}" ;
            url = 'http://' + web + '/verhorario/fecha/' + fecha;

            fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{
                    console.log(result);
                    console.log(url);
					var $select = $('#id_horario');
                    $select.find('option').remove();
                    // alert(options);
                    $.each(result, function(key,value) {
						if(value.activo==1){
							$select.append('<option value=' + value.id_horario + '>' + value.horario + '</option>');
						}else{
							$select.append('<option disabled="disabled" value=' + value.id_horario + '>' + value.horario + ' (reservado) </option>');
						}                     
                   });                    
            });
        }   
	</script>			
	
@stop