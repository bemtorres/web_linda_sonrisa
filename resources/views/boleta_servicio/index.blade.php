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
								<center>
								<button type="button" class="btn btn-danger  btn-sm btn-danger" onclick="descargarPDF()"> <i class="fa fa-file-pdf-o"></i> Descargar PDF </button>
								<button type="button" class="btn btn-success btn-sm btn-success" onclick="descargarExcel()"> <i class="fa fa-file-excel-o"></i> Descargar Excel </button>
							  </center>  
						</div>	
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
											<a href="{{ route('recepcion.show',$b->id_boleta_servicio) }}" class="btn btn-info "><i class="fas fa-box-open"></i> Recepción</a>										
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

//  Le falta utf - 8
 function descargarExcel(){
        var idtabla = "basic-datatables";
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