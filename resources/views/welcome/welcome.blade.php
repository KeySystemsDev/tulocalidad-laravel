<!DOCTYPE html>
<html lang="en" ng-app="tulocalidad">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Tu Localidad | Venezuela:.</title>

		<!-- Fonts -->
	    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- CSS 
	        ================================================== -->
	    <!-- Bootstrap 3-->
	    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	    <!-- Google Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
		
		<!-- Module Angular-->    
		<link href="{{ asset('/bower_components/angular-loading-bar/src/loading-bar.css') }}" rel='stylesheet' />

	    <!-- Template Styles -->
	    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet" media="screen">
	    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/animate.css/animate.min.css') }}">
	    <link rel="shortcut icon" href="favicon.ico" />

	</head>
	
	<body>
	  
	<!-- NAVBAR
		================================================== -->
	<nav class="navbar navbar-default" role="navigation">
	  	<div class="container">
	  	<div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      		<span class="sr-only">Toggle navigation</span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	    	</button>
	    
	    <!--Replace text with your app name or logo image-->
	    <a class="navbar-brand" href="#">
	    	<img class="img-tulocaldiad-bar" src="img/tulocalidad40px.png">
	    </a>
	    
	  	</div>
	  	<div class="collapse navbar-collapse navbar-ex1-collapse">
	    	<ul class="nav navbar-nav">
	      		<li><a onclick="$('header').animatescroll({padding:71});">Inicio</a></li>
	      		<li><a href="/servicios">Entrar</a></li>
	      		<li><a onclick="$('.payoff').animatescroll({padding:71});">Descripción</a></li>
	      		<li><a onclick="$('.detail').animatescroll({padding:71});">¿Cómo Usar?</a></li>
	      		<li><a onclick="$('.features').animatescroll({padding:71});">Bondades</a></li>
	      		<li><a onclick="$('.descarga').animatescroll({padding:71});">Descarga</a></li>
	      		<li><a onclick="$('.registrar').animatescroll({padding:71});">Registrate</a></li>
	      		<li><a onclick="$('.social').animatescroll({padding:71});">Contactanos</a></li>
	    	</ul>
	  	</div>
		</div>
	</nav>

	<div ng-controller="WelcomeController" ng-hide="fakeIntro">
	<!-- HEADER
	   ================================================== -->	  
	  	
	  	<header>
		 	<div class="container">
			 	<div class="row">
				 	<div class="col-md-12">
				 		<img class="img-app-icon" src="img/icono.png">
					  	<h1>tU LOCALIDAD</h1>
					  	<p class="lead">Un directorio pensado para ti...</p>				  
					  	<div class="carousel-iphone">
					  		<div id="carousel-example-generic" class="carousel slide">
					    
							    <!-- Indicators -->
							    <ol class="carousel-indicators">
							      	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							      	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							      	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							    </ol>
							  
							    <!-- Wrapper for slides -->
							    <div class="carousel-inner">
							      	<div class="item active">
							        	<img src="img/screenshots/app-1.jpg" alt="App Screen 1">
							      	</div>
							      	<div class="item">
							        	<img src="img/screenshots/app-2.jpg" alt="App Screen 2">
							      	</div>
							      	<div class="item">
							        	<img src="img/screenshots/app-3.jpg" alt="App Screen 3">
							      	</div>
							    </div>
					  		</div>
						</div>
					</div>	  
				</div>    
			</div>
	 	</header>
	  
	  
	  <!-- PURCHASE
	      ================================================== -->
	  	<section class="purchase">
		  	<div class="container">
			  	<div class="row">
				  	<div class="col-md-offset-2 col-md-8 entrar">
				  		<br><br>
				  		<a href="{{ url ('/servicios') }}">
					  		<div class="button-intro">
							    <div class="compass"></div>
							    <div class="circule-logo-intro"></div>
							    <div class="msg">Entrar</div>
							</div>
						</a>
						<div class="mapa-play button">
    						<a href="{{ url ('/servicios') }}">
      							<img class="mapa-img" src="img/mapa.jpg" alt="ggIO">
    						</a>
						</div>	
					 	<h1>Descargala completamente gratis.</h1>
					 	    <p class="lead">Busca las empresas que tienes cerca.</p>
					 	    <div class="andrid-play button">
	    						<a target="_blank" href="https://play.google.com/store/apps/details?id=com.ionicframework.tulocalidad511234">
	      							<img class="android-img" src="img/Download-Android-App.png" alt="ggIO">
	    						</a>
							</div>	
				  	</div>
			  	</div>
		  	</div>
	  	</section>
	  
	  
	  <!-- PAYOFF 
	      ================================================== -->
	  	<section class="payoff">
			<div class="container">
			  	<div class="row">
				  	<div class="col-md-12">
					  	<h1>Somos una <B>aplicación</B> que le brinda la posibilidad de buscar información de todas las <B>empresas</B> teniendo la facilidad de buscarlas en tu equipo <B>celular</B>.</h1>
				  	</div>
			  	</div>
		  	</div>	  
	  	</section>
	  
	  
	  <!-- DETAILS 
	      ================================================== -->
	  	<section class="detail">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="carousel-example-generic-2" class="carousel slide">
										
					  	<!-- Wrapper for slides -->
					  	<div class="carousel-inner">
					    <div class="item active">
					      	<div class="row">
					      		<div class="col-sm-12 col-md-offset-1 col-md-6">
					      			<h1>Entra y encuentra todo lo que estas buscando sobre tu localidad.</h1>
					      			<p>Seleciona tu estado y las categorías.</p>
					      			<p>Las Empresas más buscadas.</p>
					      			<p>Acerca de nosotros.<p>
					      		</div>
					      		<div class="col-sm-12 col-md-5">
					      			<div class="app-screenshot">
					      				<img src="img/screenshots/app-1.jpg" class="img-responsive" alt="App Screen 1">
					      			</div>
					      		</div>
					      	</div>
					    </div>
					    <div class="item">
					    	<div class="row">
					    		<div class="col-sm-12 col-md-offset-1 col-md-6">
					    			<h1>Seleciona todas la categoría que estas buscando.</h1>
					    			<p>Busca las categorías de las empresa que estas buscando y encuentra toda la información.</p>
					    		</div>
					    		<div class="col-sm-12 col-md-5">
					    			<div class="app-screenshot">
					    				<img src="img/screenshots/app-4.jpg" class="img-responsive" alt="App Screen 2">
					    			</div>
					    		</div>
					    	</div>
						</div>
					    <div class="item">
					      	<div class="row">
					      		<div class="col-sm-12 col-md-offset-1 col-md-6">
					      			<h1>Encuentra toda la información de la Empresa.</h1>
					      			<p>Posición y Dirección.</p>
					      			<p>Teléfonos y correos.</p>
					      			<p>Páguina Web</p>
					      			<p>y mucho más...</p>
					      		</div>
					      		<div class="col-sm-12 col-md-5">
					      			<div class="app-screenshot">
					      				<img src="img/screenshots/app-3.jpg" class="img-responsive" alt="App Screen 3">
					      			</div>
					      		</div>
					      	</div>
					    </div>
					</div>
					
					  		<!-- Indicators -->
					  		<ol class="carousel-indicators">
					    		<li data-target="#carousel-example-generic-2" data-slide-to="0" class="active"></li>
					    		<li data-target="#carousel-example-generic-2" data-slide-to="1"></li>
					    		<li data-target="#carousel-example-generic-2" data-slide-to="2"></li>
					  		</ol>		
						</div>
					</div>
				</div>
			</div>
		</section>

	  
	  <!-- FEATURES
	      ================================================== -->
	  	<section class="features">
		  	<div class="container">
			  	<div class="row">
				
				  	<div class="col-md-4">
					  	<div><img src="img/informacion.png"></div>
					  	<h2>Información</h2>
					  	<p>Viaja por toda venezuela y encuentra lugares de interés en un solo lugar.</p>
				  	</div>
				
				  	<div class="col-md-4">
					  	<div><img src="img/movil.png"></div>
					  	<h2>Móvil</h2>
					  	<p>Todo lo tendrás al alcance de tus manos, en pocos pasos podrás encontrar en <b>Tu Localidad</b> el servicio de tu necesidad.</p>
				  	</div>
				 
				  	<div class="col-md-4">
					  	<div><img src="img/busqueda.png"></div>
					  	<h2>Busqueda</h2>
					  	<p><b>Tu localidad
					  	</b> te Facilita la busqueda de establecimientos de tu interés para ahorrarte tiempo.</p>
				  	</div>
				  
			  	</div>
			  	<br>
			  	<div class="row">
				
				  	<div class="col-md-4">
					  	<div><img src="img/comodidad.png"></div>
					  	<h2>Comodidad</h2>
					  	<p>Brindrá soluciones tanto para el usuario que lo descarga como para la empresa que se registra en <b>Tu Localidad</b>.</p>
				  	</div>
				
				  	<div class="col-md-4">
					  	<div><img src="img/rapidez.png"></div>
					  	<h2>Rapidéz</h2>
					  	<p>En el momento que necesites algun servicio y no sepas donde encontrarlo, <b>Tu Localidad</b> te lo podrá a disposición inmediatamente.</p>
				  	</div>
				 
				  	<div class="col-md-4">
					  	<div><img src="img/empresa.png"></div>
					  	<h2>Empresa</h2>
					  	<p>Registra tu empresa totalmente gratis y darte a conocer en tu ciudad local.</p>
				  	</div>
				  
			  	</div>
		  	</div>
	  	</section>

	  	  <!-- DESCARGA
	      ================================================== -->
	  	<section class="descarga">
		  	<div class="container">
			  	<div class="row">
			  		<div class="col-md-4">
			  			<div class="text-descarga">
			  				<img src="img/text-descarga.jpg">
			  			</div>
					</div>
				 	<div class="col-md-4">
						<img src="img/descarga_tu_localidad.jpg">
				 	</div>
				 	<div class="col-md-4 col-descarga">
				 		<a target="_blank" href="https://play.google.com/store/apps/details?id=com.ionicframework.tulocalidad511234">
	   
							<div class="col-img-descarga">
								<img src="img/descarga_tu_localidad_play.jpg">
							</div>
							<div class="col-img-descarga">
								<img src="img/descarga_tu_localidad_logo.jpg">
							</div>
							<div class="col-img-descarga">
								<img src="img/descarga_tu_localidad_instalar.jpg">
							</div>
							<div class="col-img-descarga">
								<img src="img/descarga_tu_localidad_instalado.jpg">
							</div>

						</a>
					</div>
			  	</div>
		  	</div>
	  	</section>

	  <!-- DESCARGA
	      ================================================== -->
	  	<section class="registrar">
		  	<div class="container">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<a href="{{ url ('/auth/login') }}">
			  				<img src="img/9-registrate.jpg">
			  			</a>
			  		</div>
			  	</div>
		  	</div>
	  	</section>

	 <!-- SOCIAL
	     ================================================== -->
	  	<section class="social">
	  		<div class="container">
	  		  	<div class="row">
	  			  	<div class="col-md-12">
	  			  		<br>
						<h2 style="color: #000;">Conéctate a nuestras Redes...</h2>
	  			  		<br>
	  			   		<a target="_blank" href="https://www.facebook.com/KeySystems.ca" class="icon-facebook"></a>
	  			   		<a target="_blank" href="https://twitter.com/keysystemsca" class="icon-twitter"></a>
	  			   		<a target="_blank" href="https://instagram.com/keysystemsca/" class="icon-instagram"></a>
	  			   		<a target="_blank" href="https://www.youtube.com/user/KeySystemsCa" class="icon-youtube"></a>
	  			   		<br><br>	
	  			   	</div>
	  		  	</div>
	  	  	</div>	  
	  	</section>
	  

	 <!-- GET IT 
	     ================================================== -->
	  	<section class="get-it">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-md-12">
	  					<h1>Recuerda</h1>
	  					<p class="lead">Solo necesitas tenerlo en tu dispositivo movil, para encontrar lo que necesites...</p>
	  					<div class="andrid-play">
							<a target="_blank" href="https://play.google.com/store/apps/details?id=com.ionicframework.tulocalidad511234">
									<img class="android-img" src="img/Download-Android-App.png" alt="Descargala en Android">
							</a>
							</div>	
	  				</div>
		  			<div class="col-md-12">
		  				<hr />
			  			<ul>
		                	<li><a target="_blank" href="http://keysystems.com.ve/contacto/">Contáctanos</a></li>
		                	<li><a target="_blank" href="https://twitter.com/keysystemsca">Twitter</a></li>
		                	<li><a target="_blank" href="http://keysystems.com.ve/tienda/">Tienda</a></li>
		                	<li><a target="_blank" href="http://keysystems.com.ve/planes/">Planes</a></li>
		                	<li><a target="_blank" href="http://keysystems.com.ve">Desarrolladores</a></li>
		                	<li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.ionicframework.keysystems549574">Aplicación</a></li>
	                	</ul>
		  			</div>
	  			</div>
	  		</div>
	  	</section>
		
		<footer class="footer">
	      	<div class="container">
	        	<p class="text-muted">Desarrollado por <a href="http://keysystemsca.com.ve/">Key Systems C.A</a> – Todos los derechos reservados  2015</p>
	      	</div>
    	</footer>

	</div>
	
<!-- Scripts -->
			 <!-- JAVASCRIPT
		     ================================================== -->
	    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
	    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/retinajs/dist/retina.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/animatescroll/animatescroll.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/lodash/dist/lodash.js') }}"></script>
			
		<!-- Module Angular -->
	    <script src="{{ asset('/bower_components/angular-animate/angular-animate.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-loading-bar/src/loading-bar.js') }}"></script>
		<script src="{{ asset('/bower_components/angular-google-maps/dist/angular-google-maps.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-resource/angular-resource.js') }}"></script>

		<script src="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.js') }}"></script>
		<script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>

		 <!-- your app's js -->
    	<script src="{{ asset('/js/app.js') }}"></script>
    	<script src="{{ asset('/js/controller.js') }}"></script>

	    <!-- Scripts -->
	    <script src="{{ asset('/js/scripts.js') }}"></script>

	</body>
</html>
