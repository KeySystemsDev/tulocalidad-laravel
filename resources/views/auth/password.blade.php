@extends('base')

@section('js')
	<script src="{{ asset('/js/controllers/auth/reset_password_email.js') }}"></script>
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

<div class="container-fluid" ng-controller = "ResetPasswordController">

	<!-- incializando variables -->
	<div ng-init="hrefPost		  ='{{ url('/password/email')}}'"></div>
	<div ng-init="hrefSuccess	  ='{{ url('/auth/login')}}'"></div>
	<div ng-init="hrefFailed	  ='{{ url('#')}}'"></div>
	<div ng-init="hrefErrorServer ='{{ url('/password/email')}}'"></div>


	<div class="row login-tulocalidad">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default border-tulocalidad">
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center></div>
				<div class="panel-body">
					<form class="form-horizontal" id="form" role="form" method="POST">
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
							<div class="col-md-6 col-md-offset-4">
								<button type="button" class="btn btn-danger" ng-click="checkMe()" ng-disabled="formulario.$invalid || error_email">
									Enviar Contraseña <i class="fa fa-lock"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('modals/validacion_modal')
</div>
@endsection
