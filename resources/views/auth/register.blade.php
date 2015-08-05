@extends('base')

@section('js')
	<script src="{{ asset('public/js/controllers/auth/register.js') }}"></script>
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
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('public/img/tulocalidad-blanco.png') }}"></center></div>
				<div><center><h5>Registra tu cuenta</h5></center></div>
				<div class="panel-body">	   

					<form id="form" class="form-horizontal" role="form" method="POST"  name="formulario">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo Electrónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="" ng-class="{'error':error_email && submit_email}" 
										ng-model="email" ng-blur="validar_email()" required>
								<div class="col-lg-10" ng-show="error_email && submit_email" ng-cloak>
			        				<p class="help-block text-blanco" ng-cloak>Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
			      				</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" ng-model="pw" ng-blur="validar_pass1()"
										name="pw" id="pw" ng-class="{'error':error_pass1 && submit_pass1}" required >
								<div class="col-lg-10" ng-show="error_pass1 && submit_pass1" ng-cloak>
		        					<p class="help-block" ng-cloak>[[msj_error_pass1]]</p>
		      					</div>	
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Repetir Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" ng-model="pw2" ng-blur="validar_pass2()"
										 name="pw2" id="pw2" ng-class="{'error':error_pass2 && submit_pass2}" required>
								<ul id="strength" check-strength="pw"></ul>
								<div class="col-lg-10" ng-show="error_pass2 && submit_pass2" ng-cloak>
		        					<p class="help-block" ng-cloak>[[msj_error_pass2]]</p>
		      					</div>	
							</div>						
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-danger" ng-click="checkMe()" ng-disabled="formulario.$invalid || error_email || error_pass2 || error_pass1">
									Registrar <i class="fa fa-pencil-square-o"></i>
								</button>
							</div>
						</div>

						<!--<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<h6>Al registrarte, aceptas las 
									<a class="btn-register" href="#" class="legal-link" target="_blank">Condiciones de Servicio</a> 
									y la <a class="btn-register" href="#" class="legal-link" target="_blank">Política de Privacidad</a>, 
									incluyendo el <a class="btn-register" href="#" class="legal-link" target="_blank">Uso de Cookies</a>
								.</h6>
							</div>
						</div>-->
					</form>
					
				</div>
			</div>
		</div>
	</div>
	@include('/modals/validacion_modal')
</div>
@endsection
