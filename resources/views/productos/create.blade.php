@extends('layout.layout')

@section('contenido')

		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nuevo Producto</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
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
							<div class="card">
								<div class="card-header">
									<div class="card-title">Formulario Nuevo Producto</div>
								</div>
							
								<form action="{{ route('producto.store') }}" method="post">
									<div class="card-body">
										{!! csrf_field() !!}										

										<div class="form-group">
											<label for="text1">Nombre Producto</label>
											<input type="text" class="form-control" id="text1" name="nombre_producto" value="{{ old('nombre_producto') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Descripción</label>
											<input type="text" class="form-control" id="text1" name="descripcion" value="{{ old('descripcion') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										
										<div class="form-group">
												<label for="exampleFormControlSelect1">Tipo Producto</label>
												<select class="form-control" id="exampleFormControlSelect1" name="id_tipo_producto" required>
												<option class="disabled">Seleccione un tipo de producto</option>
												@foreach ($tipos as $t)	
													<option value="{{ $t->id_tipo_producto }}">{{ $t->nombre_tipo_producto }}</option>
												@endforeach
											</select>
										</div>	
										<div class="form-group">
												<label for="exampleFormControlSelect1">Familia</label>
												<select class="form-control" id="exampleFormControlSelect1" name="id_familia" required>
												<option class="disabled">Seleccione una familia</option>
												@foreach ($familias as $f)	
													<option value="{{ $f->id_familia }}">{{ $f->nombre_familia }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="text1">Stock</label>
											<input type="number" class="form-control" id="text1" name="stock" value="{{ old('stock') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>	
										<div class="form-group">
											<label for="text1">Stock Critico</label>
											<input type="number" class="form-control" id="text1" name="stock_critico" value="{{ old('stock_critico') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>				
									</div>
									<div class="card-action">
										<a href="{{ route('producto.index') }}" class="btn btn-danger">Volver</a>
							
										<button type="submit" class="btn btn-success pull-right">Agregar</button>
									</div>
								</form>
							</div>							
						</div>	
						<div class="col-md-6">
							<img src="/assets_home/images/Fondo/odontologo_fondo.jpg" width="100%" alt="">
							<img src="/assets_home/images/Fondo/consulta-dentista.jpg" width="100%" alt="">
						</div>				
					</div>
				</div>
			</div>
	
@stop
	