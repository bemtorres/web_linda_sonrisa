@extends('layout.layout')


@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Odontólogos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{ route('home') }}">
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
									<h4 class="card-title">Tabla de Odontólogos</h4>
									<a href="{{ route('empleado.create') }}" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus">Nuevo Odontólogo</i></a>
								
								</div>
							</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Run</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>									
										<th>Run</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
									@foreach ($empleados as $e)
										@if ($e->id_tipo_user==1)
											@continue
										@endif
									<tr>
										<td>{{ $e->run }}</td>
										<td>{{ $e->nombres }}</td>
										<td>{{ $e->apellidos }}</td>
										<td>{{ $e->correo }}</td>
										<td>
											<a href="{{ route('empleado.edit', $e->id_user ) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
											<form action="{{ route('empleado.destroy' , $e->id_user ) }}" method="post">
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}
													<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
												</form>
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
	