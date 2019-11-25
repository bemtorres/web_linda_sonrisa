@extends('layout.layout')

@section('contenido')
@php
	$detalle = App\Modelo\Detalle_servicio::where('id_servicio', $b->id_servicio)->get();
@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Detalle Del Servicio</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{ route('boletas.index') }}">
						<i class="flaticon-home"></i>
					</a>
				</li>
			</ul>
		</div>

		<div class="row">
			<div class="col-md-8">
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
						<button type="button" class="btn btn-danger btn-danger" onclick="descargarPDF()"> <i class="fas fa-file-pdf"></i> Descargar PDF </button>
						<button type="button" class="btn btn-success btn-success" onclick="descargarExcel()"> <i class="fas fa-file-excel"></i> Descargar Excel </button>
				 
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="tabla" border="1" class="display table table-striped text-black" >
								<tbody>						
									<tr>	
										<td>N° Boleta {{ $b->id_boleta_servicio }}</td>	
										@php											
											$proxima_fecha = date_format(date_create($b->fecha_servicio), 'd-m-Y') . " " . $b->horario;
										@endphp
										<th class="text-right">Fecha:  {{ $proxima_fecha }}</td>
									</tr>
									<tr>										
										<td>Cliente: {{ $b->nombre_cliente }}</td>										
										{{-- <td >{{ $b->horario }}</td> --}}
										{{-- <td>Nombre Cliente: {{ $b->nombre_cliente }}</td>
										<td>{{ $b->horario }}</td>
										<td>Nombre Cliente: {{ $b->nombre_cliente }}</td> --}}
										<td>Servicio: {{ $b->nombre_servicio }}</td>
									</tr>
									<tr>
										<td>Run Cliente: {{ $b->cliente->run }}</td>
										<td>Odontólogo: {{ $b->nombre_odontologo }}</td>
									</tr>							
									<tr>
										<td colspan="2" class="text-center"><strong>Productos del servicio</strong></td>
										
									</tr>
									<tr class="bg-warning">
										<td >Nombre</td>
										<td >Cantidad</td>
									</tr>
									@foreach ($detalle as $d)
									<tr>
										<td>{{ $d->producto->nombre_producto }}</td>
										<td>{{ $d->cantidad }}</td>									
									</tr>
									@endforeach
									


								</tbody>
							</table>
						</div>
					</div>
					<div class="card-action">	
						<a href="{{ route('boletas.index') }}" class="btn btn-danger">Volver</a>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
@stop
@section('scripts')
<script>
		function descargarPDF() {           
			var doc = new jsPDF();      
			doc.autoTable({html: '#tabla'});    
			doc.save('Reporte.pdf');      
		}
		
		//  Le falta utf - 8
		 function descargarExcel(){
				var idtabla = "tabla";
				var nombreArchivo = "Reporte";
				//Creamos un Elemento Temporal en forma de enlace
				var tmpElemento = document.createElement('a');
				// obtenemos la información desde el div que lo contiene en el html
				// Obtenemos la información de la tabla
				var data_type = 'data:application/vnd.ms-excel';    
				var tabla_div = document.getElementById(idtabla);
				 // var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
				tmpElemento.href = data_type + ', ' + encodeURIComponent(tabla_div.outerHTML);
				//Asignamos el nombre a nuestro EXCEL
				tmpElemento.download = nombreArchivo + '.xls';
				// Simulamos el click al elemento creado para descargarlo
				tmpElemento.click();
			}
		
		</script>
@stop