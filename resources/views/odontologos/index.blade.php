@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Odontologos</h4>
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
									<h4 class="card-title">Tabla de Odontologo</h4>
									<a href="{{ route('cliente.create') }}" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus">Nuevo Beneficiado</i></a>
								
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
								
									@foreach ($odontologo as $o)
									<tr>
										<td>{{ $o->run }}</td>
										<td>{{ $o->nombres . " " . $o->apellidos }}</td>
										<td>{{ $o->correo }}</td>
										<td>
											<a href="{{ route('odontologo.edit', $o->id_odontologo) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
											{{-- <a href="{{ route('cliente.edit', $c->id_ficha_cliente) }}" class="btn btn-warning"><i class="fa fa-file"></i></a> --}}
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
	