@extends('layout.layout')


@section('contenido')

<div class="content imgFondoEmpleado">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Empleados</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="/home">
						<i class="flaticon-home"></i>
					</a>
					
				</li>				
			</ul>
		</div>
		
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Tabla de Empleados</h4>
									<a href="{{ route('empleado.create') }}" class="btn btn-primary btn-round ml-auto " ><i class="fa fa-plus"></i> Nuevo Empleado</a>
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
									@foreach ($empleados as $e)										
									<tr>
										<td>{{ $e->run }}</td>
										<td>{{ $e->nombres . " " . $e->apellidos }}</td>
										<td>{{ $e->correo }}</td>
										<td>
											<a href="{{ route('empleado.edit', $e->id_empleado ) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
											<form action="{{ route('empleado.destroy' , $e->id_empleado ) }}" method="post">
												{!! csrf_field() !!}
												{!! method_field('DELETE') !!}
												{{-- <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
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
	