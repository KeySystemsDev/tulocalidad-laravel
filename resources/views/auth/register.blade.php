@extends('base')

@section('js')
	<script src="{{ asset('/js/controllers/auth/register.js') }}"></script>
@endsection

<ul class="cb-slideshow ul-login">
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
</ul>

@section('content')
<div class="container-fluid" ng-controller="RegisterUsuarioController">
	<div class="row login-tulocalidad">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default border-tulocalidad">
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center></div>
				<div><center><h5>Registra tu cuenta</h5></center></div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electroónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" ng-model="pw" name="pw" id="pw" required>
								<ul id="strength" check-strength="pw"></ul>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-danger">
									Registrar <i class="fa fa-pencil-square-o"></i>
								</button>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<h6>Al registrarte, aceptas las 
									<a class="btn-register" href="#" class="legal-link" target="_blank">Condiciones de Servicio</a> 
									y la <a class="btn-register" href="#" class="legal-link" target="_blank">Política de Privacidad</a>, 
									incluyendo el <a class="btn-register" href="#" class="legal-link" target="_blank">Uso de Cookies</a>
								.</h6>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
