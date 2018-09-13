<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/css/dark.css') }}" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('website/demos/real-estate/real-estate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/demos/real-estate/css/font-icons.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('website/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('website/css/fonts.css') }}" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="{{ asset('website/css/components/bs-select.css') }}" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="{{ asset('website/css/components/bs-switches.css') }}" type="text/css" />

	<!-- Range Slider CSS -->
	<link rel="stylesheet" href="{{ asset('website/css/components/ion.rangeslider.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="{{ asset('website/css/colors.php?color=2C3E50') }}" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>Remo | Rental Mobil</title>

	@yield('style')

</head>

<body class="stretched side-push-panel">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		@include('layouts.website_1_topbar')
		@include('layouts.website_1_header')

		@yield('content')

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_fifth">

						<div class="widget clearfix">

							<img src="website/demos/real-estate/images/logo@2x.png" style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;" alt="Footer Logo">

							<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

							<div class="line" style="margin: 30px 0;"></div>

							<p class="ls1 t300" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2017 Canvas: Real Estate</p>

						</div>

					</div>

					<div class="col_three_fifth col_last">

						<div class="col_half">
							<div class="row clearfix">

								<h4 class="ls1 t400 uppercase">Popular Locations</h4>

								<div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
									<ul>
										<li><a href="#"><i class="icon-map-marker2"></i> California</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Nevada</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Hawaii</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Washington</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Ottawa</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Virginia</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Ohio</a></li>
									</ul>
								</div>

								<div class="col-6 bottommargin-sm widget_links widget_real_estate_popular">
									<ul>
										<li><a href="#"><i class="icon-map-marker2"></i> Oregon</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Colorado</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Kentucky</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Texas</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Miami</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> New York</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> New Jersey</a></li>
									</ul>
								</div>

							</div>
						</div>

						<div class="col_half col_last">

							<h4 class="ls1 t400 uppercase">Connect Socially</h4>

							<div class="bottommargin-sm clearfix">
								<a href="#" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>

								<a href="#" class="social-icon si-colored si-small si-rounded si-apple" title="App Store">
									<i class="icon-apple"></i>
									<i class="icon-apple"></i>
								</a>

								<a href="#" class="social-icon si-colored si-small si-rounded si-android" title="Play Store">
									<i class="icon-android"></i>
									<i class="icon-android"></i>
								</a>

								<a href="#" class="social-icon si-colored si-small si-rounded si-skype" title="Skype">
									<i class="icon-skype"></i>
									<i class="icon-skype"></i>
								</a>
							</div>

							<div class="widget subscribe-widget subscribe-form clearfix" data-loader="button">
								<div class="widget-subscribe-form-result"></div>
								<form action="../../include/subscribe.php" role="form" method="post" class="nobottommargin">
									<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="sm-form-control not-dark required email" placeholder="Enter your Email">
									<button class="button button-3d button-black noleftmargin norightmargin" style="margin-top: 15px;" type="submit">Subscribe</button>
								</form>
							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('website/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('website/js/plugins.js') }}"></script>

	<!-- Bootstrap Select Plugin -->
	<script src="{{ asset('website/js/components/bs-select.js') }}"></script>

	<!-- Bootstrap Switch Plugin -->
	<script src="{{ asset('website/js/components/bs-switches.js') }}"></script>

	<!-- Range Slider Plugin -->
	<script src="{{ asset('website/js/components/rangeslider.min.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('website/js/functions.js') }}"></script>

	@yield('script')

</body>
</html>