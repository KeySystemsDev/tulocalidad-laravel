<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="Responsive Bootstrap App Landing Page Template">
<meta name="keywords" content="Kane, Bootstrap, Landing page, Template, App, Mobile">
<meta name="author" content="Mizanur Rahman">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- SITE TITLE -->
<title>Kane - Responsive App Landing Page</title>

<!-- =========================
      FAV AND TOUCH ICONS  
============================== -->
<link rel="icon" href="http://templateocean.com/premium/template/kane/files/images/favicon.ico">
<link rel="apple-touch-icon" href="http://templateocean.com/premium/template/kane/files/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="http://templateocean.com/premium/template/kane/files/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="http://templateocean.com/premium/template/kane/files/images/apple-touch-icon-114x114.png">

<!-- =========================
     STYLESHEETS   
============================== -->
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/bootstrap.min.css') }}">

<!-- FONT ICONS -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/assets/elegant-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('/theme-welcome/assets/app-icons/styles.css') }}">
<!--[if lte IE 7]><script src="lte-ie7.js"></script><![endif]-->

<!-- WEB FONTS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>

<!-- CAROUSEL AND LIGHTBOX -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/nivo-lightbox.css') }}">
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/nivo_themes/default/default.css') }}">

<!-- ANIMATIONS -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/animate.min.css') }}">

<!-- CUSTOM STYLESHEETS -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/styles.css') }}">

<!-- COLORS | CURRENTLY USED DIFFERENTLY TO SWITCH FOR DEMO. IN ORIGINAL FILE ALL COLORS LINK IS COMMENTED EXCEPT BLUE -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/colors/blue.css') }}" title="blue">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/green.css') }}" title="green">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/orange.css') }}" title="orange">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/purple.css') }}" title="purple">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/slate.css') }}" title="slate">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/yellow.css') }}" title="yellow">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/red.css') }}" title="red">
<link rel="alternate stylesheet" href="{{ asset('/theme-welcome/css/colors/blue-munsell.css') }}" title="blue-munsell">

<!-- RESPONSIVE FIXES -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/css/responsive.css') }}">

<!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
<link rel="stylesheet" href="{{ asset('/theme-welcome/demo/demo.css') }}">


<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
<![endif]-->

<!-- JQUERY -->
<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>

</head>

<body>
<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER   
============================== -->
<header class="header" data-stellar-background-ratio="0.5" id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay"> <!-- To make header full screen. Use .full-screen class with color overlay. Example: <div class="color-overlay full-screen">  -->
	
	<!-- STICKY NAVIGATION -->
	<div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
		<div class="container">
			<div class="navbar-header">
				
				<!-- LOGO ON STICKY NAV BAR -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kane-navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="#"><img src="http://templateocean.com/premium/template/kane/files/images/logo.png" alt=""></a>

			</div>
			
			<!-- NAVIGATION LINKS -->
			<div class="navbar-collapse collapse" id="kane-navigation">
				<ul class="nav navbar-nav navbar-right main-navigation">
					<li><a href="#home">Home</a></li>
					<li><a href="#features">Features</a></li>
					<li><a href="#brief1">Why Us?</a></li>
					<li><a href="#brief2">Desicribe</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#screenshot-section">Screenshots</a></li>
					<li><a href="#download">Download</a></li>
				</ul>
			</div>
		</div> <!-- /END CONTAINER -->
	</div> <!-- /END STICKY NAVIGATION -->
	
	
	<!-- CONTAINER -->
	<div class="container">
		
		<!-- ONLY LOGO ON HEADER -->
		<div class="only-logo">
			<div class="navbar">
				<div class="navbar-header">
					<img src="http://templateocean.com/premium/template/kane/files/images/logo.png" alt="">
				</div>
			</div>
		</div> <!-- /END ONLY LOGO ON HEADER -->

		
		<div class="row home-contents">
			<div class="col-md-6 col-sm-6">
				
				<!-- HEADING AND BUTTONS -->
				<div class="intro-section">
					
					<!-- WELCOM MESSAGE -->
					<h1 class="intro">Present your app in beautiful way with Kane.</h1>
					<h5>Available on App Store and Play Store</h5>
					
					<!-- BUTTON -->
					<div class="buttons" id="download-button">
						
						<a href="#download" class="btn btn-default btn-lg standard-button"><i class="icon-app-download"></i>Download App</a>
						
					</div>
					<!-- /END BUTTONS -->
					
				</div>
				<!-- /END HEADNING AND BUTTONS -->
				
			</div>
			
			
			<div class="col-md-6 col-sm-6 hidden-xs">
			    
			    <!-- PHONE IMAGE WILL BE HIDDEN IN TABLET PORTRAIT AND MOBILE-->
			    <div class="phone-image">
			    <img src="http://templateocean.com/premium/template/kane/files/images/2-iphone-right.png" class="img-responsive" alt="">
			    </div>
			    
			</div>
			
		</div>
		<!-- /END ROW -->
		
	</div>
	<!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->
