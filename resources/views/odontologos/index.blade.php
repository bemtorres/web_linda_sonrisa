@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Odontólogos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="/home">
						<i class="flaticon-home"></i>
					</a>
					
				</li>				
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Tabla de Odontólogo</h4>
							<a href="{{ route('odontologo.create') }}" class="btn btn-primary btn-round ml-auto " ><i class="fa fa-plus"></i> Nuevo Odontólogo</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Run</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Run</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
								
									@foreach ($odontologos as $o)
									<tr>
										<td>{{ $o->run }}</td>
										<td>{{ $o->nombres . " " . $o->apellidos }}</td>
										<td>{{ $o->correo }}</td>
										<td>
											<a href="{{ route('odontologo.edit', $o->id_odontologo) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
											
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEditar{{ $o->id_odontologo }}">
												<i class="fas fa-trash"></i>
											</button>		
											<!-- Modal -->
											<div class="modal fade" id="modalEditar{{ $o->id_odontologo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">¿Ocultar Odontólogo?</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>															
															<div class="modal-body">		
																<h3>¿Desea Eliminar al Odontólogo?</h3>
															</div>
															<div class="modal-footer">
																<form action="{{ route('odontologo.destroy' , $o->id_odontologo ) }}" method="post">
																	{!! csrf_field() !!}
																	{!! method_field('DELETE') !!}
																		

																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
																	<button type="submit" class="btn btn-primary">Sí</button>
																</form>
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
	