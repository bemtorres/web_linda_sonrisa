@extends('layout.layout')

@section('contenido')

<div class="content imgFondoPaciente">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Clientes</h4>
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
									<h4 class="card-title">Tabla de Beneficiados</h4>
									<a href="{{ route('cliente.create') }}" class="btn btn-info btn-round ml-auto"><i class="fa fa-plus">Nuevo Beneficiado</i></a>
								
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
										<th>Confirmado</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Run</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Confirmado</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
								
									@foreach ($clientes as $c)
									<tr>
										<td>{{ $c->run }}</td>
										<td>{{ $c->nombres . " " . $c->apellidos }}</td>
										<td>{{ $c->correo }}</td>
										@if ($c->bloqueo==1)
											<td> <span class="rounded bg-danger btn-sm text-white">Pendientes de documentos</span> </td>
										@else
											<td> <span class="rounded bg-success btn-sm text-white">Habilitado</span> </td>
										@endif
										<td>
											<a href="{{ route('cliente.edit', $c->id_ficha_cliente) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
											<a href="{{ route('cliente.documento', $c->id_ficha_cliente) }}" class="btn btn-warning"><i class="fas fa-file-pdf"></i></a>
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
	