</header>
<!-- /END HEADER -->

<!-- =========================
     FEATURES 
============================== -->
<section class="features" id="features">

<div class="container">
	
	<!-- SECTION HEADER -->
	<div class="section-header wow fadeIn animated" data-wow-offset="120" data-wow-duration="1.5s">
		
		<!-- SECTION TITLE -->
		<h2 class="white-text">Amazing Features</h2>
		<div class="colored-line">
		</div>
		<div class="section-description">
			List your app features and all the details Lorem ipsum dolor kadr
		</div>
		<div class="colored-line">
		</div>
	</div>
	<!-- /END SECTION HEADER -->
	
	
	<div class="row">
		
		<!-- FEATURES LEFT -->
		<div class="col-md-4 col-sm-4 features-left wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_map_alt"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">Responsive Design</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magna.
					</p>
				</div>
				
			</div>
			<!-- /END SINGLE FEATURE -->
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_gift_alt"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">Bootstrap 3.1</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magna.
					</p>
				</div>
				
			</div>
			<!-- /END SINGLE FEATURE -->
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_tablet"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">Cross-Browser Support</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magn.
					</p>
				</div>
				
			</div>
			<!-- /END SINGLE FEATURE -->
			
		</div>
		<!-- /END FEATURES LEFT -->
		
		<!-- PHONE IMAGE -->
		<div class="col-md-4 col-sm-4">
			<div class="phone-image wow bounceIn animated" data-wow-offset="120" data-wow-duration="1.5s">
				<img src="http://templateocean.com/premium/template/kane/files/images/single-iphone.png" alt="">
			</div>
		</div>
		
		<!-- FEATURES RIGHT -->
		<div class="col-md-4 col-sm-4 features-right wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_genius"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">360+ Icon Fonts</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magna.
					</p>
				</div>
				
			</div>
			<!-- /END SINGLE FEATURE -->
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_lightbulb_alt"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">Creative Design</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magna.
					</p>
				</div>
				
			</div>
			
			<!-- /END SINGLE FEATURE -->
			
			<!-- FEATURE -->
			<div class="feature">
				
				<!-- ICON -->
				<div class="icon-container">
					<div class="icon">
						<i class="icon_ribbon_alt"></i>
					</div>
				</div>
				
				<!-- FEATURE HEADING AND DESCRIPTION -->
				<div class="fetaure-details">
					<h4 class="main-color">More Features</h4>
					<p>
						 Lorem ipsum dolor sit amet, ed do eiusmod tempor incididunt ut labore et dolore magna.
					</p>
				</div>
				
			</div>
			<!-- /END SINGLE FEATURE -->
			
		</div>
		<!-- /END FEATURES RIGHT -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END FEATURES SECTION -->


<!-- =========================
     BRIEF LEFT SECTION 
============================== -->
<section class="app-brief deep-dark-bg" id="brief1">

