@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Monitoreo de Productos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					{{-- <a href="/home">
						<i class="flaticon-home"></i>
					</a> --}}
					
				</li>				
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Tabla de Productos</h4>
						</div>
						<div class="col-md-6">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Descripción</th>
										<th>Color</th>
									</tr>
								</thead>
								<tbody >
									<tr>
										<td><strong>Stock > 0 y Stock <= Stock Critico</strong></td>
										<td class="bg-warning text-dark"><strong>Alerta se esta acabando</strong></td>
									</tr>
									<tr>
										<td><strong>Stock <= 0</strong></td>
										<td class="bg-danger text-white"><strong>No tenemos productos</strong></td>
									</tr>
								</tbody>
							</table>
						</div>

						
					
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre Producto</th>
										<th>Stock Disponible</th>
										<th>Stock Critico</th>
										{{-- <th></th> --}}
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($productos as $p)
									@php
										$text_color = "";
										$bg_color = "";
									
										if($p->stock>0 && $p->stock<=$p->stock_critico){
											$bg_color = "bg-warning";
											$text_color = "text-white";
										}	
										if ($p->stock<=0) {
											$bg_color = "bg-danger";
											$text_color = "text-white";
										}
									
									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td>{{ $i }}</td>
										@php
											$i++;	
										@endphp
										<td>{{ $p->nombre_producto }}</td>										
										<td>{{ $p->stock }}</td>
										<td>{{ $p->stock_critico }}</td>
										{{-- <td>
											<a href="{{ route('producto.edit', $p->id_producto ) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
											<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</td> --}}
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
	