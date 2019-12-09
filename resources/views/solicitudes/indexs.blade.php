@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Solicitudes</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					{{-- <a href="/home">
						<i class="flaticon-home"></i>
					</a> --}}
					
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
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Tabla de Solicitudes</h4>
							<a href="{{ route('solicitud.nuevo') }}" class="btn btn-primary btn-round ml-auto " ><i class="fa fa-plus"></i> Nueva Orden</a>
						</div>	
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Código</th>
										<th>Fecha Creación</th>
										<th>Empleado</th>
										<th>Proveedor</th>
										<th>Estado</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($solicitudes as $s)
									@php
										$text_color = "";
										$bg_color = "";
									
										// if($s->activo==0){
										// 	$bg_color = "bg-warning";
										// 	$text_color = "text-white";
										// }	
										$proxima_fecha = date_format(date_create($s->created_at), 'd-m-Y');

									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td class="">{{ $s->codigo }}</td>							
										<td>{{ $proxima_fecha }}</td>	
										@php
											$nombre = "";
											// $nombreCompleto = $s->empleado->nombres . " " . $s->empleado->apellidos;
											$n = explode(" ", $s->empleado->nombres);
											// $nombre = $n[0] . " " . $n[2]; 
										@endphp
										<td>{{ $n[0] }}</td>
										<td>{{ $s->proveedor->nombre_empresa }}</td>
										<td> 
											@if ($s->enviado==0)
												<span class="rounded bg-warning btn-sm text-white">Pendientes</span>
												<a href="{{ route('solicitud.enviar',$s->id_orden_empleado) }}" class="btn btn-sm btn-success "><i class="far fa-check-circle"></i> Enviar</a>
												<span class="btn-sm btn btn-secondary" onclick="buscarProductos('{{ $s->codigo }}')"><i class="far fa-eye"></i> Ver</span>
									
											@else											 
												@if ($s->enviado==1)
													<span class="rounded bg-info btn-sm text-white">Enviado</span> 	
													<span class="btn-sm btn btn-secondary" onclick="buscarProductos('{{ $s->codigo }}')"><i class="far fa-eye"></i> Ver</span>
																					
												@else 
													<span class="rounded bg-success btn-sm text-white">Recibido</span> 
													<span class="btn-sm btn btn-secondary" onclick="buscarProductosListos('{{ $s->codigo }}')"><i class="far fa-eye"></i> Ver</span>
									
												@endif
											@endif
						
										</td>
										<td>	
										@if ($s->enviado==0)
											<span class=" btn btn-danger" onclick="eliminar('{{ $s->codigo }}')"><i class="fa fa-trash"></i> Eliminar</span>
											
										@else
											<a href="{{ route('recepcion.show',$s->id_orden_empleado) }}" class="btn btn-info "><i class="fas fa-box-open"></i> Recepción</a>										
										@endif
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

		{{-- <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i> Agregar Servicio
		</button> --}}

	<div class="modal fade" id="modalSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalles del pedido</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>				
				<div class="modal-body">		
					<div class="card-body">							
						<table id="table_nueva" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th>Nombre Producto</th>										
									<th>Stock Disponible/Critico</th>
									<th>Cantidad Solicitada</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>123</td>
									<td>123123</td>
									<td>Nombre</td>
								</tr>								
							</tbody>
						</table>							
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalSolicitudLista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalles del pedido</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>				
				<div class="modal-body">		
					<div class="card-body">							
						<table id="table_nueva_lista" class="display table table-striped table-hover table-sm" >
							<thead>
								<tr>									
									<th>Nombre Producto</th>										
									<th>Stock Disponible/Critico</th>
									<th>Cantidad Solicitada</th>									
									<th>Cantidad Recibida</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<tr>									
									<td>123123</td>
									<td>Nombre</td>
									<td>Nombre</td>
									<td>10</td>
									<td>
										<span class="rounded bg-success btn-sm text-white"><i class="fas fa-check-circle"></i></span>
									</td>
								</tr>
								<tr>									
									<td>123123</td>
									<td>Nombre</td>
									<td>Nombre</td>
									<td>10</td>
									<td>
										<span class="rounded bg-danger btn-sm text-white"><i class="flaticon-error"></i></span>
									</td>
								</tr>									
							</tbody>
						</table>							
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>		
	<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Eliminar La solicitud</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('detallesolicitud.eliminar') }}" method="post">
					<div class="modal-body">		
						<div class="card-body">								
							{!! csrf_field() !!}
							<h3>¿Desea eliminar el servicio código <strong><span id="codigo_span"></span></strong>?</h3>
							<input type="text" hidden id="codigo_orden" name="codigo_orden">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Sí</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
@stop
	
@section('scripts')
<script>
	// buscarProductoOrden();
	
	
	function RemoveRow (nombre_tabla) {
		var tableHeaderRowCount = 1;
		var table = document.getElementById(nombre_tabla);
		var rowCount = table.rows.length;
		for (var i = tableHeaderRowCount; i < rowCount; i++) {
			table.deleteRow(tableHeaderRowCount);
		}
    }
	function buscarProductos(id) {
        
        web = "{{request()->getHttpHost()}}" ;
        url = 'http://' + web + '/ordenpedido/codigo/' + id;
         
		fetch(url)
            .then(resp=>{
                return resp.json();
            }).then(result =>{     
                   
				RemoveRow('table_nueva');
					
					
                $.each(result, function(key,value) {
					$('#table_nueva tbody').append(
						'<tr><td>'+value.nombre_producto+'</td><td>'+value.stock+'/'+value.stock_critico+'</td><td>'+value.cantidad+'</td></tr>'
					)
				});

                // console.log(result);
				$('#modalSolicitud').modal('show');
            });
	
    }

	function buscarProductosListos(id) {
        
        web = "{{request()->getHttpHost()}}" ;
        url = 'http://' + web + '/ordenpedido/codigo/' + id;
         
		fetch(url)
            .then(resp=>{
                return resp.json();
            }).then(result =>{     
                   
				RemoveRow('table_nueva_lista');
				
				span_success = "<span class=\"rounded bg-success btn-sm text-white\"><i class=\"fas fa-check-circle\"></i></span>";
				span_danger  = "<span class=\"rounded bg-danger btn-sm text-white\"><i class=\"flaticon-error\"></i></span>";
								
					
                $.each(result, function(key,value) {
					span="";
					if(value.entregado==0){
						cant = "--";
						span = span_danger;
					}else{
						cant = value.cantidad_recibida;
						span = span_success;
					}
					$('#table_nueva_lista tbody').append(
						

						'<tr><td>'+value.nombre_producto+'</td><td>'+value.stock+'/'+value.stock_critico+'</td><td>'+value.cantidad+'</td><td>'+cant+'</td><td>'+span+'</td></tr>'
					)
				});

                // console.log(result);
				$('#modalSolicitudLista').modal('show');
            });
	
    }

	function eliminar(code) {
		$('#codigo_orden').val(code);
		$('#codigo_span').html(code);		
		$('#modalEliminar').modal('show');
	}

	// $('#modalSolicitudLista').modal('show');
	
</script>
@stop