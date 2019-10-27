@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Servicios</h4>
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
							<h4 class="card-title">Tabla Servicios</h4>
							<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-plus"></i> Agregar Servicio
							</button>
						</div>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="{{ route('servicio.store') }}" method="post">
										<div class="modal-body">		
											<div class="card-body">
												{!! csrf_field() !!}
												<div class="form-group">
													<label for="text1">Nombre Servicio</label>
													<input type="text" class="form-control" autofocus id="text1" name="nombre_servicio" value="{{ old('nombre_servicio') }}" required>
													{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
													<input type="check" class="hidden" hidden id="text1" name="mostrar" value="1" required>
													
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
										<th>Disponible</th>
										<th>Nombre servicio</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($servicios as $s)
									<tr>
										<td>{{ $i }}</td>
										@php
											$i++;	
										@endphp
										<td>
											@if ($s->mostrar==1)
												<button type="button" class="btn btn-success btn-small btn-rounded" data-toggle="modal" data-target="#modalEditar{{ $s->id_servicio }}">
													<i class="fas fa-check-circle"></i>
												</button>		
												<!-- Modal -->
												<div class="modal fade" id="modalEditar{{ $s->id_servicio }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">¿Ocultar Servicio?</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>															
																<div class="modal-body">		
																	<h3>¿Desea ocultar servicio?</h3>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
																	{{-- <button type="submit" class="btn btn-primary">Sí</button> --}}
																	<a href="{{ route('servicio.mostrar' ,  $s->id_servicio) }}" class="btn btn-primary">Sí</a>
																</div>
															</form>
														</div>
													</div>
												</div>												
											@else											
												<button type="button" class="btn btn-danger btn-small btn-rounded" data-toggle="modal" data-target="#modalEditarValido{{ $s->id_servicio }}">
													<i class="fas fa-times"></i>
												</button>		
												<!-- Modal -->
												<div class="modal fade" id="modalEditarValido{{ $s->id_servicio }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">¿Mostrar Servicio?</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="{{ route('servicio.update' ,  $s->id_servicio) }}" method="post">
																<div class="modal-body">		
																	<div class="card-body">
																		{!! csrf_field() !!}
																		{!! method_field('PUT') !!}
																		{{-- forma 2 --}}
																		<h3>¿Desea ocultar servicio?</h3>
																		<input type="text" hidden class="form-control" id="text1" name="nombre_servicio" value="{{  $s->nombre_servicio }}" required>
																		<input type="check" class="hidden" hidden id="text1" name="mostrar" value="1" required>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
																	<button type="submit" class="btn btn-primary">Sí</button>
																</div>
															</form>
														</div>
													</div>
												</div>				
											@endif
										</td>
										<td>{{ $s->nombre_servicio }}</td>
										<td>
																					
											<a href="{{ route('servicio.ver', $s->id_servicio) }}" class="btn btn-warning"><i class="fas fa-folder-open"></i></a>
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $s->id_servicio }}">
												<i class="fa fa-edit"></i>
											</button>
												
											<!-- Modal -->
											<div class="modal fade" id="modal{{ $s->id_servicio }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Actualizar Servicio</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{ route('servicio.update' ,  $s->id_servicio) }}" method="post">
															<div class="modal-body">		
																<div class="card-body">
																	{!! csrf_field() !!}
																	{!! method_field('PUT') !!}
																	<div class="form-group">
																		<label for="text1">Nombre Servicio</label>
																		<input type="text" class="form-control" id="text1" name="nombre_servicio" value="{{  $s->nombre_servicio }}" required>
																	
																		{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
																	</div>
																	<input type="check" class="hidden" hidden id="text1" name="mostrar" value="1" required>
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
	

@section('scripts')	
	@if (session('info'))		
		<script>
		$.bootstrapGrowl( {{ session('info') }}, {
			ele: 'body', // which element to append to
			type: 'info', // (null, 'info', 'error', 'success')
			offset: {from: 'top', amount: 60}, // 'top', or 'bottom'
			align: 'right', // ('left', 'right', or 'center')
			width: 250, // (integer, or 'auto')
			delay: 1000,
			allow_dismiss: true,
			stackup_spacing: 10 // spacing between consecutively stacked growls.
		});
		</script>		
	@endif	
@endsection