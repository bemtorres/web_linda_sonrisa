@extends('layout.layout')

@section('contenido')

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
						<h4 class="page-title">Nuevo Cliente</h4>
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
							<div class="card">
								<div class="card-header">
									<div class="card-title">Formulario Nuevo Cliente</div>
								</div>
							
								<form action="{{ route('cliente.store') }}" method="post">
									<div class="card-body">
										{!! csrf_field() !!}
										<div class="form-group">
											<label for="text1">Run</label>
											<input type="text" class="form-control" id="text1" name="run" value="{{ old('run') }}" placeholder="19000111K (Sin Guión y puntos)" maxlength="9" onkeyup="this.value = validarRut(this.value)" pattern=".{8,9}" title="Requiere 8 a 9 caracteres" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>

										<div class="form-group">
											<label for="text1">Nombres</label>
											<input type="text" class="form-control" id="text1" name="nombres" value="{{ old('nombres') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Apellidos</label>
											<input type="text" class="form-control" id="text1" name="apellidos" value="{{ old('apellidos') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Telefono</label>
											<input type="tel" class="form-control" id="text1" name="telefono"  value="{{ old('correo') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
												<label for="exampleFormControlSelect1">Región</label>
												<select class="form-control" id="id_region" name="id_region" onChange="CargarComuna()" required>
													@foreach ($regiones as $r)	
													<option value="{{ $r->id_region }}">{{ $r->nombre_region }}</option>
													@endforeach
												</select>
											</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Comuna</label>
											<select class="form-control" id="id_comuna" name="id_comuna" required>
												{{-- <option class="disabled">Seleccione una comuna</option>
												@foreach ($comuna as $c)	
												<option value="{{ $c->id_comuna }}">{{ $c->nombre_comuna }}</option>
												@endforeach --}}
											</select>
										</div>	
										<div class="form-group">
											<label for="text1">Dirección</label>
											<input type="text" class="form-control" id="text1" name="direccion"  value="{{ old('direccion') }}" placeholder="" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>		
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="email" class="form-control" id="text1" name="correo"  value="{{ old('correo') }}" placeholder="" required>
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
						<div class="col-md-6">
							<img src="/assets_home/images/Fondo/paciente_fondo.jpg" width="100%" alt="">
							<img src="/assets_home/images/Fondo/consulta-dentista.jpg" width="100%" alt="">
						</div>
						

					</div>
				</div>
			</div>
	
@stop
@section('scripts')
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
   
    </script>
@stop
