@extends('perfil_cliente.layout')
@section('contenido')
@php
	$fecha_hoy = Carbon\Carbon::now()->format('Y-m-d');
	$id_usuario =0;
	if (auth('cliente')->check()){
		$nombreUsuario =  auth('cliente')->user()->nombres;
		$id_usuario =  auth('cliente')->user()->id_ficha_cliente;
	}    
	$r = App\Modelo\Reservar_hora::where([ 
		['id_ficha_cliente', '=', $id_usuario],
		['id_estado_reserva','=', '1']])->first();

	$proxima_fecha = "";
	$servicio = "No tienes pendiente";
	
	if(isset($r)){
		
		$proxima_fecha = date_format(date_create($r->fecha_reserva), 'd-m-Y') . " " . $r->horario->horario;
		$servicio = $r->servicio->nombre_servicio;
	}
@endphp
<div class="content">
	<div class="page-inner ">
		<div class="page-header">
		<h4 class="page-title">Bienvenido</h4>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-info-circle"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Próxima consulta {{ $servicio }}</p>
								<h4 class="card-title">{{ $proxima_fecha  }} </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<a href="{{ route('reservar-hora.index') }}">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-calendar-plus"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
									<h4 class="card-title">Reserva tu hora</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="{{ route('cliente.historial') }}">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="far fa-calendar-alt"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Historial Medico</p>
									<h4 class="card-title">Ver historial de consultas</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>	
	</div>
</div>
@stop
