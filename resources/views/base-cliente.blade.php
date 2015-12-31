<!DOCTYPE html>
<html lang="en" ng-app="base-name-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content='{{ csrf_token() }}'>

    <title>.: Tulocalidad :.</title>
	
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
	
	<!-- THema CART -->
	<link href="{{ asset('/cart/Eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('/cart/Eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('/cart/Eshopper/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('/cart/Eshopper/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('/cart/Eshopper/css/responsive.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style-cliente.css') }}" rel="stylesheet">	

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
    <script src="{{ asset('/bower_components/lodash/dist/lodash.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-google-maps/dist/angular-google-maps.js') }}"></script>
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
	<script src="{{ asset('/cart/Eshopper/js/jquery.scrollUp.min.js') }}"></script>

	<!-- Thema Frontend JS -->
	<script src="{{ asset('/thema/frontend/one-page-parallax/assets/js/apps.min.js') }}"></script>

	<!-- remote-validation -->
	<script src="{{ asset('/bower_components/ng-remote-validate/release/ngRemoteValidate.js') }}"></script>
	
	<!-- ===================== ANGULAR CONTROLLERS ==============================-->
	@yield('controller')
	
	<script>
		$(document).ready(function() {
			App.init();
			$(function () {
				$.scrollUp({
			        scrollName: 'scrollUp', // Element ID
			        scrollDistance: 300, // Distance from top/bottom before showing element (px)
			        scrollFrom: 'top', // 'top' or 'bottom'
			        scrollSpeed: 300, // Speed back to top (ms)
			        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
			        animation: 'fade', // Fade, slide, none
			        animationSpeed: 200, // Animation in speed (ms)
			        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
							//scrollTarget: false, // Set a custom target element for scrolling to the top
			        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
			        scrollTitle: false, // Set a custom <a> title if required.
			        scrollImg: false, // Set true to use image
			        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			        zIndex: 2147483647 // Z-Index for the overlay
				});
			});
		});
	</script>
	
</body>
</html>
