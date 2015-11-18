<!DOCTYPE html>
<html lang="en" ng-app="base-name-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content='{{ csrf_token() }}'>

    <title>.: Base Cliente :.</title>
	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    
    <!-- angular modules style -->
    <link href="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link rel="shortcut icon" href="favicon.ico" />
	
	<!-- bootstrap modules style -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Iconos -->
	<link href="{{ asset('/bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
	
	<!-- CCS Thema Admin modificado -->
	<link href="{{ asset('/thema/admin/html/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/admin/style-admin.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/admin/style-responsive-admin.min.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Thema Frontend CSS  -->
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/frontend/one-page-parallax/assets/css/theme/default.css') }}" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- Thema Admin CSS  -->
	
	<link href="{{ asset('/thema/admin/html/assets/plugins/isotope/isotope.css') }}" rel="stylesheet" />
  	<link href="{{ asset('/thema/admin/html/assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet" />
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('/thema/frontend/one-page-parallax/assets/plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>
<body>
	
	@yield('content')

    <!-- jquery modules -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-migrate/jquery-migrate.min.js') }}"></script>
    
	<!-- Thema Admin JS  -->
    <script src="{{ asset('/thema/admin/html/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>

	<!-- bootstrap modules -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>

    <!-- your app's js -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/controller.js') }}"></script>
    <script src="{{ asset('/js/directives.js') }}"></script>
    <script src="{{ asset('/js/service.js') }}"></script>

    <!-- angular modules -->
    <script src="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>
    <script src="{{ asset('/bower_components/ui-select/dist/select.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-resource/angular-resource.min.js') }}"></script>

	<!-- bootstrap jasny-->
    <script src="{{ asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
	
	<!-- Thema JS Frontend -->
	<script src="{{ asset('/thema/frontend/one-page-parallax/assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('/thema/frontend/one-page-parallax/assets/plugins/scrollMonitor/scrollMonitor.js') }}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->

	<!-- Thema Admin JS  -->
	<script src="{{ asset('/thema/admin/html/assets/plugins/isotope/jquery.isotope.min.js') }}"></script>
  	<script src="{{ asset('/thema/admin/html/assets/plugins/lightbox/js/lightbox-2.6.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/js/gallery.demo.min.js') }}"></script>
	
	<!-- Thema Frontend JS -->
	<script src="{{ asset('/thema/frontend/one-page-parallax/assets/js/apps.min.js') }}"></script>
	
	<!-- ===================== ANGULAR CONTROLLERS ==============================-->
	@yield('controller')
	
	<script>
		$(document).ready(function() {
			App.init();
			Gallery.init();
		});
	</script>
	
</body>
</html>
