@extends('layout.layout')

@section('contenido')
@php
	$productos = App\Modelo\Producto::get();
	$detalles = App\Modelo\Detalle_servicio::where('id_servicio',$servicio->id_servicio)->get();
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
			<h4 class="page-title">Productos del servicio </h4>
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
						<div class="card-title">Formulario de productos para el servicio <strong>{{ $servicio->nombre_servicio }}</strong></div>
						</div>
					
						<form action="{{ route('detalleservicio.store') }}" method="post">
							<div class="card-body">
								{!! csrf_field() !!}
								<input type="text" name="id_servicio" hidden value="{{ $servicio->id_servicio }}">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Producto</label>
									<select class="form-control" id="id_producto" name="id_producto" onChange="CargarProducto()" required>
										@foreach ($productos as $p)	
											@if ($p->activo==1)
												<option value="{{ $p->id_producto }}">{{ $p->nombre_producto }}</option>
											@else
												<option disabled value="{{ $p->id_producto }}">{{ $p->nombre_producto }} (Agregado)</option>
											@endif
										@endforeach
									</select>
									<small id="comentario">(Cantidad Stock: 0 , Stock Critico: 0 )</small>
								</div>
								
								<div class="form-group">
									<label for="text1">Cantidad a usar</label>
									<input type="number" class="form-control" id="text1" name="cantidad" value="1" required>
								</div>										
							</div>
							<div class="card-action">
								<a href="{{ route('servicio.index') }}" class="btn btn-danger">Volver</a>
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
										<th>Cantidad</th>
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
										<td>{{ $d->cantidad }}</td>
										<td>	
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal{{ $d->id_detalle_servicio }}">
												<i class="fa fa-edit"></i>
											</button>
														
													<!-- Modal -->
											<div class="modal fade" id="modal{{ $d->id_detalle_servicio }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Actualizar Cantidad de <strong>{{ $d->producto->nombre_producto }}</strong></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{ route('detalleservicio.update' ,  $d->id_detalle_servicio) }}" method="post">
															<div class="modal-body">		
																<div class="card-body">
																	{!! csrf_field() !!}
																	{!! method_field('PUT') !!}
																	<div class="form-group">
																		<label for="text1">Cantidad</label>
																		<input type="number" class="form-control" id="text1" name="cantidad" value="{{ $d->cantidad }}" required>
													
																		{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
																<button type="submit" class="btn btn-primary">Guardar Cambios</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										
											<form action="{{ route('detalleservicio.destroy',$d->id_detalle_servicio ) }}" method="post">
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
@section('scripts')
	<script>
		CargarProducto();
        function CargarProducto() {
            var id_producto = document.getElementById('id_producto').value;

            web = "{{request()->getHttpHost()}}" ;
            url = 'http://' + web + '/detalleservicios/cantidad/producto/' + id_producto;
            fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{
                    var $comentario = $('#comentario');
                    //alert(options);
                    
                       
					$comentario.html('(Cantidad Stock: '+ result.stock +' , Stock Critico: '+ result.stock_critico +' )');
                        
                        
                    // console.log(result);
                    
            });
        }
   
    </script>
@stop
