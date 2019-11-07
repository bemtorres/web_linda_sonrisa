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

		<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Nuevo Proveedor</h4>
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
							<div class="card">
								<div class="card-header">
									<div class="card-title">Formulario Nuevo Proveedor</div>
								</div>
								<form action="{{ route('proveedor.store') }}" method="post">
									<div class="card-body">
										{!! csrf_field() !!}		
										<div class="form-group">
											<label for="text1">Usuario de sesión</label>
											<input type="text" class="form-control" id="text1" name="username" required value="{{ old('username') }}" placeholder="">
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>									
										<div class="form-group">
											<label for="text1">Nombre Empresa</label>
											<input type="text" class="form-control" id="text1" name="nombre_empresa" required value="{{ old('nombre_empresa') }}" placeholder="">
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Rubro</label>
											<input type="text" class="form-control" id="text1" name="rubro" required value="{{ old('username') }}" placeholder="">
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
										<div class="form-group">
											<label for="text1">Correo</label>
											<input type="email" class="form-control" id="text1" name="correo" required value="{{ old('correo') }}" placeholder="">
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>	
										<div class="form-group">
											<label for="text1">Telefono</label>
											<input type="text" class="form-control" value="+56" id="telefono" name="telefono"  value="{{ old('telefono') }}" size="12" placeholder="" maxlength="12" required>
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>	
									</div>
									<div class="card-action">
										<a href="{{ route('proveedor.index') }}" class="btn btn-danger">Volver</a>
										<button type="submit" class="btn btn-success pull-right">Agregar</button>
										<br>
									</div>
								</form>
							</div>							
						</div>	
						<div class="col-md-6">
							<img src="/assets_home/images/Fondo/proveedor_fondo.jpg" width="100%" alt="">
							<img src="/assets_home/images/Fondo/proveedor.jfif" width="100%" alt="">
						</div>					
					</div>
				</div>
			</div>
	
@stop
@section('scripts')
<script>

var regex = /[^+\d]/g;

//JQuery
$("#telefono").keyup(function(){
if($("#telefono").val() == ""){
   $("#telefono").val("+56")
}
$("#telefono").val($("#telefono").val().replace(regex, ""))
});

//Javascript

var numTel = document.getElementById("telefono2");

numTel.addEventListener("keyup", function(){
if (numTel.value == ""){
   numTel.value = "+";
}
numTel.value = numTel.value.replace(regex,"");
})

	


</script>
@stop