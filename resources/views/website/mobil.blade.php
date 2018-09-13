@extends('layouts.website_2_master')

@section('title', $mobil->brand->name . ' ' . $mobil->type->name)

@section('content')
<section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="single-product">

                    <div class="product">

                        <div class="col_two_fifth">
                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            @for ($x = 1; $x <= 5; $x++)
                                                <div class="slide" data-thumb="{{ asset($mobil->{'photo_mobil_' . $x}) }}">
                                                    <a href="{{ asset($mobil->{'photo_mobil_' . $x}) }}" title="{{ $mobil->brand->name . ' ' . $mobil->type->name }}" data-lightbox="gallery-item">
                                                        <img src="{{ asset($mobil->{'photo_mobil_' . $x}) }}" alt="{{ $mobil->brand->name . ' ' . $mobil->type->name }}">
                                                    </a>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="sale-flash">Sale!</div> --}}
                            </div><!-- Product Single - Gallery End -->

                        </div>

                        <div class="col_two_fifth product-desc">

                            <!-- Product Single - Price
                            ============================================= -->
                            <div class="product-price"><del>$39.99</del> <ins>$24.99</ins></div><!-- Product Single - Price End -->

                            <!-- Product Single - Rating
                            ============================================= -->
                            <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                                <i class="icon-star-empty"></i>
                            </div><!-- Product Single - Rating End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            {{-- <div class="form-group">
                                <label for="type_sewa">Type Rental</label>
                                <select name="type_sewa" id="type_sewa" class="form-control">
                                    <option value=""> -- Pilih Type Sewa -- </option>
                                    <option value="">Lepas Kunci</option>
                                    <option value="">Dengan driver</option>
                                </select>
                            </div> --}}

                            <form action="{{ route('website.pilih') }}" method="post">
                                @csrf
                                <input type="hidden" name="mobil_id" value="{{ $mobil->id }}" readonly>
                                <button class="add-to-cart button nomargin btn-block">Pesan Sekarang</button>
                            </form>

                            <div class="clear"></div>
                            <div class="line"></div>

                            <h5 class="font-weight-bold">Keterangan</h5>
                            <table>
                                <tr>
                                    <td>Nomor Polisi</td>
                                    <td class="text-center" width="15px">:</td>
                                    <td>{{ $mobil->nopol }}</td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $mobil->brand->name }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Type</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $mobil->type->name }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $mobil->tahun_pembuatan }}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td class="text-center">:</td>
                                    <td>{{ ucwords(strtolower($mobil->provinsi->name . ', ' . $mobil->kota->name)) }}</td>
                                </tr>
                            </table>

                        </div>

                        <div class="col_one_fifth col_last">

                            <a href="#" title="Brand Logo" class="d-none d-md-block"><img class="image_fade" src="{{ asset('website/images/shop/brand.jpg') }}" alt="Brand Logo"></a>

                            <div class="divider divider-center"><i class="icon-circle-blank"></i></div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-thumbs-up2"></i>
                                </div>
                                <h3>100% Original</h3>
                                <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-credit-cards"></i>
                                </div>
                                <h3>Payment Options</h3>
                                <p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-truck2"></i>
                                </div>
                                <h3>Free Shipping</h3>
                                <p class="notopmargin">Free Delivery to 100+ Locations on orders above $40.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-undo"></i>
                                </div>
                                <h3>30-Days Returns</h3>
                                <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="clear"></div><div class="line"></div>

                <div class="col_full nobottommargin">

                    <h4>Related Products</h4>

                    <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                        @foreach ($relateds as $related)
                            <div class="oc-item">
                                <div class="product iproduct clearfix">
                                    <div class="product-image">
                                        <a href="#"><img src="{{ asset($related->{'photo_mobil_' . rand(1, 5)}) }}" alt="{{ $mobil->brand->name . ' ' . $mobil->type->name }}"></a>
                                        {{-- <a href="#"><img src="{{ asset($related->{'photo_mobil_' . rand(1, 5)}) }}" alt="{{ $mobil->brand->name . ' ' . $mobil->type->name }}"></a> --}}
                                        {{-- <div class="sale-flash">50% Off*</div> --}}
                                        <div class="product-overlay">
                                            <a href="#" class="add-to-cart"><span> Pesan Sekarang</span></a>
                                            <a href="#" class="item-quick-view"></i><span> View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title"><h3><a href="#">{{ ucwords(strtolower($mobil->brand->name . ' ' . $mobil->type->name)) }}</a></h3></div>
                                        <div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
                                        <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection