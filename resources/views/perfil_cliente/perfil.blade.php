@extends('perfil_cliente.layout')
@php
	$regiones = App\Modelo\Region::get();
	$nombreUsuario = "";
	$id_usuario =0;
	if (auth('cliente')->check()){
		$nombreUsuario =  auth('cliente')->user()->nombres . " " . auth('cliente')->user()->apellidos ;
		$id_usuario =  auth('cliente')->user()->id_ficha_cliente;
		$c = App\Modelo\Ficha_cliente::where('id_ficha_cliente',$id_usuario)->first();
	}   
	 
@endphp
@section('contenido')
		<div class="content ">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Configuración</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="fas fa-cog"></i>
								</a>
							</li>
							
						</ul>
					</div>
					<div class="row ">
						
						<div class="col-md-6">
								@if (session('info'))
									<div class="alert alert-danger">
										{{ session('info') }}
									</div>
								@endif
							<div class="card">
								<div class="card-header">
									<div class="card-title">Perfil</div>
								</div>
							
									<div class="card-body">						

										<table>
											<tbody>
												<tr>
													<td><strong>Run: </strong></td>
													<td>{{ $c->run }}</td>
												</tr>
												<tr>
													<td><strong>Nombre: </strong></td>
													<td>{{ $nombreUsuario }}</td>
												</tr>
												<tr>
													<td><strong>Teléfono: </strong></td>
													<td>{{ $c->telefono }}</td>
												</tr>
												<tr>
													<td><strong>Correo: </strong></td>
													<td>{{ $c->correo }}</td>
												</tr>
												<tr>
													<td><strong>Región: </strong></td>
													<td>{{ $c->comuna->region->nombre_region }}</td>
												</tr>
												<tr>
													<td><strong>Comuna: </strong></td>
													<td>{{ $c->comuna->nombre_comuna }}</td>
												</tr>
											</tbody>
										</table>

									
									</div>
									
							</div>							
						</div>	
						<div class="col-md-6">
							<img src="/assets_home/images/Fondo/paciente_fondo.jpg" width="100%" alt="">
							<img src="/assets_home/images/Fondo/consulta-dentista.jpg" width="100%" alt="">
						</div>
						

					</div>
				</div>
			</div>
	
@stop