<div class="container">
	
	<div class="row">
		
		<!-- PHONES IMAGE -->
		<div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			<div class="phone-image">
				<img src="http://templateocean.com/premium/template/kane/files/images/2-iphone-left.png" alt="">
			</div>
		</div>
		
		<!-- RIGHT SIDE WITH BRIEF -->
		<div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SECTION TITLE -->
			<h2 class="white-text">Explain why it's best</h2>
			
			<div class="colored-line-left">
			</div>
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</p>
			
			<!-- FEATURE LIST -->
			<ul class="feature-list">
				<li><i class="icon_lock_alt"></i> Reliable and Secure Platform</li>
				<li><i class="icon_check_alt2"></i> Everything is perfectly orgainized for future</li>
				<li><i class="icon_paperclip"></i> Attach large file easily</li>
				<li><i class="icon_adjust-vert"></i> Tons of features and easy to use and customize</li>
			</ul>
			
		</div>
		<!-- /END RIGHT BRIEF -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->


<!-- =========================
     BRIEF RIGHT SECTION 
============================== -->
<section class="app-brief" id="brief2">

<div class="container">
	
	<div class="row">
		
		<!-- BRIEF -->
		<div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SECTION TITLE -->
			<h2 class="white-text">Great way to describe your app</h2>
			
			<div class="colored-line-left">
			</div>
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/><br/>
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			
		</div>
		<!-- /ENDBRIEF -->
		
		<!-- PHONES IMAGE -->
		<div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			<div class="phone-image">
				<img src="http://templateocean.com/premium/template/kane/files/images/2-iphone-right.png" alt="">
			</div>
		</div>
		<!-- /END PHONES IMAGE -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->


<!-- =========================
     BRIEF LEFT SECTION WITH VIDEO 
============================== -->
<section class="app-brief deep-dark-bg" id="brief1">

<div class="container">
	
	<div class="row">
		
		<!-- PHONES IMAGE -->
		<div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
			<div class="video-container">
				
                <!--
				<div class="video">
					
					<iframe src="//player.vimeo.com/video/88902745?byline=0&amp;portrait=0&amp;color=ffffff" width="600" height="338" frameborder="0" allowfullscreen>
					</iframe> 
				</div>
				-->
				
				<div class="video">
					
					<iframe width="640" height="360" src="//www.youtube.com/embed/VjbGg-VuqbU?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
				
			</div>

		</div>
		
		<!-- RIGHT SIDE WITH BRIEF -->
		<div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SECTION TITLE -->
			<h2 class="white-text">Description with video</h2>
			
			<div class="colored-line-left">
			</div>
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/><br/>
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
			</p>
			
			
		</div>
		<!-- /END RIGHT BRIEF -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->

<!-- =========================
     TESTIMONIALS 
============================== -->
<section class="testimonials">

<div class="color-overlay">
	
	<div class="container wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<!-- FEEDBACKS -->
		<div id="feedbacks" class="owl-carousel owl-theme">
			
			<!-- SINGLE FEEDBACK -->
			<div class="feedback">
				
				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/3.jpg" alt="">
				</div>
				
				<div class="message">
					 Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
				</div>
				
				<div class="white-line">
				</div>
				
				<!-- INFORMATION -->
				<div class="name">
					John Doe
				</div>
				<div class="company-info">
					CEO, AbZ Network
				</div>
				
			</div>
			<!-- /END SINGLE FEEDBACK -->
			
			<!-- SINGLE FEEDBACK -->
			<div class="feedback">
				
				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/1.jpg" alt="">
				</div>
				
				<div class="message">
					 Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
				</div>
				
				<div class="white-line">
				</div>
				
				<!-- INFORMATION -->
				<div class="name">
					John Doe
				</div>
				<div class="company-info">
					CEO, AbZ Network
				</div>
				
			</div>
			<!-- /END SINGLE FEEDBACK -->
			
			<!-- SINGLE FEEDBACK -->
			<div class="feedback">
				
				<!-- IMAGE -->
				<div class="image">
					<!-- i class=" icon_quotations"></i -->
					<img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/2.jpg" alt="">
				</div>
				
				<div class="message">
					 Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
				</div>
				
				<div class="white-line">
				</div>
				
				<!-- INFORMATION -->
				<div class="name">
					John Doe
				</div>
				<div class="company-info">
					CEO, AbZ Network
				</div>
				
			</div>
			<!-- /END SINGLE FEEDBACK -->
			
		</div>
		<!-- /END FEEDBACKS -->
		
	</div>
	<!-- /END CONTAINER -->
	
