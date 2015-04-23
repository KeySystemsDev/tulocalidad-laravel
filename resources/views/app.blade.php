<!DOCTYPE html>
<html lang="en" ng-app="tulocalidad">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Tu Localidad | Venezuela:.</title>

		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

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
	    <!-- Template Styles -->
	    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" media="screen">
	    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/animate.css/animate.min.css') }}">
	    <link rel="shortcut icon" href="favicon.ico" />

	</head>
	
	<body>
		
		@yield('content')

		<!-- Scripts -->
			 <!-- JAVASCRIPT
		     ================================================== -->
	    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
	    <script src="{{ asset('/bower_components/retinajs/dist/retina.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/animatescroll/animatescroll.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/retinajs/dist/retina.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/lodash/dist/lodash.js') }}"></script>

	    <!-- your app's js -->
    	<script src="{{ asset('/js/app.js') }}"></script>
    	<script src="{{ asset('/js/controller.js') }}"></script>
    	<script src="{{ asset('/js/services.js') }}"></script>

	    <!-- Modules Angular -->
	    <script src="{{ asset('/bower_components/angular-google-maps/dist/angular-google-maps.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-resource/angular-resource.js') }}"></script>

	    <!-- Scripts -->
	    <script src="{{ asset('/js/scripts.js') }}"></script>

	</body>
</html>
