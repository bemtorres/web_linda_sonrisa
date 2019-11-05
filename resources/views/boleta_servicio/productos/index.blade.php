@extends('layout.layout')

@section('contenido')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Detalle Productos Utilizados</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
				</li>
			</ul>
		</div>

		<div class="row">
			<div class="col-md-6">			
				<div class="card">
					<div class="card-header">
						<div class="card-title">Listado de Productos Utilizados</strong></div>
						<button type="button" class="btn btn-danger btn-danger" onclick="descargarPDF()"> <i class="fas fa-file-pdf"></i> Descargar PDF </button>
						<button type="button" class="btn btn-success btn-success" onclick="descargarExcel()"> <i class="fas fa-file-excel"></i> Descargar Excel </button>
				 
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="tabla" border="1" class="display table table-striped text-black" >
								<tbody>						
									<tr>	
										<td>Resumen Productos Utilizados</td>	
										<td></td>
									</tr>								
									<tr class="bg-warning">
										<td >Nombre</td>
										<td >Cantidad</td>
									</tr>
									@foreach ($pr as $p)
									<tr>
										<td>{{ $p->nombre_producto }}</td>
										<td>{{ $p->total }}</td>									
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