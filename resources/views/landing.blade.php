@extends('layouts.website_1_master')

@section('content')
	<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element force-full-screen full-screen dark clearfix">

			<div class="force-full-screen full-screen">
				<div class="fslider" data-speed="3000" data-pause="7500" data-animation="fade" data-arrows="false" data-pagi="false" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background-color: #333; z-index: 1;">
					<div class="flexslider" style="height: 100% !important;">
						<div class="slider-wrap" style="height: inherit;">
							<div class="slide" style="background: url('{{ asset('website/demos/real-estate/images/hero/3.jpg') }}') center center; background-size: cover; height: 100% !important;"></div>
							<div class="slide" style="background: url('{{ asset('website/demos/real-estate/images/hero/4.jpg') }}') center center; background-size: cover; height: 100% !important;"></div>
							<div class="slide" style="background: url('{{ asset('website/demos/real-estate/images/hero/5.jpg') }}') center center; background-size: cover; height: 100% !important;"></div>
						</div>
					</div>
				</div>
				<div class="vertical-middle" style="z-index: 3;">
					<div class="container center clearfix">
						<div class="emphasis-title nomargin">
							<h1>Solusi Perjalanan Anda</h1>
							<span class="t300 uppercase" style="font-size: 18px; letter-spacing: 10px; color: rgba(255,255,255,0.9);">Hanya dengan sekali klik.</span>
						</div>
					</div>
				</div>
				<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
					<div class="video-overlay real-estate-video-overlay" style="z-index: 1;"></div>
				</div>
			</div>

		</section><!-- #slider end -->

		<div class="tabs advanced-real-estate-tabs clearfix">

			<div class="container clearfix">
				<ul class="tab-nav clearfix">
					<li><a href="#tab-properties" data-scrollto="#tab-properties" data-offset="133">Cari Mobil</a></li>
				</ul>
			</div>

			<div class="tab-container">
				<div class="container clearfix">
					<div class="tab-content clearfix" id="tab-properties">
						<form action="#" method="post" class="nobottommargin">
							<div class="row">
								<div class="col-lg-2 col-md-12 bottommargin-sm">
									<label for="" style="display:block;">Type</label>
									<input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label for="">Choose Locations</label>
									<select class="selectpicker form-control" multiple data-live-search="true" data-size="6" style="width:100%;">
										<optgroup label="Alaskan/Hawaiian Time Zone">
											<option value="AK">Alaska</option>
											<option value="HI">Hawaii</option>
										</optgroup>
										<optgroup label="Pacific Time Zone">
											<option value="CA">California</option>
											<option value="NV">Nevada</option>
											<option value="OR">Oregon</option>
											<option value="WA">Washington</option>
										</optgroup>
										<optgroup label="Mountain Time Zone">
											<option value="AZ">Arizona</option>
											<option value="CO">Colorado</option>
											<option value="ID">Idaho</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NM">New Mexico</option>
											<option value="ND">North Dakota</option>
											<option value="UT">Utah</option>
											<option value="WY">Wyoming</option>
										</optgroup>
										<optgroup label="Central Time Zone">
											<option value="AL">Alabama</option>
											<option value="AR">Arkansas</option>
											<option value="IL">Illinois</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="OK">Oklahoma</option>
											<option value="SD">South Dakota</option>
											<option value="TX">Texas</option>
											<option value="TN">Tennessee</option>
											<option value="WI">Wisconsin</option>
										</optgroup>
										<optgroup label="Eastern Time Zone">
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="IN">Indiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="OH">Ohio</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WV">West Virginia</option>
										</optgroup>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label for="">Property Type</label>
									<select class="selectpicker form-control" data-size="6" style="width:100%; line-height: 30px;">
										<option value="Any">Any</option>
										<optgroup label="Residential">
											<option value="Apartment">Apartment</option>
											<option value="Condo">Condo</option>
											<option value="Villa">Villa</option>
											<option value="Building">Building</option>
										</optgroup>
										<optgroup label="Commercial">
											<option value="Shop">Shop</option>
											<option value="Office">Office</option>
											<option value="Warehouse">Warehouse</option>
										</optgroup>
									</select>
								</div>
								<div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
									<label for="">Beds</label>
									<select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5+">5+</option>
									</select>
								</div>
								<div class="col-lg-2 col-md-6 col-6 bottommargin-sm">
									<label for="">Baths</label>
									<select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5+">5+</option>
									</select>
								</div>
								<div class="w-100"></div>
								<div class="col-lg-4 col-md-6 col-12">
									<label for="" style="margin-bottom: 20px !important;">Price Range</label>
									<input class="price-range-slider" />
								</div>
								<div class="w-100 d-block d-md-none bottommargin-sm"></div>
								<div class="col-lg-4 offset-lg-1 col-md-6 col-12">
									<label for="" style="margin-bottom: 20px !important;">Property Area</label>
									<input class="area-range-slider" />
								</div>
								<div class="offset-lg-1 col-lg-2 col-md-12 clearfix">
									<button class="button button-3d button-rounded btn-block nomargin" style="margin-top: 35px !important;">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-my-house"></i></a>
							</div>
							<h3 class="t400">Hassle Free</h3>
							<p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-hammer"></i></a>
							</div>
							<h3 class="t400">Well Constructed</h3>
							<p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-garage"></i></a>
							</div>
							<h3 class="t400">Free Utilites</h3>
							<p>You have complete easy control on each &amp; every element that provides endless customization possibilities.</p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-rent"></i></a>
							</div>
							<h3 class="t400">Flexible Rentals</h3>
							<p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-credit"></i></a>
							</div>
							<h3 class="t400">Easy Financing</h3>
							<p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon">
								<a href="#"><i class="icon-realestate-doc"></i></a>
							</div>
							<h3 class="t400">Solid Paperwork</h3>
							<p>You have complete easy control on each &amp; every element that provides endless customization possibilities.</p>
						</div>
					</div>

					<div class="clear"></div><div class="line topmargin-sm bottommargin-lg"></div>

					<div style="position: relative;">
						<div class="heading-block nobottomborder">
							<h3>Featured Properties</h3>
						</div>

						<a href="#" class="button button-small button-rounded button-border button-border-thin t500 nomargin" style="position: absolute; top: 7px; right: 0;">Check All</a>

						<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-danger bgcolor-2">For Sale</div>
										<a href="#">
											<img src="{{ asset('website/demos/real-estate/images/items/1.jpg') }}" alt="Image 1">
										</a>
										<div class="real-estate-item-price">
											$1.2m<span>Leasehold</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 font-primary clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-success">Hot Deal</div>
										<a href="#">
											<img src="{{ asset('website/demos/real-estate/images/items/2.jpg') }}" alt="Image 2">
										</a>
										<div class="real-estate-item-price">
											$200,000<span>bi-annually</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="oc-item">
								<div class="real-estate-item">
									<div class="real-estate-item-image">
										<div class="badge badge-danger">Long Term Rental</div>
										<a href="#">
											<img src="{{ asset('website/demos/real-estate/images/items/4.jpg') }}" alt="Image 3">
										</a>
										<div class="real-estate-item-price">
											$1600<span>per month</span>
										</div>
										<div class="real-estate-item-info clearfix">
											<a href="#"><i class="icon-line-stack-2"></i></a>
											<a href="#"><i class="icon-line-heart"></i></a>
										</div>
									</div>

									<div class="real-estate-item-desc">
										<h3><a href="#">3 Bedroom Villa</a></h3>
										<span>Seminyak Area</span>

										<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

										<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

										<div class="real-estate-item-features t500 clearfix">
											<div class="row no-gutters">
												<div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
												<div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
												<div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
												<div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="clear"></div>

					<div class="promo promo-dark promo-flat bottommargin-lg">
						<h3 class="t400 ls1">Special Offers on Villa Long Term Rentals &amp; Lease Agreements</h3>
						<a href="#" class="button button-dark button-large button-rounded">Contact Now</a>
					</div>

					<div class="row real-estate-properties clearfix">

						<div class="col-lg-7">
							<a href="#" style="background: url('{{ asset('website/demos/real-estate/images/cities/4.jpg') }}') no-repeat bottom center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize t500">California</h3>
										<span style="margin-top: 5px; font-size: 17px;">23 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="#" style="background: url('{{ asset('website/demos/real-estate/images/cities/2.jpg') }}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize t500">New York</h3>
										<span style="margin-top: 5px; font-size: 17px;">12 Properties</span>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-4">
							<a href="#" style="background: url('{{ asset('website/demos/real-estate/images/cities/3.jpg') }}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize t500">San Francisco</h3>
										<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('{{ asset('website/demos/real-estate/images/cities/1.jpg') }}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize t500">Texas</h3>
										<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="#" style="background: url('{{ asset('website/demos/real-estate/images/cities/5.jpg') }}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block nomargin noborder">
										<h3 class="capitalize t500">New Orleans</h3>
										<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>
									</div>
								</div>
							</a>
						</div>

					</div>

				</div>

				<div class="row norightmargin topmargin bottommargin-lg common-height">
					<div id="headquarters-map" class="col-lg-5 gmap d-none d-md-block"></div>
					<div class="col-lg-3" style="background-color: #E5E5E5;">
						<div style="padding: 40px;">
							<h4 class="font-body t600 ls1">Our Headquarters</h4>

							<div style="font-size: 15px; line-height: 1.7;">
								<address style="line-height: 1.7;">
									<strong>North America:</strong><br>
									795 Folsom Ave, Suite 600<br>
									San Francisco, CA 94107.<br><br>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> real-estate@canvas.com
								</address>

								<div class="clear topmargin-sm"></div>

								<h4 class="font-body t500" style="font-size: 17px; margin-bottom: 10px;">Working Hours:</h4>

								<abbr title="Mondays to Fridays"><strong>Mon-Fri:</strong></abbr> 10AM to 6PM<br>
								<abbr title="Saturday"><strong>Saturday:</strong></abbr> 11AM to 3PM<br>
								<abbr title="Sunday"><strong>Sunday:</strong></abbr> Closed
							</div>
						</div>
					</div>
					<div class="col-lg-4 bgcolor">
						<div class="col-padding">
							<div class="quick-contact-widget dark clearfix">

								<h3 class="capitalize ls1 t400">Get a Quick Quote</h3>

								<div class="quick-contact-form-result"></div>

								<form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">

									<div class="form-process"></div>

									<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />

									<input type="email" class="required sm-form-control email input-block-level not-dark" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />

									<input type="text" class="required sm-form-control input-block-level not-dark" id="quick-contact-form-phone" name="quick-contact-form-phone" value="" placeholder="Phone Number (+1-555-2221)" />

									<textarea class="required sm-form-control input-block-level not-dark short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="5" cols="30" placeholder="What are you Looking for? (Ex: Villa on the Beach)"></textarea>

									<input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />

									<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-rounded button-light button-white nomargin" value="submit">Send Email</button>

								</form>

							</div>
						</div>
					</div>
				</div>

				<div class="container clear-bottommargin clearfix">

					<div class="col_two_third">

						<div class="tabs tabs-justify tabs-tb tabs-alt nobottommargin clearfix" id="realestate-tabs" data-active="2">

							<ul class="tab-nav clearfix">
								<li><a href="#realestate-tab-1">Why Us?</a></li>
								<li><a href="#realestate-tab-2">Properties</a></li>
								<li><a href="#realestate-tab-3">Legal</a></li>
							</ul>

							<div class="tab-container">

								<div class="tab-content clearfix" id="realestate-tab-1">
									<p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.
									<div class="col_one_fourth nobottommargin center">
										<div class="counter ls1 t600" style="color: #D2D2D2;"><span data-from="100" data-to="964" data-refresh-interval="50" data-speed="2000"></span></div>
										<h5>Floors Built</h5>
									</div>

									<div class="col_one_fourth nobottommargin center">
										<div class="counter ls1 t600" style="color: #D2D2D2;"><span data-from="100" data-to="8514" data-refresh-interval="50" data-speed="2500"></span></div>
										<h5>Employees</h5>
									</div>

									<div class="col_one_fourth nobottommargin center">
										<div class="counter ls1 t600" style="color: #D2D2D2;"><span data-from="100" data-to="458" data-refresh-interval="50" data-speed="3500"></span></div>
										<h5>Happy Clients</h5>
									</div>

									<div class="col_one_fourth nobottommargin center col_last">
										<div class="counter ls1 t600" style="color: #D2D2D2;"><span data-from="14" data-to="159" data-refresh-interval="15" data-speed="2700"></span></div>
										<h5>Cities Served</h5>
									</div>
								</div>
								<div class="tab-content clearfix" id="realestate-tab-2">
									<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
									<div class="row clearfix">
										<div class="col-md-4">
											<ul class="iconlist nobottommargin">
												<li><i class="icon-ok"></i> 100% Assurance</li>
												<li><i class="icon-ok"></i> Hard Working</li>
												<li><i class="icon-ok"></i> Trustworthy</li>
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="iconlist nobottommargin">
												<li><i class="icon-ok"></i> Intelligent</li>
												<li><i class="icon-ok"></i> Always Curious</li>
												<li><i class="icon-ok"></i> Perfectionists</li>
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="iconlist nobottommargin">
												<li><i class="icon-ok"></i> Friendly &amp; Helpful</li>
												<li><i class="icon-ok"></i> Accomodating Nature</li>
												<li><i class="icon-ok"></i> Available 24x7</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="tab-content clearfix" id="realestate-tab-3">

									<div class="clear-bottommargin-sm">
										<div class="row clearfix">
											<div class="col-md-7 bottommargin-sm">
												<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor.</p>
												<div class="clear-bottommargin-sm">
													<div class="row clearfix">
														<div class="col-md-6 bottommargin-sm">
															<address>
																<strong>Headquarters:</strong><br>
																795 Folsom Ave, Suite 600<br>
																San Francisco, CA 94107<br>
															</address>
														</div>
														<div class="col-md-6 bottommargin-sm">
															<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
															<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
															<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-5 bottommargin-sm">
												<img src="https://maps.googleapis.com/maps/api/staticmap?center=-37.814107,144.963280&zoom=12&markers=-37.814107,144.963280&size=300x180" alt="Google Map" class="img-thumbnail">
											</div>
										</div>
									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<h4 class="center">Top Builders</h4>

						<ul class="clients-grid grid-2 nobottommargin clearfix">
							<li style="padding: 20px;"><a href="#" style="opacity: 0.9"><img src="{{ asset('website/demos/real-estate/images/builders/1.png') }}" alt="Clients"></a></li>
							<li style="padding: 20px;"><a href="#" style="opacity: 0.9"><img src="{{ asset('website/demos/real-estate/images/builders/2.png') }}" alt="Clients"></a></li>
							<li style="padding: 20px;"><a href="#" style="opacity: 0.9"><img src="{{ asset('website/demos/real-estate/images/builders/3.png') }}" alt="Clients"></a></li>
							<li style="padding: 20px;"><a href="#" style="opacity: 0.9"><img src="{{ asset('website/demos/real-estate/images/builders/4.png') }}" alt="Clients"></a></li>
						</ul>

					</div>

					<div class="clear"></div>

				</div>

			</div>

		</section><!-- #content end -->
@endsection