@extends('layout.layout')

@section('contenido')
	
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Boletas de Servicios Realizadas</h4>
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
							<h4 class="card-title">Tabla de Boletas Servicios</h4>							
						   
						</div>		
						<button  class="btn btn-success pull-right" onclick="tableToExcel('basic-datatables', 'ReporteExcel')"><i class="fas fa-file-excel"></i> Descargar Excel</button>
						<button type="button" class="btn btn-danger  pull-right"" onclick="descargarPDF()"> <i class="fas fa-file-pdf"></i> Descargar PDF </button>
				</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="basic-datatables" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>#</th>
										<th>Fecha Realizado</th>
										<th>Horario</th>
										<th>Cliente</th>
										<th>Odontógolo</th>
										<th>Servicio</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($boletas as $b)
									@php
										$text_color = "";
										$bg_color = "";
									
										// if($s->activo==0){
										// 	$bg_color = "bg-warning";
										// 	$text_color = "text-white";
										// }	
										$proxima_fecha = date_format(date_create($b->created_at), 'd-m-Y');

									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td class="">{{ $b->id_boleta_servicio }}</td>							
										<td>{{ $proxima_fecha }}</td>						
										<td>{{ $b->horario }}</td>
								
										<td>{{ $b->nombre_cliente }}</td>
										<td>{{ $b->nombre_odontologo }}</td>
										<td>{{ $b->nombre_servicio }}</td>
							
										<td>										
											<a href="{{ route('boletas.show',$b->id_boleta_servicio) }}" class="btn btn-secondary "><i class="fas fa-eye"></i> Ver</a>										
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
function descargarPDF() {           
    var doc = new jsPDF();      
    doc.autoTable({html: '#basic-datatables'});    
    doc.save('Reporte.pdf');      
}
</script>
<script type="text/javascript"> 
	var tableToExcel = (function() { 
	var uri = 'data:application/vnd.ms-excel;base64,' 
	, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>' 
	, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) } 
	, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) } 
	return function(table, name) { 
	if (!table.nodeType) table = document.getElementById(table) 
	var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML} 
	window.location.href = uri + base64(format(template, ctx)) 
	} 
	})(); 
</script> 
@stop