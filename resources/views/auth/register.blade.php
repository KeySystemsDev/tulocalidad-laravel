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

@include('layouts/nav-top-auth')

<div class="container-fluid" ng-controller="RegisterUsuarioController">
	<div class="row login-tulocalidad-register">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default border-tulocalidad">
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center></div>
				<div><center><h5>Registra tu cuenta</h5></center></div>
				<div class="panel-body">
					@if ($error)
						<div class="row">
							<div class="alert alert-danger col-md-7 col-md-offset-2">
									<strong>Error!</strong> {{ $error }}
							</div>
						</div>
					@endif			   

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" name="formulario">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="row" ng-if="error == 1" ng-cloak>
							<div class="col-md-7 col-md-offset-3 center">
								<div class="alert alert-danger alert-dismissable">
                            		<button type="button" class="close" ng-click="ocultar_error()" ng-cloak>
                            			<i class="fa fa-times" data-original-title="" title=""></i>
                            			<strong>Error!</strong> Las contraseñas no coinciden.
                            		</button>
                        		</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electrónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="" ng-class="{'error':formulario.email.$invalid && formulario.email.$touched}" ng-model="email" required>
								<div class="col-lg-10" ng-show="formulario.email.$dirty && formulario.email.$invalid" ng-cloak>
			        				<p class="help-block text-blanco" ng-show="formulario.email.$error.email" ng-cloak>Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
			      				</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" ng-model="pw" name="pw" id="pw" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Repetir Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" ng-model="pw2" name="pw2" id="pw2" required>
								<ul id="strength" check-strength="pw"></ul>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-danger" ng-click="checkMe()" ng-disabled="formulario.$invalid">
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
