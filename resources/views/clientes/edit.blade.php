@extends('layout.layout')

@section('contenido')
@php
	$comuna = App\Modelo\Comuna::get();
@endphp
<script>
    function validarRut(string) {//solo letras y numeros
      var out = '';
      //Se añaden las letras validas
      var filtro = '1234567890Kk';//Caracteres validos

      for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
          out += string.charAt(i).toUpperCase();
      return out;
    }   
  </script>

		<div class="content ">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Cliente</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							
						</ul>
					</div>
					<div class="row ">
						
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
									<div class="card-title">Formulario de Edición Cliente</div>
								</div>
							
								<form action="{{ route('cliente.update', $cliente->id_ficha_cliente) }}" method="post">
									<div class="card-body">
										{!! csrf_field() !!}
										{!! method_field('PUT') !!}
										
										<div class="form-group">
											<label for="text1">Run</label>
											<input type="text" class="form-control" id="text1" name="run" value="{{ $cliente->run }}" placeholder="19000111K (Sin Guión y puntos)" maxlength="9" onkeyup="this.value = validarRut(this.value)" pattern=".{8,9}" title="Requiere 8 a 9 caracteres" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>

										<div class="form-group">
											<label for="text1">Nombres</label>
											<input type="text" class="form-control" id="text1" name="nombres" value="{{ $cliente->nombres }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Apellidos</label>
											<input type="text" class="form-control" id="text1" name="apellidos" value="{{ $cliente->apellidos }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Telefono</label>
											<input type="tel" class="form-control" id="text1" name="telefono"  value="{{ $cliente->correo }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
												<label for="exampleFormControlSelect1">Región</label>
												<select class="form-control" id="id_region" name="id_region" required>
													@foreach ($regiones as $r)	
														@if ($r->id_region==$cliente->comuna->region->id_region)
															<option selected value="{{ $r->id_region }}">{{ $r->nombre_region }}</option>
														@else
															<option value="{{ $r->id_region }}">{{ $r->nombre_region }}</option>
														@endif
													@endforeach
												</select>
											</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Comuna</label>
											<select class="form-control" id="id_comuna" name="id_comuna" required>
												<option class="disabled">Seleccione una comuna</option>
												@foreach ($comuna as $c)	
													@if ($c->id_comuna==$cliente->id_comuna)
														<option selected value="{{ $c->id_comuna }}">{{ $c->nombre_comuna }}</option>
													@else
														<option value="{{ $c->id_comuna }}">{{ $c->nombre_comuna }}</option>
													@endif													
												@endforeach
											</select>
										</div>	
										<div class="form-group">
											<label for="text1">Dirección</label>
											<input type="text" class="form-control" id="text1" name="direccion"  value="{{ $cliente->direccion }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>		
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="email" class="form-control" id="text1" name="correo"  value="{{ $cliente->correo }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>	
										<div class="form-group">
											<label for="text1">Documentos listos <small>(Has click para activar o desactivar cliente)</small></label>
											@if ($cliente->bloqueo==0)
												<a href="{{ route('cliente.activar', $cliente->id_ficha_cliente) }}" class="btn btn-success  btn-block pull-right"><i class="fa fa-ok"></i>Habilitado</a>
											@else
												<a href="{{ route('cliente.activar', $cliente->id_ficha_cliente) }}" class="btn btn-danger btn-block pull-right"><i class="fa"></i>Pendientes</a>
											@endif
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>	
													
									</div>
									<div class="card-action">
										<a href="{{ route('cliente.index') }}" class="btn btn-danger">Volver</a>
							
										<button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
										<br>
									</div>
								</form>
							</div>							
						</div>	
						<div class="col-md-6">
							<img src="/assets_home/images/Fondo/paciente_fondo.jpg" width="100%" alt="">
							<img src="/assets_home/images/Fondo/consulta-dentista.jpg" width="100%" alt="">
						</div>
						

					</div>
				</div>
			</div>
	
@stop
{{-- @section('scripts')
	<script>
		CargarComuna();
        function CargarComuna() {
            var id_region = document.getElementById('id_region').value;

            web = "{{request()->getHttpHost()}}" ;
            url = 'http://' + web + '/comunas/' + id_region;
            fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{
                    var $select = $('#id_comuna');
                    $select.find('option').remove();
                    //alert(options);
                    $.each(result, function(key,value) {
                        // console.log(value.id_comuna + " " + value.nombre_comuna );
                        
                        $select.append('<option value=' + value.id_comuna + '>' + value.nombre_comuna + '</option>');
                    });
                    console.log($select);
                    
            });
        }
   
    </script> --}}
{{-- @stop --}}
