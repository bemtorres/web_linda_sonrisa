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
						<button  class="btn btn-success pull-right" onclick="tableToExcel('tabla', 'ReporteExcel')"><i class="fas fa-file-excel"></i> Descargar Excel</button>
			
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