</div>
<!-- /END COLOR OVERLAY -->

</section>
<!-- /END TESTIMONIALS SECTION -->


<!-- =========================
     SERVICES
============================== -->
<section class="services" id="services">

<div class="container">
	
	<!-- SECTION HEADER -->
	<div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<!-- SECTION TITLE -->
		<h2 class="white-text">It's Awesome</h2>
		
		<div class="colored-line">
		</div>
		<div class="section-description">
			List your app features and all the details Lorem ipsum dolor kadr
		</div>
		<div class="colored-line">
		</div>
		
	</div>
	<!-- /END SECTION HEADER -->
	
	<div class="row">
		
		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_cloud-upload_alt"></i>
			</div>
			
			<!-- SERVICE HEADING -->
			<h3>Your Data in Cloud</h3>
			
			<!-- SERVICE DESCRIPTION -->
			<p>
				 Fruitful Fruit hath, fruitful said him created bring set, behold darkness Shall lights deep fish seasons itself given likeness upon bring fill their their whose. Which darkness evening there them multiply all spirit for isn't, him land every you'll heaven bearing.
			</p>
			
		</div>
		<!-- /END SINGLE SERVICE -->
		
		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_gift_alt"></i>
			</div>
			
			<!-- SERVICE HEADING -->
			<h3>Monthly Rewards</h3>
			
			<!-- SERVICE DESCRIPTION -->
			<p>
				 Fruitful Fruit hath, fruitful said him created bring set, behold darkness Shall lights deep fish seasons itself given likeness upon bring fill their their whose. Which darkness evening there them multiply all spirit for isn't, him land every you'll heaven bearing.
			</p>
			
		</div>
		<!-- /END SINGLE SERVICE -->
		
		<!-- SINGLE SERVICE -->
		<div class="col-md-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<!-- SERVICE ICON -->
			<div class="service-icon">
				<i class="icon_chat_alt"></i>
			</div>
			
			<!-- SERVICE HEADING -->
			<h3>24/7 Support</h3>
			
			<!-- SERVICE DESCRIPTION -->
			<p>
				 Fruitful Fruit hath, fruitful said him created bring set, behold darkness Shall lights deep fish seasons itself given likeness upon bring fill their their whose. Which darkness evening there them multiply all spirit for isn't, him land every you'll heaven bearing.
			</p>
			
		</div>
		<!-- /END SINGLE SERVICE -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END FEATURES SECTION -->


<!-- =========================
     SCREENSHOTS
============================== -->
<section class="screenshots deep-dark-bg" id="screenshot-section">

<div class="container">
	
	<!-- SECTION HEADER -->
	<div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<!-- SECTION TITLE -->
		<h2 class="white-text">Screenshots</h2>
		
		<div class="colored-line">
		</div>
		<div class="section-description">
			List your app features and all the details Lorem ipsum dolor kadr
		</div>
		<div class="colored-line">
		</div>
		
	</div>
	<!-- /END SECTION HEADER -->
	
	<div class="row wow bounceIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<div id="screenshots" class="owl-carousel owl-theme">
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/1.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/1.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/3.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/3.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/2.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/2.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/4.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/4.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/1.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/1.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/3.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/3.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/2.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/2.jpg" alt="Screenshot"></a>
			</div>
			
			<div class="shot">
				<a href="http://templateocean.com/premium/template/kane/files/images/screenshots/4.jpg" data-lightbox-gallery="screenshots-gallery"><img src="http://templateocean.com/premium/template/kane/files/images/screenshots/4.jpg" alt="Screenshot"></a>
			</div>
			
		</div>
		<!-- /END SCREENSHOTS -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SCREENSHOTS SECTION -->


