@extends('base')

<ul class="cb-slideshow ul-login">
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
</ul>

@section('content')

<div class="container-fluid">

	<div class="row login-tulocalidad">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default border-tulocalidad">
				<center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electrónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="" >
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3 col-md-offset-4">
								<a class="btn btn-link btn-oldivar" href="{{ url('/password/email') }}">Olvido contraseña?</a>
							</div>
							<!--<div class="col-md-3">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>-->
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger">Iniciar Sesión  <i class="fa fa-sign-in"></i></button>

								<a class="btn btn-link btn-register" href="{{ url('/auth/register') }}">Registrarte</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
