@extends('base-cliente')

@section('js')
	<script src="{{ asset('/js/controllers/auth/register.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade" ng-controller="RegisterUsuarioController">
	<!-- Inicializando rutas -->
	<div ng-init="hrefPost		  ='{{ url('/auth/register')}}'"></div>
	<div ng-init="hrefSuccess	  ='{{ url('/auth/login')}}'"></div>
	<div ng-init="hrefFailed	  ='{{ url('#')}}'"></div>
	<div ng-init="hrefErrorServer ='{{ url('/auth/register')}}'"></div>
	
	<div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
            	<ul class="cb-slideshow ul-login">
			        <li class="li-login"><span></span></li>
			        <li class="li-login"><span></span></li>
			        <li class="li-login"><span></span></li>
			        <li class="li-login"><span></span></li>
			        <li class="li-login"><span></span></li>
			        <li class="li-login"><span></span></li>
			    </ul>
                <!--<img src="{{ asset('/img/bg-7.jpg') }}" data-id="login-cover-image" alt="">-->
            </div>
            <div class="news-caption">
                <h4 class="caption-title"> <img class="login-icono" src="{{ asset('/img/icono.png') }}">  TuLocalidad </h4>
                <p>
                    Lo que buscas a la mano.
                </p>
            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <img class="login-icono" src="{{ asset('/img/icono.png') }}"> TuLocalidad
                    <small> Un directorio pensado para ti...</small>
                </div>
                <div class="icon">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">

				<form id="form" class="form-horizontal" role="form" method="POST"  name="formulario">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<input type="email" class="form-control" name="email" value="" ng-class="{'error':error_email && submit_email}" 
								ng-model="email" ng-blur="validar_email()" required placeholder="@ Correo Electrónico">
						<div class="col-lg-12" ng-show="error_email && submit_email" ng-cloak>
	        				<br><p class="help-block text-gris" ng-cloak>Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
	      				</div>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" ng-model="pw" ng-blur="validar_pass1()"
								name="pw" id="pw" ng-class="{'error':error_pass1 && submit_pass1}" required placeholder="Contraseña">
						<div class="col-lg-12" ng-show="error_pass1 && submit_pass1" ng-cloak>
        					<br><p class="help-block" ng-cloak>[[msj_error_pass1]]</p>
      					</div>	
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" ng-model="pw2" ng-blur="validar_pass2()"
								 name="pw2" id="pw2" ng-class="{'error':error_pass2 && submit_pass2}" required placeholder="Repetir Contraseña">
						<br><center><ul id="strength" check-strength="pw"></ul></center>
						<div class="col-lg-12" ng-show="error_pass2 && submit_pass2" ng-cloak>
        					<br><p class="help-block" ng-cloak>[[msj_error_pass2]]</p>
      					</div>					
					</div>

					<div class="login-buttons">
						<button type="button" class="btn btn-danger btn-block btn-lg" ng-click="checkMe()" ng-disabled="formulario.$invalid || error_email || error_pass2 || error_pass1">
							Registrar <i class="fa fa-pencil-square-o"></i>
						</button>
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


					<br><br><hr>
					<p class="text-center text-inverse">
                        © Copyright Key Systems C.A 2015
                    </p>

                    <p class="text-center text-inverse">
                       Nunca fue tan fácil encontrar algo...
                    </p>

				</form>
				
			</div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>	

	@include('/modals/validacion_modal')
</div>
@endsection
