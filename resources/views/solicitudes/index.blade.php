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
							<a href="{{ route('producto.create') }}" class="btn btn-primary btn-round ml-auto " ><i class="fa fa-plus"></i> Nuevo producto</a>
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
	