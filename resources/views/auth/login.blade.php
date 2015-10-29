@extends('base-cliente')

@section('js')
    <script src="{{ asset('/js/controllers/auth/login.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade" ng-controller="LoginController">

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
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <form id="form" class="form-horizontal" role="form" method="post" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group m-b-15">
                        <input type="email" class="form-control input-lg" name="email" ng-model="email" placeholder="Correo Electronico" >
                    </div>
                    <div class="form-group m-b-15">
                        <input type="password" class="form-control input-lg" name="password" ng-model="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
              
                            <a class="btn btn-link btn-oldivar" href="{{ url('/password/email') }}">Olvido contraseña?</a>
                        
                    </div>
                    <div class="login-buttons">
                        <!--<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>-->
                        <button class="btn btn-danger btn-block btn-lg" type="button" ng-click="checkMe()">Iniciar Sesión </button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40">
                        ¿No eres miembro todavía? <a href="{{ url('/auth/register') }}" class="text-success">Haga clic aquí </a> Registrar.
                    </div>
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

	@include('modals/validacion_modal')

</div>

@endsection