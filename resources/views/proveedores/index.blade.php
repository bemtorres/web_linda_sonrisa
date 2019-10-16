@extends('layout.layout')


@section('contenido')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Proveedores</h4>
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
									<h4 class="card-title">Tabla de Proveedores</h4>
									<a href="{{ route('proveedor.create') }}" class="btn btn-info btn-round ml-auto"><i class="fa fa-plus"> Nuevo Proveedor</i></a>
								
								</div>
							</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Nombre Empresa</th>
										<th>Rubro</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>									
										<th>Nombre Empresa</th>
										<th>Rubro</th>
										<th>Correo</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
									@foreach ($proveedores as $p)										
									<tr>
										<td>{{ $p->nombre_empresa }}</td>
										<td>{{ $p->rubro }}</td>
										<td>{{ $p->correo }}</td>
										<td>
											<a href="{{ route('proveedor.edit', $p->id_ficha_proveedor ) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
											<form action="{{ route('proveedor.destroy' , $p->id_ficha_proveedor ) }}" method="post">
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
	