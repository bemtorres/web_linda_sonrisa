<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
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
	<div class="wrapper imgFondo wrapper-login ">
		<div class="container container-login animated fadeIn">
			<center>
					<img src="/assets/img/IMG1.png" width="50%" class="animated bounce text-center" alt="" srcset="">
			
			</center>
		{{-- <h3 class="text-center">Linda<em>Sonrisa</em></h3> --}}
			<div class="login-form">
				<form action="{{ route('loginEmpleado') }}" method="POST">
					{!! csrf_field() !!}
					@if (session('info'))
						<div class="alert alert-danger">
							{{ session('info') }}
						</div>
					@endif
					<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
						<label for="username" class="placeholder"><b>Nombre de usuario</b></label>
						<input id="username" name="username" type="text" value="{{ old('username')  }}" class="form-control" autofocus required>
						{!! $errors->first('username', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						<label for="password" class="placeholder"><b>Contraseña</b></label>
						<div class="position-relative">
							<input id="password" name="password" type="password" autocomplete="off" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
						{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
					</div>	
				
					<div class="form-group form-action-d-flex mb-3">
							{{-- {!! $errors->has('info', '<span class="help-block">:message</span>') !!} --}}
							
						<div class="custom-control custom-checkbox">
							{{-- <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">  --}}
							{{-- <label class="custom-control-label m-0" for="rememberme">Recordar</label> --}}
						</div>
						<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Iniciar Sesión</button>
					</div>
				</form>
		
				{{-- <div class="form-action">
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
				</div> --}}
				<div class="login-account">
					{{-- <span class="msg">Don't have an account yet ?</span> --}}
					<a href="/" id="show-signup" class="link">Volver</a>
					<a href="#" class="link float-right">¿Has olvidado tu contraseña?</a>
					
				</div>
			</div>
		</div>

		{{-- <div class="container container-signup animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
			<div class="login-form">
				<div class="form-group">
					<label for="fullname" class="placeholder"><b>Fullname</b></label>
					<input  id="fullname" name="fullname" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email" class="placeholder"><b>Email</b></label>
					<input  id="email" name="email" type="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="passwordsignin" class="placeholder"><b>Password</b></label>
					<div class="position-relative">
						<input  id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
					<div class="position-relative">
						<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="agree" id="agree">
						<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
					</div>
				</div>
				<div class="row form-action">
					<div class="col-md-6">
						<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
					</div>
					<div class="col-md-6">
						<a href="#" class="btn btn-primary w-100 fw-bold">Sign Up</a>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
</body>
</html>