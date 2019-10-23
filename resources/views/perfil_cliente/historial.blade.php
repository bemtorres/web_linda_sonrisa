@extends('perfil_cliente.layout')

@section('contenido')
@php
	$fecha_hoy = Carbon\Carbon::now()->format('Y-m-d');
	$id_usuario =0;
	if (auth('cliente')->check()){
		$nombreUsuario =  auth('cliente')->user()->nombres;
		$id_usuario =  auth('cliente')->user()->id_ficha_cliente;
	}    
	$reservas = App\Modelo\Reservar_hora::where('id_ficha_cliente', '=', $id_usuario)->orderBy('fecha_reserva', 'asc')->get();


	$i=1;
@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Historial de consultas</h4>
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
									<h4 class="card-title">Historial</h4>								
								</div>
							</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>#</th>
										<th>Fecha Consulta</th>
										<th>Servicio</th>
										<th>Estado</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Fecha Consulta</th>
										<th>Servicio</th>
										<th>Estado</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
									
									@foreach ($reservas as $r)
									<tr>
										<td>{{ $i }}</td>
										@php
											$i++;
										@endphp
										<td>{{  date('d-m-Y', strtotime($r->fecha_reserva)) }}</td>
										<td>{{ $r->servicio->nombre_servicio }}</td>
										@if ($r->id_estado_reserva==1)
											<td> <span class="rounded bg-warning btn-sm btn-block text-white">Pendiente</span> </td>
										@else
											@if ($r->id_estado_reserva==2)
												<td> <span class="rounded bg-success btn-sm  btn-block text-white">Realizado</span> </td>
									
											@else
												<td> <span class="rounded bg-danger btn-sm btn-block text-white">Cancelado</span> </td>
											@endif
										@endif
										<td>
											<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
	