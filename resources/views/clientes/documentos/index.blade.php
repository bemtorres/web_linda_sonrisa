@extends('layout.layout')

@section('contenido')

<div class="content imgFondoPaciente">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Documentos</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="/home">
						<i class="flaticon-home"></i>
					</a>
					
				</li>				
			</ul>
		</div>
		
		<div class="row">
			@if ( $e==1 )
				<div class="col-md-6">
						@if (session('info'))
							<div class="alert alert-danger">
								{{ session('info') }}
							</div>
						@endif
					<div class="card">
						<div class="card-header">
						<div class="card-title">Formulario documento {{ $cliente->nombres . " " . $cliente->apellidos }}</div>
						</div>
					
						<form action="{{ route('documento.subir') }}" method="post" enctype="multipart/form-data">
							<div class="card-body">
								{!! csrf_field() !!}
								<input type="text" name="id_cliente" hidden value="{{ $cliente->id_ficha_cliente }}">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Documento</label>
									<select class="form-control" id="id_documento" name="id_documento" required>
										@foreach ($documentos as $do)	
										@if ($do->activo==1)
											<option value="{{ $do->id_documento }}">{{ $do->nombre_documento }}</option>
										
										@endif
										@endforeach
									</select>
								</div>
								<div class="form-group">
									{{-- <label for="text1">Apellidos</label> --}}
									<input type="file" name="archivo" class="form-control-file" accept="application/pdf" required >
									{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
								</div>
								
							
											
							</div>
							<div class="card-action">
								<a href="{{ route('cliente.index') }}" class="btn btn-danger">Volver</a>
								<button type="submit" class="btn btn-success pull-right">Agregar</button>
							</div>
						</form>
					</div>							
				</div>
			@endif
				
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Documentos Listos</h4>	
													
						</div>
						<table>
							<tbody>
								<tr>
									<td>Cliente: </td>
									<td>{{ $cliente->nombres . " " . $cliente->apellidos }}</td>
								</tr>	
								{{-- <tr>
									<td>Cliente </td>
									<td>
										<a href="" class="btn btn-warning btn-sm pull-right"><i class="fas fa-folder-open"></i></a>
									</td>
									</tr>	 --}}
								
							</tbody>
						</table>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Nombre</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								
									@foreach ($documentosclientes as $d)
									<tr>
										<td>{{ $d->documento->nombre_documento }}</td>
										<td>	
											<a href="{{ Storage::url($d->ruta) }}" target="_blink" class="btn btn-info"><i class="fa fa-file-pdf"></i></a>
										
											<a href="{{ route('documento.eliminar',$d->id_detalle_documento) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>	
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
	