<!-- =========================
     PRICING TABLE | Added on version 1.7   
============================== -->
<section class="packages" id="packages">

<div class="container">
	
	<!-- SECTION HEADER -->
	<div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<!-- SECTION TITLE -->
		<h2 class="white-text">Affordable Packages</h2>
		<div class="colored-line">
		</div>
		
		<div class="section-description">
			 List your app features and all the details Lorem ipsum dolor kadr
		</div>
		
		<div class="colored-line">
		</div>
	</div>
	<!-- /END SECTION HEADER -->
	
    <div class="row">
		
		<!-- SINGLE PACKACGE -->
		<div class="col-md-4 col-sm-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<div class="single-package">
				
				<h3 class="package-heading main-color">
				Personal </h3>
				
				<div class="price">
					<h2><span class="sign">$</span>50 <span class="month">/month</span></h2>
				</div>
				
				<ul class="package-feature">
					<li><span class="main-color icon_check_alt2"></span>Unlimited Photos</li>
					<li><span class="main-color icon_check_alt2"></span>Secure Online Transfer</li>
					<li><span class="main-color icon_check_alt2"></span>Unlimited Styles</li>
					<li><span class="main-color icon_check_alt2"></span>Cloud Storage</li>
					<li><span class="main-color icon_close_alt2"></span>24/7 Customer Service</li>
					<li><span class="main-color icon_close_alt2"></span>Automatic Backup</li>
				</ul>
				
			</div>
		</div>
		<!-- /END SINGLE PACKACGE -->
		
		<!-- SINGLE PACKACGE -->
		<div class="col-md-4 col-sm-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<div class="single-package">
				
				<h3 class="package-heading main-color">
				Business </h3>
				
				<div class="price">
					<div class="color-bg">
						<h2><span class="sign">$</span>75 <span class="month">/month</span></h2>
					</div>
				</div>
				
				<ul class="package-feature">
					<li><span class="main-color icon_check_alt2"></span>Unlimited Photos</li>
					<li><span class="main-color icon_check_alt2"></span>Secure Online Transfer</li>
					<li><span class="main-color icon_check_alt2"></span>Unlimited Styles</li>
					<li><span class="main-color icon_check_alt2"></span>Cloud Storage</li>
					<li><span class="main-color icon_check_alt2"></span>24/7 Customer Service</li>
					<li><span class="main-color icon_close_alt2"></span>Automatic Backup</li>
				</ul>
			</div>
		</div>
		<!-- /END SINGLE PACKACGE -->
		
		<!-- SINGLE PACKACGE -->
		<div class="col-md-4 col-sm-4 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
			
			<div class="single-package">
				
				<h3 class="package-heading main-color">
				Ultimate </h3>
				
				<div class="price">
					<h2><span class="sign">$</span>99 <span class="month">/month</span></h2>
				</div>
				
				<ul class="package-feature">
					<li><span class="main-color icon_check_alt2"></span>Unlimited Photos</li>
					<li><span class="main-color icon_check_alt2"></span>Secure Online Transfer</li>
					<li><span class="main-color icon_check_alt2"></span>Unlimited Styles</li>
					<li><span class="main-color icon_check_alt2"></span>Cloud Storage</li>
					<li><span class="main-color icon_check_alt2"></span>24/7 Customer Service</li>
					<li><span class="main-color icon_check_alt2"></span>Automatic Backup</li>
				</ul>
			</div>
		</div>
		<!-- /END SINGLE PACKACGE -->
		
	</div>
	<!-- /END ROW -->
	
</div>
<!-- /END CONTAINER -->
</section>
<!-- /END PRICING TABLE SECTION -->

<!-- =========================
     DOWNLOAD NOW 
