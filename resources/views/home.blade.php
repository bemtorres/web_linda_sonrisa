@extends('layout.layout')
@section('contenido')
@php
	
	$nClientes = App\Modelo\Ficha_cliente::count();
	$nEmpleadosAdmin = App\Modelo\Empleado::where('id_tipo_empleado',1)->count();
	$nEmpleadosEmpleado = App\Modelo\Empleado::where('id_tipo_empleado',2)->count();
	$nOdontologo = App\Modelo\Odontologo::count();
	$nProveedores = App\Modelo\Ficha_proveedor::count();
	$nConsultas = 100;

@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Bienvenido Administrador</h4>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Clientes Registrados</p>
								<h4 class="card-title">{{ $nClientes }}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-notes-medical"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Odontólogos</p>
								<h4 class="card-title">{{ $nOdontologo }}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="fas fa-cubes"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Proveedores</p>
									<h4 class="card-title">{{ $nProveedores }}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-people-carry"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Empleados</p>
								<h4 class="card-title">{{ $nEmpleadosEmpleado }}</h4>
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