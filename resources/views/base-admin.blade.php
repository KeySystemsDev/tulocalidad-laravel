<!DOCTYPE html>
<html lang="en" ng-app="base-name-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content='{{ csrf_token() }}'>

    <title>.: Base Admin :.</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- angular modules style -->
    <link href="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.css') }}" rel="stylesheet">

    <!-- bootstrap modules style -->
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- bootstrap jasny-->
	<link href="{{ asset('/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="{{ asset('/bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Thema CSS -->
	<link href="{{ asset('/thema/admin/html/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/admin/html/assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/admin/html/assets/css/style-responsive.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/admin/html/assets/css/theme/default.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('/thema/admin/html/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('/thema/admin/html/assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-wizard/css/bwizard.min.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/password-indicator/css/password-indicator.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('/thema/admin/html/assets/plugins/jquery-tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
    <link href="{{ asset('/thema/admin/html/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" />

	<!-- select2 -->
	<link href="{{ asset('/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

  	<!-- ui-select files -->
	
	<link rel="stylesheet" href="{{ asset('/bower_components/ui-select/dist/select.css') }}">	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="{{ asset('/thema/admin/html/assets/plugins/pace/pace.min.js') }}"></script>
</head>
<body>
	
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	
	@yield('content')

	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->

    <!-- jquery modules -->
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>


    <!-- Scripts -->
    <script src="{{ asset('/bower_components/angular/angular.js') }}"></script>

    <!-- your app's js -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/controller.js') }}"></script>
    <script src="{{ asset('/js/service.js') }}"></script>
    <script src="{{ asset('/js/directives.js') }}"></script>

    <!-- angular modules -->
    <script src="{{ asset('/bower_components/ngImgCrop/compile/minified/ng-img-crop.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-base64/angular-base64.min.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-resource/angular-resource.min.js') }}"></script>
    <script src="{{ asset('/bower_components/ui-select/dist/select.js') }}"></script>
    <script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.js') }}"></script>


    <!-- bootstrap modules -->
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<!-- bootstrap jasny-->
    <script src="{{ asset('/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
	
	<!-- Thema JS -->
	<script src="{{ asset('/thema/admin/html/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/js/dashboard-v2.min.js') }}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-wizard/js/bwizard.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/js/form-wizards.demo.min.js') }}"></script>
	<!-- select -->
	<script src="{{ asset('/bower_components/jquery-placeholder/jquery.placeholder.min.js') }}"></script>
	<script src="{{ asset('/bower_components/select2/dist/js/select2.min.js') }}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('/thema/admin/html/assets/js/login-v2.demo.min.js') }}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/masked-input/masked-input.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/password-indicator/js/password-indicator.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/plugins/jquery-tag-it/js/tag-it.min.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-daterangepicker/moment.js') }}"></script>
    <script src="{{ asset('/thema/admin/html/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/js/form-plugins.demo.min.js') }}"></script>
	<script src="{{ asset('/thema/admin/html/assets/js/apps.min.js') }}"></script>
	
	<!-- ===================== ANGULAR CONTROLLERS ==============================-->
	@yield('controller')

	<script>
		$(document).ready(function() {
			App.init();
			DashboardV2.init(); /*quitar cuando no se usan elmentos de esta vista*/
		});
	</script>
	
</body>
</html>