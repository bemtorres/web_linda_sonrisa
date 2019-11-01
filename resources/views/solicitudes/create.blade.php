@extends('layout.layout')

@section('contenido')
@php
$id_empleado = 0;
if (auth('empleado')->check()){
	$id_empleado =  auth('empleado')->user()->id_empleado;
}    
	
$productos = App\Modelo\Producto::get();
$proveedores = App\Modelo\Ficha_proveedor::get();
$detallesP = App\Modelo\Detalle_proveedor::get();
@endphp
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Generar una solicitud </h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{ route('ordenempleado.index') }}">
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
						<div class="card-title">Formulario de Orden de Solicitud de Pedido a Proveedor </strong></div>
					</div>

					<form action="{{ route('detalleservicio.store') }}" method="post">
						<div class="card-body">
							{!! csrf_field() !!}
							{{-- <input type="text" name="id_servicio" hidden value="{{ $servicio->id_servicio }}"> --}}
							<div class="form-group">

								<label for="text1">Código</label>
								<div class="input-group">
									<input type="text" class="form-control" id="codigo" disabled required placeholder="">
									<span class="form-control btn btn-info " onclick="GenerarCodigo()">Generar</span>
								</div>

								<small id="codigoS" class="form-text text-muted">Código Disponible.</small>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Proveedor</label>
							<select class="form-control" id="id_proveedor" name="id_proveedor" onChange="buscarProductos()" required>
								@foreach ($proveedores as $pr)
								<option value="{{ $pr->id_ficha_proveedor }}">{{ $pr->nombre_empresa }}</option>
								@endforeach
							</select>
						</div>

					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Productos destacados en estado crítico</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table border="1" class="display table table-striped table-hover table-bordered" >
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre Producto</th>
										<th>SD/SC</th>
										<th>Proveedor</th>
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;	
									@endphp
									@foreach ($productos as $p)									
									@php
										if($p->stock>$p->stock_critico){
											continue;
										}
									
										$text_color = "";
										$bg_color = "";
									
										if($p->stock>0 && $p->stock<=$p->stock_critico){
											$bg_color = "bg-warning";
											$text_color = "text-white";
										}	
										if ($p->stock<=0) {
											$bg_color = "bg-danger";
											$text_color = "text-white";
										}
									
									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td>{{ $i }}</td>
										@php
											$i++;	
										@endphp
										<td>{{ $p->nombre_producto }}</td>										
										<td>{{ $p->stock }}/{{ $p->stock_critico }}</td>
										{{-- <td>
											<a href="{{ route('producto.edit', $p->id_producto ) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
											<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</td> --}}
										<td>
											@foreach ($detallesP as $de)
												@if ($de->id_producto==$p->id_producto)
													{{ $de->proveedor->nombre_empresa . " " }}
												@endif
											@endforeach
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
		<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tabla de Productos</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<form action="{{ route('ordenpedido.store') }}" method="post">
									{!! csrf_field() !!}
									<input type="text" hidden name="id_empleado" value="{{ $id_empleado }}">
									<input type="text" hidden id="id_ficha_proveedor" name="id_ficha_proveedor" value="">
									<input type="text" hidden id="codigo_orden" name="codigo_orden" value="">
								
									<table id="table_nueva"  border="1" class="display table table-striped table-hover table-bordered" >
										<thead>
											<tr>
												<th>Seleccionar</th>
												{{-- <th>#</th> --}}
												<th>Nombre Producto</th>
												<th>Stock Disponible/Critico</th>
												<th>Cantidad</th>
											</tr>
										</thead>								
										<tbody>
											
										</tbody>			
									</table>
									<div class="card-action">	
										<a href="{{ route('ordenpedido.index') }}" class="btn btn-danger">Volver</a>
										<button type="submit" class="btn btn-success pull-right">Crear solicitud</button>
									</div>
								</form>
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
	GenerarCodigo();
	buscarProductos();

	function GenerarCodigo() {
		// web = "{{request()->getHttpHost()}}";
		// url = 'http://' + web + '/generarcodigo';
		url = "{{ route('fetch.generarCodigo') }}";
		fetch(url)
			.then(resp => {
				return resp.text();
			}).then(result => {
				$('#codigo').val(result);
				$('#codigo_orden').val(result);
			});
	}
	function RemoveRow () {
		var tableHeaderRowCount = 1;
		var table = document.getElementById('table_nueva');
		var rowCount = table.rows.length;
		for (var i = tableHeaderRowCount; i < rowCount; i++) {
			table.deleteRow(tableHeaderRowCount);
		}
		
    }
	function checkRequiered(nombre) {
		// console.log(nombre);
		var id = nombre.split('_');
		// console.log(id[1]);

		const checkbox = document.getElementById(nombre);
		
		var input = document.getElementById('cantidad_'+id[1]);

		checkbox.addEventListener('change', (event) => {
			if (event.target.checked) {
				// alert('checked');
				console.log("si");
				input.setAttribute("required", true);
			} else {
				// alert('not checked');
				console.log("no");
				input.removeAttribute("required"); 
			}
		})
	}

	function buscarProductos() {
            var id_proveedor = document.getElementById('id_proveedor').value;
			$('#id_ficha_proveedor').val(id_proveedor);
            web = "{{request()->getHttpHost()}}" ;
            url = 'http://' + web + '/proveedor/productos/buscar/' + id_proveedor;
         
			fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{     
                   
					RemoveRow();
					
					
                    $.each(result, function(key,value) {
						var html = "<div class=\"form-check\">"+
									"<label class=\"form-check-label\">"+
										"<input class=\"form-check-input\" name=\"listado[]\" type=\"checkbox\" id=\"check_"+value.id_producto+"\" onclick=\"checkRequiered(this.id)\" value=\""+value.id_producto+"\">"+
											"<span class=\"form-check-sign\"></span></label></div>";
							
				    var input = "<input type=\"number\" class=\"form-control\" id=\"cantidad_"+value.id_producto+"\" name=\"cantidad"+value.id_producto+"\">";
						$('#table_nueva tbody').append(
							'<tr><td>'+html+'</td><td>'+value.nombre_producto+'</td><td>'+value.stock+'/'+value.stock_critico+'</td><td>'+input+'</td></tr>'
						)
					});

                    // console.log(result);

            });
        }

		
	
</script>
@stop