============================== -->
<section class="download" id="download">

<div class="color-overlay">

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
				<!-- DOWNLOAD BUTTONS AREA -->
				<div class="download-container">
					<h2 class=" wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Download the app on</h2>
					
					<!-- BUTTONS -->
					<div class="buttons wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
						
						<a href="" class="btn btn-default btn-lg standard-button"><i class="icon-app-store"></i>App Store</a>
						<a href="" class="btn btn-default btn-lg standard-button"><i class="icon-google-play"></i>Play Store</a>
						
					</div>
					<!-- /END BUTTONS -->
					
				</div>
				<!-- END OF DOWNLOAD BUTTONS AREA -->
				
				
				<!-- SUBSCRIPTION FORM WITH TITLE -->
				<div class="subscription-form-container">
					
					<h2 class="wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Subscribe Now!</h2>
					
					<!-- =====================
					     MAILCHIMP FORM STARTS 
					     ===================== -->
					
					<form class="subscription-form mailchimp form-inline wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s" role="form">
						
						<!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
						<h4 class="subscription-success"></h4>
						<h4 class="subscription-error"></h4>
						
						<!-- EMAIL INPUT BOX -->
						<input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">
						
						<!-- SUBSCRIBE BUTTON -->
						<button type="submit" id="subscribe-button" class="btn btn-default standard-button">Subscribe</button>
						
					</form>
					<!-- /END MAILCHIMP FORM STARTS -->
					
					<!-- =====================
					     LOCAL TXT FORM STARTS 
					     ===================== -->
					     
					<!-- THIS FORM IS COMMENTED TO HIDE 
					
					<form class="subscription-form form-inline wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s" id="subscribe" role="form">
						
						<h4 class="subscription-success"><i class="icon_check"></i> Thank you! We will notify you soon.</h4>
						<h4 class="subscription-error">Something Wrong!</h4>
						
						<input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">
						
						<button type="submit" id="subscribe-button" class="btn btn-default standard-button">Subscribe</button>
						
					</form>
					
					-->
					
					<!-- / LOCAL TXT SAVING FORM END -->
					
				</div>
                <!-- END OF SUBSCRIPTION FORM WITH TITLE -->
				
			</div> 
			<!-- END COLUMN -->
			
		</div> 
		<!-- END ROW -->
		
	</div>
	<!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->

</section>
<!-- /END DOWNLOAD SECTION -->


<!-- =========================
     FOOTER 
============================== -->
<footer>

<div class="container">
	
	<div class="contact-box wow rotateIn animated" data-wow-offset="10" data-wow-duration="1.5s">
		
		<!-- CONTACT BUTTON TO EXPAND OR COLLAPSE FORM -->
		
		<a class="btn contact-button expand-form expanded"><i class="icon_mail_alt"></i></a>
		
		<!-- EXPANDED CONTACT FORM -->
		<div class="row expanded-contact-form">
			
			<div class="col-md-8 col-md-offset-2">
				
				<!-- FORM -->
				<form class="contact-form" id="contact" role="form">
					
					<!-- IF MAIL SENT SUCCESSFULLY -->
					<h4 class="success">
						<i class="icon_check"></i> Your message has been sent successfully.
					</h4>
					
						<!-- IF MAIL SENDING UNSUCCESSFULL -->
					<h4 class="error">
						<i class="icon_error-circle_alt"></i> E-mail must be valid and message must be longer than 1 character.
					</h4>
					
					<div class="col-md-6">
						<input class="form-control input-box" id="name" type="text" name="name" placeholder="Your Name">
					</div>
					
					<div class="col-md-6">
						<input class="form-control input-box" id="email" type="email" name="email" placeholder="Your Email">
					</div>
					
					<div class="col-md-12">
						<input class="form-control input-box" id="subject" type="text" name="subject" placeholder="Subject">
						<textarea class="form-control textarea-box" id="message" rows="8" placeholder="Message"></textarea>
					</div>
					
					<button class="btn btn-primary standard-button2 ladda-button" type="submit" id="submit" name="submit" data-style="expand-left">Send Message</button>
					
				</form>
				<!-- /END FORM -->
				
			</div>
			
		</div>
		<!-- /END EXPANDED CONTACT FORM -->
		
	</div>
	<!-- /END CONTACT BOX -->
	
	<!-- LOGO -->
	<img src="http://templateocean.com/premium/template/kane/files/images/logo.png" alt="LOGO" class="responsive-img">
	
	<!-- SOCIAL ICONS -->
	<ul class="social-icons">
		<li><a href=""><i class="social_facebook_square"></i></a></li>
		<li><a href=""><i class="social_twitter_square"></i></a></li>
		<li><a href=""><i class="social_pinterest_square"></i></a></li>
		<li><a href=""><i class="social_googleplus_square"></i></a></li>
		<li><a href=""><i class="social_instagram_square"></i></a></li>
		<li><a href=""><i class="social_dribbble_square"></i></a></li>
		<li><a href=""><i class="social_flickr_square"></i></a></li>
	</ul>
	
	<!-- COPYRIGHT TEXT -->
	<p class="copyright">
		©2014 Kane, All Rights Reserved
	</p>

