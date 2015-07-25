<!DOCTYPE html>
<html lang="en" ng-app="tulocalidad">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>.:Tu Localidad | Venezuela:.</title>

		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		
		<!-- css HoverEffectIdeas -->
		<link href="{{ asset('/css/HoverEffectIdeas/set1.css') }}" rel="stylesheet">


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
	    <!-- Boostrap Module-->
	    <link href="{{ asset('/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" media="screen">
	    <!-- Google Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	    <!-- Font-Awesome -->
	    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
	    <!-- Module Angular-->    
		<link href="{{ asset('/bower_components/angular-loading-bar/src/loading-bar.css') }}" rel='stylesheet' />
		<link href="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.css') }}" rel="stylesheet" type="text/css">

	    <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/animate.css/animate.min.css') }}">
	    <link rel="shortcut icon" href="favicon.ico" />

	    <!-- Theme 
	        ================================================== -->
	    <link href="{{ asset('/theme-admin/css/style.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/css/bootstrap-reset.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/css/owl.carousel.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/css/owl.theme.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/css/owl.transitions.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/css/table-responsive.css') }}" rel="stylesheet" media="screen">
	    <link href="{{ asset('/theme-admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css">
	    <link href="{{ asset('/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		
		<!-- Template Styles -->
	    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" media="screen">
	    
	</head>
	
	<body>
		<!-- start:wrapper -->
    	<div id="wrapper">
			@yield('content')
		</div>
		
		<!-- Scripts -->
			 <!-- JAVASCRIPT
		     ================================================== -->
	    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
	    <script src="{{ asset('/bower_components/lodash/dist/lodash.js') }}"></script>

	    <!-- bootstrap Modules-->
	    <script src="{{ asset('/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

	    <!-- your app's js -->
    	<script src="{{ asset('/js/app.js') }}"></script>
    	<script src="{{ asset('/js/controller.js') }}"></script>
    	<script src="{{ asset('/js/services.js') }}"></script>

	    <!-- Modules Angular -->
	    <script src="{{ asset('/bower_components/angular-animate/angular-animate.min.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-loading-bar/src/loading-bar.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-google-maps/dist/angular-google-maps.js') }}"></script>
	    <script src="{{ asset('/bower_components/angular-resource/angular-resource.js') }}"></script>

		<script src="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.js') }}"></script>
		<script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>

	    <!-- Theme 
	        ================================================== -->
	    <script src="{{ asset('/theme-admin/js/themes.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/jquery.scrollTo.min.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/jquery.nicescroll.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/jquery.sparkline.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/jquery.dcjqaccordion.2.7.min.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/respond.min.js') }}"></script>
	    <script src="{{ asset('/theme-admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/owl.carousel.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/jquery.customSelect.min.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/sparkline-chart.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/easy-pie-chart.js') }}"></script>
	    <script src="{{ asset('/theme-admin/js/count.js') }}"></script>
	    <script src="{{ asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

		@yield('js')
	</body>
</html>
