@extends('layout.layout')

@section('contenido')
@php
	$productos = App\Modelo\Producto::get();

	$detalles = App\Modelo\Detalle_proveedor::where('id_ficha_proveedor',$proveedor->id_ficha_proveedor)->get();
	foreach ($productos as $p) {
		foreach ($detalles as $d) {
			if ($d->id_producto==$p->id_producto) {
				$p->activo = 0;
			}
		}
	}
@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Productos del Proveedor </h4>
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
					@if (session('info'))
						<div class="alert alert-danger">
							{{ session('info') }}
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<div class="card">
						<div class="card-header">
						<div class="card-title">Formulario de productos para el proveedor <strong>{{ $proveedor->nombre_proveedor }}</strong></div>
						</div>
					
						<form action="{{ route('detalleproveedor.store') }}" method="post">
							<div class="card-body">
								{!! csrf_field() !!}
								<input type="text" name="id_ficha_proveedor" hidden value="{{ $proveedor->id_ficha_proveedor }}">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Producto</label>
									<select class="form-control" id="id_producto" name="id_producto" required>
										@foreach ($productos as $p)	
											@if ($p->activo==1)
												<option value="{{ $p->id_producto }}">{{ $p->nombre_producto }}</option>
											@else
												<option disabled value="{{ $p->id_producto }}">{{ $p->nombre_producto }} (Agregado)</option>
											@endif
										@endforeach
									</select>
									
								</div>																	
							</div>
							<div class="card-action">
								<a href="{{ route('proveedor.index') }}" class="btn btn-danger">Volver</a>
								<button type="submit" class="btn btn-success pull-right">Agregar</button>
							</div>
						</form>
					</div>							
				</div>

				
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Productos agregados</h4>	
													
						</div>
						<table>
							<tbody>
								<tr>
									{{-- <td>Cliente: </td>
									<td>{{ $cliente->nombres . " " . $cliente->apellidos }}</td> --}}
								</tr>	
								{{-- <tr>
									<td>Cliente </td>
									<td>
										<a href="" class="btn btn-warning btn-sm pull-right"><i class="fas fa-folder-open"></i></a>
									</td>
									</tr>	 --}}
								
							</tbody>
						</table>
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
								<tbody>
									@php
										$i=1;
									@endphp
									@foreach ($detalles as $d)
									<tr>
										<td>{{ $i }}</td>
										@php
											$i+=1;
										@endphp
										<td>{{ $d->producto->nombre_producto }}</td>
										<td>											
										
											<form action="{{ route('detalleproveedor.destroy',$d->id_detalle_proveedor ) }}" method="post">
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

