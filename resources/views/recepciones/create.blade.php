@extends('layout.layout')

@section('contenido')
@php
$id_empleado = 0;
if (auth('empleado')->check()){
	$id_empleado =  auth('empleado')->user()->id_empleado;
}    

$detalles = App\Modelo\Detalle_orden::where('id_orden_empleado',$o->id_orden_empleado)->get();

@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Recepción de Productos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{ route('ordenempleado.index') }}">
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
						<div class="card-title">Detalle Orden </strong></div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table border="1" class="display table table-striped table-hover table-bordered" >
								<tbody>						
									<tr>										
										<td>Código</td>
										<td>{{ $o->codigo }}</td>
									</tr>
									<tr>										
										<td>Fecha</td>
										<td>{{ $o->created_at }}</td>
									</tr>
									<tr>										
										<td>Proveedor</td>
										<td>{{ $o->proveedor->nombre_empresa }}</td>
									</tr>
									<tr>						
										<td>Solicitado por</td>
										<td>{{ $o->empleado->nombres . " " . $o->empleado->apellidos }}</td>
									</tr>
									@if ($o->enviado==2)
									<tr>						
										<td>Recibido por</td>
										<td>{{ $o->empleado_r->nombres . " " . $o->empleado_r->apellidos }}</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-action">	
						<a href="{{ route('ordenpedido.index') }}" class="btn btn-danger">Volver</a>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				@if ($o->enviado==2)
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Productos Solicitados</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table border="1" class="display table  table-bordered" >
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre Producto</th>
										<th>Stock Disponible/Crítico</th>
										<th>Cantidad solicitada</th>
										<th>Cantidad Recibida</th>
										<th>¿Recepcionado?</th>
									</tr>
								</thead>
								<tbody>
								@php
									$i = 1;
								@endphp
								@foreach ($detalles as $d)								
									<tr>		
										<td>{{ $i }}</td>
										@php
											$i +=1;
										@endphp								
										<td>{{ $d->producto->nombre_producto }}</td>										
										<td>{{ $d->producto->stock }}/{{ $d->producto->stock_critico }}</td>
										<td>{{ $d->cantidad }}</td>
										@php
											$cantidad = 0 ; 
											if($d->entregado==1){
												$cantidad = $d->cantidad_recibida;
											}
										@endphp
										<td>{{ $cantidad }}</td>
										<td>
											@if ($d->entregado==1)
												<span class="rounded bg-success btn-sm text-white"><i class="fas fa-check-circle"></i></span>
											@else
												<span class="rounded bg-danger btn-sm text-white"><i class="flaticon-error"></i></span>
											@endif
										</td>
									</tr>
								@endforeach										
								</tbody>
							</table>
						</div>						
					</div>
					
					
				</div>
				@else
				<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Productos Solicitados</h4>
							</div>
						</div>
						<form action="{{route('recepcion.update',$o->id_orden_empleado )}}" method="post">	
							{!! csrf_field() !!}
							{!! method_field('PUT') !!}
							<input type="text" hidden name="id_empleado_r" value="{{ $id_empleado }}">
							<div class="card-body">
								<div class="table-responsive">
									<table border="1" class="display table  table-bordered" >
										<thead>
											<tr>
												<th>#</th>
												<th>Nombre Producto</th>
												<th>Stock Disponible/Crítico</th>
												<th>Cantidad solicitada</th>
												<th>¿Recepcionado?</th>
												<th>Cantidad Recibida</th>
											</tr>
										</thead>
										<tbody>
											@php
												$i = 1;
											@endphp
											@foreach ($detalles as $d)								
											<tr>		
												<td>{{ $i }}</td>
												@php
													$i +=1;
												@endphp								
												<td>{{ $d->producto->nombre_producto }}</td>										
												<td>{{ $d->producto->stock }}/{{ $d->producto->stock_critico }}</td>
												<td>{{ $d->cantidad }}</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" name="listado[]" type="checkbox" id="check_{{$d->id_detalle_orden}}" value="{{ $d->id_detalle_orden }}" onclick="checkRequiered(this.id)">
															<span class="form-check-sign"></span>
														</label>
													</div>
												</td>
												<td>
													<div class="form-group">
														{{-- <label for="text1">Telefono</label> --}}
													<input type="number" class="form-control" disabled id="cantidad_{{ $d->id_detalle_orden }}" name="cantidad_{{ $d->id_detalle_orden }}" value="" placeholder="" required>
														{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
													</div>
												</td>
											</tr>
											@endforeach										
											</tbody>
									</table>
								</div>
								<div class="card-action">	
									<a href="{{ route('ordenpedido.index') }}" class="btn btn-danger">Volver</a>
									<button type="submit" class="btn btn-success pull-right">Aceptar Recepción</button>
								</div>
							</div>
						</form>
					
					</div>
				@endif
			</div>
		</div>		
	</div>
</div>
@stop
@section('scripts')
<script>

	function checkRequiered(nombre) {
		// console.log(nombre);
		var id = nombre.split('_');
		// console.log(id[1]);

		const checkbox = document.getElementById(nombre);
		
		var input = document.getElementById('cantidad_'+id[1]);

		checkbox.addEventListener('change', (event) => {
			if (event.target.checked) {
				// alert('checked');
				console.log("si");
				input.setAttribute("required", true);
				input.removeAttribute("disabled"); 
			} else {
				// alert('not checked');
				console.log("no");
				input.removeAttribute("required"); 
				input.setAttribute("disabled", true);
			}
		})
	}

	
		
	
	
</script>
@stop