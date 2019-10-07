@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Clientes</h4>
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
									<h4 class="card-title">Tabla de Beneficiados</h4>
									<a href="" class="btn btn-success btn-round ml-auto"><i class="fa fa-plus">Nuevo Beneficiado</i></a>
								
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
										<th>Cant de registros</th>
										<th>Cant Cancelados</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Run</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Cant de registros</th>
										<th>Cant Cancelados</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
								
									
						
									
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
	