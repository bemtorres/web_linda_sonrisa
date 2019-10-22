@extends('perfil_cliente.layout')
@section('contenido')
@php
	$nClientes =1;
	$nConsultas = 100;
	$hola = "123123";
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
									<i class="far fa-calendar-alt"></i>
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
					@if (session('info'))
						<div class="alert alert-danger">
							{{ session('info') }}
						</div>
					@endif
					<div class="card">
						<div class="card-header">
							<div class="card-title">Formulario Nuevo Odontólogo</div>
						</div>
					
						<form action="{{ route('odontologo.store') }}" method="post">
							<div class="card-body">
								{!! csrf_field() !!}
								<div class="form-group">
									<label for="text1">Servicio</label>
									<select class="form-control" id="id_region" name="id_region" onChange="CargarComuna()" required>
										@foreach ($servicios as $s)	
											<option value="{{ $s->id_servicio }}">{{ $s->nombre_servicio }}</option>
										@endforeach
									</select>
								</div>
								
								<div class="form-group">
									<label for="text1">Fecha</label>
									<input type="date" class="form-control" id="text1" name="correo"  value="{{ old('correo') }}" placeholder="" required>
									{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								</div>
								<div class="form-group">
									<label for="text1">Hora Disponible</label>
									<input type="date" class="form-control" id="text1" name="correo"  value="{{ old('correo') }}" placeholder="" required>
									{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								</div>
														
							</div>
							<div class="card-action">
								<button type="submit" class="btn btn-success pull-right">Agregar</button>
								<br>
							</div>
						</form>
					</div>							
				</div>	
		</div>	
	</div>
</div>
@stop