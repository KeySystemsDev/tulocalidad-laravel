@extends('base-cliente')

@section('js')
	<script src="{{ asset('/js/controllers/auth/reset_password_email.js') }}"></script>
@endsection

@section('content')

<div div id="page-container" class="fade"  ng-controller="ResetPasswordController">

	<!-- incializando variables -->
	<div ng-init="hrefPost		  ='{{ url('/password/email')}}'"></div>
	<div ng-init="hrefSuccess	  ='{{ url('/auth/login')}}'"></div>
	<div ng-init="hrefFailed	  ='{{ url('#')}}'"></div>
	<div ng-init="hrefErrorServer ='{{ url('/password/email')}}'"></div>
	
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
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
				<form class="form-horizontal" id="form" role="form" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<br>

					<div class="form-group m-b-15">
						<input type="email" class="form-control" name="email" value="" ng-class="{'error':error_email && submit_email}" 
								ng-model="email" ng-blur="validar_email()" required placeholder="Correo Electronico">
						<div class="col-lg-12" ng-show="error_email && submit_email" ng-cloak>
	        				<br><p class="help-block text-gris" ng-cloak>Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
	      				</div>
					</div>
					
					<br><br>

					<div class="login-buttons">
						<button type="button" class="btn btn-danger btn-block btn-lg" ng-click="checkMe()" ng-disabled="formulario.$invalid || error_email">
							Enviar Contraseña <i class="fa fa-lock"></i>
						</button>
					</div>
					
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

	@include('modals/validacion_modal')
</div>
@endsection
