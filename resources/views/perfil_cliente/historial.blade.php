@extends('perfil_cliente.layout')

@section('contenido')
@php
	$fecha_hoy = Carbon\Carbon::now()->format('Y-m-d');
	$id_usuario =0;
	if (auth('cliente')->check()){
		$nombreUsuario =  auth('cliente')->user()->nombres;
		$id_usuario =  auth('cliente')->user()->id_ficha_cliente;
	}    
	$reservas = App\Modelo\Reservar_hora::where('id_ficha_cliente', '=', $id_usuario)->orderBy('fecha_reserva','desc')->orderBy('id_horario','asc')->get();


	$i=1;
@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Historial de consultas</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
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
										<th>Horario</th>
										<th>Servicio</th>
										<th>Odontólogo</th>
										<th>Estado</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Fecha Consulta</th>
										<th>Horario</th>
										<th>Servicio</th>
										<th>Odontólogo</th>
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
										<td>{{  $r->horario->horario }}</td>
										<td>{{ $r->servicio->nombre_servicio }}</td>
										@if ($r->id_odontologo > 0)
											<td>{{ $r->odontologo->nombres . " " . $r->odontologo->apellidos }}</td>
										@else
											<td></td>
										@endif
										
										@if ($r->id_estado_reserva==1)
											<td> <span class="rounded bg-warning btn-sm btn-block text-white">Pendiente</span> </td>
										@else
											@if ($r->id_estado_reserva==2)
												<td> <span class="rounded bg-success btn-sm  btn-block text-white">Realizado</span> </td>
									
											@else
												@if ($r->id_estado_reserva==3)
													<td> <span class="rounded bg-danger btn-sm  btn-block text-white">No Asistió</span> </td>
										
												@else
													<td> <span class="rounded bg-danger btn-sm btn-block text-white">Cancelado</span> </td>
												@endif
											@endif
										@endif
										<td>
											@if ($r->id_estado_reserva==1)
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalA{{ $r->id_reservar_hora }}"><i class="flaticon-cross"></i></button>
												<div class="modal fade" id="ModalA{{ $r->id_reservar_hora }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Cancelar Hora</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="{{ route('reservar-hora.update', $r->id_reservar_hora ) }}" method="post">
																<div class="modal-body">		
																	<div class="card-body">
																		{!! csrf_field() !!}
																		{!! method_field('PUT') !!}
																		<h3>¿Desea cancelar su hora para el día {{ date('d-m-Y', strtotime($r->fecha_reserva))  }} a las {{ $r->horario->horario }} ?</h3>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
																	<button type="submit" class="btn btn-primary">Sí</button>
																</div>
															</form>
														</div>
													</div>
												</div>
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
			
@stop
	