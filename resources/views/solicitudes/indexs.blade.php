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
										<th></th>
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

									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td>{{ $s->codigo }}</td>							
										<td>{{ $s->created_at }}</td>	
										<td>{{ $s->empleado->nombres . " " . $s->empleado->apellidos }}</td>
										<td>{{ $s->proveedor->nombre_empresa }}</td>
										@if ($s->enviado==0)
											<td> <span class="rounded bg-danger btn-sm text-white">Pendientes de envio</span> </td>
										@else
											<td> <span class="rounded bg-success btn-sm text-white">Enviado</span> </td>
										@endif
										@if ($s->enviado==0)
											<td><a href="" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
										@else
											<td></td>
										@endif
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
	