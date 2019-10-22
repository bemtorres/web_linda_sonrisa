@extends('perfil_cliente.layout')
@section('contenido')
@php
	$nClientes =1;
	$nConsultas = 100;
	$hola = "123123";
	$fecha = Carbon\Carbon::now()->format('Y-m-d');
	
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
									<p class="card-category">Próxima consulta</p>
								<h4 class="card-title">No tienes pendiente</h4>
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
										{{-- <p class="card-category">Reserva tu hora</p> --}}
									<h4 class="card-title">Reserva tu hora</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="{{ route('reservar-hora.index') }}">
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
