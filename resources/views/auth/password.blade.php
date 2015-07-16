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

@include('layouts/nav-top-auth')

<div class="container-fluid">
	<div class="row login-tulocalidad">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default border-tulocalidad">
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center></div>
				<div class="panel-body">
					@if ($success)
						<div class="alert alert-success">
							Correo enviado exitosamente, revise su bandeja de entrada para obtener su nueva contraseña.
						</div>
					@endif

					@if ($error)
						<div class="alert alert-danger">
							El correo introducido no existe.
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electrónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger">
									Enviar Contraseña <i class="fa fa-lock"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
