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
								@if (session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
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
												<td><strong>Nombre: </strong></td>
												<td>{{ $nombreUsuario }}</td>
											</tr>
										</tbody>
									</table>									
								</div>	
								<form action="{{ route('homeCambio.cambiar', $c->id_ficha_cliente ) }}" method="post">
									<div class="card-body">
										{!! csrf_field() !!}
										{{-- {!! method_field('PUT') !!}										 --}}
		
										<div class="form-group">
											<label for="password" class="placeholder"><b>Contraseña Actual</b></label>
											<div class="position-relative">
												<input id="password" name="password1" type="password" placeholder="***************" autocomplete="off" class="form-control" required>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="placeholder"><b>Contraseña Nueva</b></label>
											<div class="position-relative">
												<input id="password" name="password2" type="password" placeholder="***************" autocomplete="off" class="form-control" required>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="placeholder"><b>Contraseña Nueva</b></label>
											<div class="position-relative">
												<input id="password" name="password3" type="password" placeholder="***************" autocomplete="off" class="form-control" required>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
											<br>
										</div>
									</div>
								</form>
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

