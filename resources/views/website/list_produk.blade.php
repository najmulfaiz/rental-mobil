@extends('layouts.website_3_master')

@section('style')
    <style>
		.slider-element { padding: 250px 0 150px; }

		.device-md .slider-element,
		.device-sm .slider-element,
		.device-xs .slider-element { padding: 60px 0; }

		.expand-link { display: none; }
		.more-search {
			display: block;
			margin-top: 10px;
			float: right;
			text-align: right;
			color: #FFF;
			cursor: pointer;
		}

		label {font-family: 'Raleway', sans-serif !important;}

		.bootstrap-select.btn-group > .dropdown-toggle {
			background-color: #dae0e5;
			border-color: #d3d9df;
		}
	</style>
@endsection

@section('content')
    <!-- Slider
    ============================================= -->
    <section id="slider" class="slider-element clearfix" style="background: url({{ asset('website/demos/real-estate/images/items/page-title.jpg') }}) center center no-repeat; background-size: cover;">

        <div class="container clearfix" style="z-index: 2">
            <div class="tabs advanced-real-estate-tabs clearfix">

                <div class="tab-container">

                    <div class="tab-content clearfix" id="tab-properties">
                        <form action="#" method="post" class="nobottommargin">
                            <div class="row clearfix">
                                <div class="col-md-2 col-sm-12">
                                    <label for="" class="d-block">Type</label>
                                    <input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <label for="">Locations</label>
                                    <select class="selectpicker form-control" multiple data-live-search="true" style="width:100%;">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option selected value="AK">Alaska</option>
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
                                <div class="col-md-4 col-sm-6 col-12">
                                    <label for="">Property Type</label>
                                    <select class="selectpicker form-control" style="width:100%; line-height: 30px;">
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
                                <div class="col-md-2 col-sm-6 col-6">
                                    <button class="button button-3d button-rounded btn-block nomargin" style="margin-top: 29px !important;">Search</button>
                                </div>
                            </div>
                            <div class="clear"></div>

                            <div class="expand-link">
                                <div class="row justify-content-between mt-3">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label for="" style="margin-bottom: 20px !important;">Price Range</label>
                                        <input class="price-range-slider" />
                                    </div>
                                    <div class="clear d-xl-none d-lg-none d-md-none d-sm-none bottommargin-sm"></div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <label for="" style="margin-bottom: 20px !important;">Property Area</label>
                                        <input class="area-range-slider" />
                                    </div>
                                    <div class="col-md-2 col-sm-6 bottommargin-sm">
                                        <label for="">Beds</label>
                                        <select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-6 bottommargin-sm">
                                        <label for="">Baths</label>
                                        <select class="selectpicker form-control" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <span class="more-search"><i class="icon-line-plus"></i> Advanced Search</span>
            </div>
        </div>
        <div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
            <div class="video-overlay" style="background: rgba(0,0,0,0.3); z-index: 1;"></div>
        </div>

    </section><!-- #slider end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap notoppadding">

            <div class="section nobg nomargin clearfix">
                <div class="container clearfix">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <a href="#" class="btn text-white bgcolor px-4"><i class="icon-line2-list"></i> List</a>
                            <a href="#" class="btn btn-light ml-2 px-4"><i class="icon-map-marker2"></i> Map</a>
                        </div>
                        <div class="col-8 tright">

                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Listing</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button">New Listing</button>
                                        <button class="dropdown-item" type="button">Home Opens</button>
                                    </div>
                                </div>
                                <div class="dropdown ml-2">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Popular Listed</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button">A - Z Listed</button>
                                        <button class="dropdown-item" type="button">Price: Lowest First</button>
                                        <button class="dropdown-item" type="button">Price: Highest First</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="real-estate topmargin grid-container portfolio-3 portfolio w-100 mw-100 clearfix" data-layout="fitRows">

                    @foreach ($mobil as $mobil)
                        <div class="real-estate-item portfolio-item bottommargin-sm">
                            <div class="real-estate-item-image">
                                <div class="label badge badge-danger bgcolor-2">Rent</div>
                                <a href="/mobil/{{ $mobil->id }}">
                                    <img src="{{ asset($mobil->photo_mobil_1) }}" alt="Mobil 1">
                                </a>
                                <div class="real-estate-item-price">
                                    $1.2m<span>Leasehold</span>
                                </div>
                                <div class="real-estate-item-info clearfix" data-lightbox="gallery">
                                    <a href="{{ asset($mobil->{'photo_mobil_1'}) }}" data-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                                    @for($x = 2; $x <= 5; $x++)
                                        @if($mobil->{'photo_mobil_' . $x})
                                            <a href="{{ asset($mobil->{'photo_mobil_' . $x}) }}" class="hidden" data-lightbox="gallery-item"></a>
                                        @endif
                                    @endfor
                                    <a href="#" data-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
                                </div>
                            </div>

                            <div class="real-estate-item-desc nopadding">
                                <h3><a href="#">{{ $mobil->brand->name . ', ' . $mobil->type->name }}</a></h3>
                                <span>{{ $mobil->kota->name . ', ' . $mobil->provinsi->name }}</span>

                                <a href="/mobil/{{ $mobil->id }}" class="real-estate-item-link"><i class="icon-info"></i></a>

                                <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

                                <div class="real-estate-item-features row t500 font-primary px-3 clearfix">
                                    <div class="col-lg-4 col-6 nopadding">Beds: <span class="color">3</span></div>
                                    <div class="col-lg-4 col-6 nopadding">Baths: <span class="color">3</span></div>
                                    <div class="col-lg-4 col-6 nopadding">Area: <span class="color">150 sqm</span></div>
                                    <div class="col-lg-4 col-6 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                                    <div class="col-lg-4 col-6 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                                    <div class="col-lg-4 col-6 nopadding">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="section center nomargin" style="padding:80px 0 ">
                    <h3 class="t400 ls1">Special Offers on Villa Long Term Rentals &amp; Lease Agreements</h3>
                    <a href="contact.html" class="button button-color button-large button-rounded">Contact Now</a>
                </div>
            </div>

        </div><!-- .content-wrap end -->

    </section><!-- #content end -->
@endsection

@section('script')
    <script type="text/javascript">

		jQuery(document).ready(function(){

			$(".price-range-slider").ionRangeSlider({
				type: "double",
				prefix: "$",
				min: 200,
				max: 10000,
				max_postfix: "+"
			});

			$(".area-range-slider").ionRangeSlider({
				type: "double",
				min: 50,
				max: 20000,
				from: 50,
				to: 20000,
				postfix: " sqm.",
				max_postfix: "+"
			});

			jQuery(".bt-switch").bootstrapSwitch();

			jQuery('.more-search').click(function(){
				jQuery('.expand-link').slideToggle(400);
			});

		});


	</script>
@endsection