@extends('base-cliente')

@section('content')

<div id="page-container" class="fade">

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
					
				@include('alerts.mensaje_success-login')
				@include('alerts.mensaje_error-login')

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/reset-password') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<br>

					<div class="form-group m-b-15">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
					</div>
					
					<br>

					<div class="login-buttons">
						<button type="submit" class="btn btn-danger btn-block btn-lg">
							Enviar contraseña
						</button>
					</div>

					<br><br><br>

					<hr>
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

</div>

@endsection