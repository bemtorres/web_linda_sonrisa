@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Tipos de Productos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="/home">
						<i class="flaticon-home"></i>
					</a>
					
				</li>				
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Tabla de Tipos de Productos</h4>
							<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-plus"></i> Agregar Tipo Producto
							</button>
						</div>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Producto</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="{{ route('tipoproducto.store') }}" method="post">
										<div class="modal-body">		
											<div class="card-body">
												{!! csrf_field() !!}
												<div class="form-group">
													<label for="text1">Nombre Tipo de Producto</label>
													<input type="text" class="form-control" id="text1" name="nombre_tipo_producto" value="{{ old('nombre_tipo_producto') }}" required>
													{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											<button type="submit" class="btn btn-primary">Agregar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre</th>
										<th></th>
									</tr>
								</thead>
								{{-- <tfoot>
									<tr>
										<th>Nombre</th>
										<th></th>
									</tr>
								</tfoot> --}}
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($tipos as $t)
									<tr>
										<td>{{ $i }}</td>
										@php
											$i++;	
										@endphp
										<td>{{ $t->nombre_tipo_producto }}</td>
										<td>
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $t->id_tipo_producto }}">
													<i class="fa fa-edit"></i>
												</button>
												
												<!-- Modal -->
												<div class="modal fade" id="modal{{ $t->id_tipo_producto }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														</div>
														<form action="{{ route('tipoproducto.update' ,  $t->id_tipo_producto) }}" method="post">
																<div class="modal-body">		
																	<div class="card-body">
																		{!! csrf_field() !!}
																		{!! method_field('PUT') !!}
																		<div class="form-group">
																			<label for="text1">Nombre Tipo Producto</label>
																			<input type="text" class="form-control" id="text1" name="nombre_tipo_producto" value="{{  $t->nombre_tipo_producto }}" required>
																			{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																	<button type="submit" class="btn btn-primary">Guardar Cambios</button>
																</div>
														</form>
													</div>
													</div>
												</div>
										</td>
									</tr>
									@endforeach
						
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			

		</div>
	</div>
</div>
			
@stop
	