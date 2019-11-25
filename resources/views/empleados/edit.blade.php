@extends('layout.layout')


@section('contenido')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar</h4>
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
						
				@if (session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Formulario Actualizar Empleado</div>
                    </div>
                    <form action="{{ route('empleado.update', $empleado->id_empleado ) }}" method="post">
                        <div class="card-body">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group">
                                    <label for="text1">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="text1" name="username" value="{{ $empleado->username }}" placeholder="">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                            <div class="form-group">
                                <label for="text1">Run</label>
                                <input type="text" class="form-control" id="text1" name="run" value="{{ $empleado->run }}" placeholder="Ingrese su run">
                                {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            <div class="form-group">
                                    <label for="text1">Nombre</label>
                                    <input type="text" class="form-control" id="text1" name="nombres" value="{{ $empleado->nombres }}" placeholder=" su run">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            
                            <div class="form-group">
                                    <label for="text1">Apellido</label>
                                    <input type="text" class="form-control" id="text1" name="apellidos" value="{{ $empleado->apellidos }}" placeholder="Ingrese su run">
                                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group">
                                        <label for="text1">Correo</label>
                                        <input type="text" class="form-control" id="text1" name="correo" value="{{ $empleado->correo }}" placeholder="Ingrese su run">
                                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="form-group">
											<label for="text1">Telefono</label>
											<input type="text" class="form-control" id="telefono" name="telefono"  value="{{ $empleado->telefono }}" size="12" placeholder="" maxlength="12" required>
											
											{{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
										</div>
                
                        </div>
                        <div class="card-action">
                            <a href="{{ route('empleado.index') }}" class="btn btn-danger">Volver</a>
							
                            <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                            <br>
                        </div>
                    </form>
                </div>							
            </div>	
            <div class="col-md-6">
                    <img src="/assets_home/images/Fondo/empleado_fondo.jpg" width="100%" alt="">
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