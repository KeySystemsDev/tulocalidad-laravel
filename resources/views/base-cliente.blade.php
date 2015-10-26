<!DOCTYPE html>
<html lang="en" ng-app="tulocalidad">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content='{{ csrf_token() }}'>

    <title>.:Tu Localidad | Venezuela:.</title>
	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- css HoverEffectIdeas -->
	<link href="{{ asset('/css/HoverEffectIdeas/set1.css') }}" rel="stylesheet">

    <!-- angular modules style -->
    <link href="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" />

	<link href="{{ asset('/bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
	
	<link href="{{ asset('/thema/assets-frontend/css/style-theme.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/assets-frontend/css/style-responsive-theme.css') }}" rel="stylesheet" type="text/css">
	<!-- Thema CSS -->
	<link href="{{ asset('/thema/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/assets-frontend/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/assets-frontend/css/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/assets-frontend/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/assets-frontend/css/theme/default.css') }}" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  	<link href="{{ asset('/thema/assets/plugins/isotope/isotope.css') }}" rel="stylesheet" />
  	<link href="{{ asset('/thema/assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('/thema/assets-frontend/plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
	
	@yield('content')

    <!-- jquery modules -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('/thema/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>

	<!-- bootstrap modules -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>
    <script src="{{ asset('/bower_components/lodash/dist/lodash.js') }}"></script>

    <!-- your app's js -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/controller.js') }}"></script>
    <!--<script src="{{ asset('/js/directives.js') }}"></script>-->
    <script src="{{ asset('/js/services.js') }}"></script>

    <!-- angular modules -->
    <script src="{{ asset('/bower_components/angular-animate/angular-animate.min.js') }}"></script>
    <script src="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>
    <script src="{{ asset('/bower_components/ui-select/dist/select.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-resource/angular-resource.min.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-tooltips/dist/angular-tooltips.min.js') }}"></script>
	<script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>
	<script src="{{ asset('/bower_components/angular-google-maps/dist/angular-google-maps.js') }}"></script>

	<!-- bootstrap jasny-->
    <script src="{{ asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
	
	<!-- Thema JS -->
	<script src="{{ asset('/thema/assets-frontend/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('/thema/assets-frontend/plugins/scrollMonitor/scrollMonitor.js') }}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('/thema/assets/plugins/isotope/jquery.isotope.min.js') }}"></script>
  	<script src="{{ asset('/thema/assets/plugins/lightbox/js/lightbox-2.6.min.js') }}"></script>
	<script src="{{ asset('/thema/assets/js/gallery.demo.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script src="{{ asset('/thema/assets-frontend/js/apps.min.js') }}"></script>

	<!-- ===================== ANGULAR CONTROLLERS ==============================-->
	@yield('controller')
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
</body>
</html>