</div>
<!-- /END CONTAINER -->
 
</footer>
<!-- /END FOOTER -->


<!-- =========================
     SCRIPTS 
============================== -->

<script src="{{ asset('/theme-welcome/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/smoothscroll.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.localScroll.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/nivo-lightbox.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/simple-expand.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/wow.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/retina-1.1.0.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.nav.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/matchMedia.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('/theme-welcome/js/custom.js') }}"></script>

<!-- =========================================================
     STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
============================================================== -->
<script type="text/javascript" src="{{ asset('/theme-welcome/demo/styleswitcher.js') }}"></script>
<script type="text/javascript" src="{{ asset('/theme-welcome/demo/demo.js') }}"></script>
<div class="kane-style-switch" id="switch-style">
	<a id="toggle-switcher" class="switch-button icon_tools"></a>
	<div class="switched-options">
		<div class="config-title">
			Layout Style:
		</div>
		<ul>
			<li><a href="../../../layout-style-one/dark/image-bg/index.html">Style One</a></li>
			<li class="active"><a href="#">Style Two</a></li>
		</ul>
		
		<div class="config-title">
			Layout Color:
		</div>
		<ul>
			<li><a href="../../light/image-bg/index.html">Light</a></li>
			<li class="active"><a href="#">Dark</a></li>
		</ul>
		<div class="config-title">
			Homepage style:
		</div>
		<ul>
			<li class="active"><a href="#">IMAGE BG</a></li>
			<li><a href="../transparent-color-bg/index.html">TRANSPARENT COLOR BG</a></li>
			<li><a href="../solid-color/index.html">SOLID COLOR BG</a></li>
			<li><a href="../video-bg/index.html">VIDEO BG</a></li>
			<li class="p">
				(NOTE: BG = Background)
			</li>
		</ul>
		<div class="config-title">
			Colors :
		</div>
		<ul class="styles">
			<li><a href="#" onclick="setActiveStyleSheet('blue'); return false;" title="Blue">
			<div class="blue">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('purple'); return false;" title="Purple">
			<div class="purple">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('blue-munsell'); return false;" title="Blue Munsell">
			<div class="blue-munsell">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('orange'); return false;" title="Orange">
			<div class="orange">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('slate'); return false;" title="Slate">
			<div class="slate">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('green'); return false;" title="Green">
			<div class="green">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('yellow'); return false;" title="Yellow">
			<div class="yellow">
			</div>
			</a></li>
			
			<li><a href="#" onclick="setActiveStyleSheet('red'); return false;" title="Red">
			<div class="red">
			</div>
			</a></li>
			<li class="p">
				( NOTE: Pre Defined Colors. You can change colors very easily )
			</li>
		</ul>
	</div>
</div>


</body>
</html>