@extends('layouts.website_3_master')

@section('style')
	<style>
	.contact-section {
		position: absolute;
		display: block;
		top: 0;
		right: 0;
		width: 50%;
		padding: 60px 60px 60px 180px;
		z-index: 0;
	}
	.contact-image {
		position: relative;
		width: 60%;
		margin-top: 30px;
		z-index: 2;
		box-shadow: 0 0 40px rgba(0,0,0,.3);
	}
	@media (max-width: 991px) {
		.contact-section {
			position: relative;
			display: block;
			width: 100%;
			padding: 20px;
		}
		.contact-image {
			width: 100%;
			margin-top: 0;
		}
	}
	</style>
@endsection

@section('content')
    <!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background: url('{{ asset('website/demos/real-estate/images/contact/page-title.jpg') }}') no-repeat center center / cover; padding: 160px 0;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0%;">

			<div class="container clearfix">
				<h1>Tentang Kami</h1>
				{{-- <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Real Estate</a></li>
					<li class="breadcrumb-item active">Contact</li>
				</ol> --}}
			</div>

			<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
					<div class="video-overlay" style="background: rgba(0,0,0,0.6);"></div>
				</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div style="position: relative;">
						<img src="{{ asset('website/demos/real-estate/images/contact/1.jpg') }}" alt="" class="contact-image">
						<div class="contact-section dark bgcolor">
							<div style="font-size: 15px; line-height: 1.7;">
								<address style="line-height: 1.7;">
								<span class="t300">Address:</span><br>
								<span class="h6 text-white ls1 t400">
									North America<br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107.
								</span>
								</address>
								<span class="t300">Phone Number:</span><br>
								<a href="tel:(91)(8547)632521" class="h6 text-white ls1 t400">(91) 8547 632521</a><br><br>

								<span class="t300">Email:</span><br>
								<a href="mailto:no-reply@semicolonweb.com?Subject=Hello%20again" class="h6 text-white ls1 t400">no-reply@semicolonweb.com</a>
							</div>
						</div>
					</div>
					<div class="clear topmargin"></div>

					<div class="row norightmargin topmargin-lg common-height" style="box-shadow: 0 0 40px rgba(0,0,0,.06)">
						<div id="headquarters-map" class="col-md-6 gmap"></div>
						<div class="col-md-6">
							<div class="col-padding">
								<div class="quick-contact-widget clearfix">

									<h3 class="capitalize ls1 t400">Contact Us</h3>

									<div class="quick-contact-form-result"></div>

									<form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">

										<div class="form-process"></div>

										<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />

										<input type="email" class="required sm-form-control email input-block-level not-dark" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />

										<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-phone" name="quick-contact-form-phone" value="" placeholder="Phone Number (+1-555-2221)" />

										<textarea class="required sm-form-control input-block-level not-dark short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="5" cols="30" placeholder="What are you Looking for? (Ex: Villa on the Beach)"></textarea>

										<input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />

										<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-rounded nomargin" value="submit">Send Email</button>

									</form>

								</div>
							</div>
						</div>
					</div>

				</div>

			</div><!-- .content-wrap end -->

		</section><!-- #content end -->
@endsection

@section('script')
	<!-- Google Map JavaScripts
	============================================= -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyA6gWwKa5elWn4KJoU4WM4t8k6eqfs_AWw"></script>
	<script src="{{ asset('website/js/jquery.gmap.js') }}"></script>

	<script type="text/javascript">

		jQuery(window).on( 'load', function(){

			// Google Map
			jQuery('#headquarters-map').gMap({
				address: 'New York, USA',
				maptype: 'ROADMAP',
				zoom: 13,
				markers: [
					{
						address: "New York, USA",
						html: "New York, USA",
						icon: {
							image: "../../images/icons/map-icon-red.png",
							iconsize: [32, 36],
							iconanchor: [14,44]
						}
					}
				],
				doubleclickzoom: false,
				controls: {
					panControl: false,
					zoomControl: false,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				},
				styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#F0AD4E"},{"lightness":60}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2C3E50"},{"visibility":"on"}]}]
			});

		});

	</script>

@endsection