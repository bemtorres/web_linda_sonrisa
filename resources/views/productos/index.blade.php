@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Productos</h4>
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
							<h4 class="card-title">Tabla de Productos</h4>
							<a href="{{ route('producto.create') }}" class="btn btn-primary btn-round ml-auto " ><i class="fa fa-plus"></i> Nuevo producto</a>
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
									@foreach ($familias as $f)
									<tr>
										<td>{{ $i }}</td>
										@php
											$i++;	
										@endphp
										<td>{{ $f->nombre_familia }}</td>
										<td>
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $f->id_familia }}">
													<i class="fa fa-edit"></i>
												</button>
												
												<!-- Modal -->
												<div class="modal fade" id="modal{{ $f->id_familia }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														</div>
														<form action="{{ route('familia.update' , $f->id_familia) }}" method="post">
																<div class="modal-body">		
																	<div class="card-body">
																		{!! csrf_field() !!}
																		{!! method_field('PUT') !!}
																		<div class="form-group">
																			<label for="text1">Nombre Familia</label>
																			<input type="text" class="form-control" id="text1" name="nombre_familia" value="{{ $f->nombre_familia }}" required>
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
	