<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Acceso Cliente</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/icono.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
	<style>
	 .imgFondo{
		position: relative;
		width: 100%;
		height: 100%;
		/* min-height: 35rem; */
		padding: 15rem 0;
		background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("/assets_home/images/bg_2.jpg");
		background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("/assets_home/images/bg_2.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: scroll;
		background-size: cover;
	}

	</style>
</head>
<body class="login">
	<div class="wrapper  imgFondo wrapper-login ">
		<div class="container container-login animated fadeIn">
			<center><img src="/assets/img/IMG1.png" width="50%" class="animated bounce text-center" alt="" srcset=""></center>
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
			<div class="login-form">
				<form action="{{ route('mail.recuperarAdmin') }}" method="POST">
					{!! csrf_field() !!}
					<div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
						<h3>Recuperar Contraseña</h3>
						<label for="username" class="placeholder"><b>Correo Electrónico</b></label>
						<input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" placeholder="" maxlength="60" required>
										
						{!! $errors->first('correo', '<span class="help-block">:message</span>') !!}
					</div>				
					<div class="form-group form-action-d-flex mb-3">						
						<a href="/login-admin" class="btn btn-danger fw-bold pull-left">Volver</a>
						<div class="custom-control custom-checkbox">
							{{-- <input type="checkbox" class="custom-control-input" id="rememberme"> --}}
							{{-- <label class="custom-control-label m-0" for="rememberme">Recuerdame</label> --}}
						</div>
						<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Enviar</button>
						{{-- <a href="{{ route('login') }}" >Iniciar Sesión</a> --}}
					</div>
				</form>
		
				{{-- <div class="form-action">
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
				</div> --}}
				<div class="login-account">
					
				</div>
			</div>
		</div>
	</div>
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
</body>
</html>