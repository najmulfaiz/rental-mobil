@extends('layouts.website_2_master')

@section('style')
    <link rel="stylesheet" href="{{ asset('website/css/components/datepicker.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('website/css/components/timepicker.css') }}" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
    #myMap {
        height: 300px;
        width: 100%;
    }
    .bootstrap-datetimepicker-widget {
        z-index: 999;
    }
    </style>
@endsection

@section('title', 'Pemesanan')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul class="pl-3 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        @if(!session('hidden'))
            <form action="{{ route('website.pesan.store') }}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <h4 class="card-header">Detail Penyewa</h4>
                        <div class="card-body">
                            @auth
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Handphone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="handphone" id="handphone" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    <h5 class="mb-3">Anda harus login terlebih dahulu</h5>
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Log In</a>
                                </div>
                            @endauth
                        </div>
                    </div>

                    <div class="card mt-2">
                        <h4 class="card-header">Detail Penjemputan</h4>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Provinsi</label>
                                <div class="col-md-8">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value=""> -- Pilih Provinsi -- </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Kota</label>
                                <div class="col-md-8">
                                    <select name="kota" id="kota" class="form-control">
                                        <option value=""> -- Pilih Kota -- </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Tempat Penjemputan</label>
                                <div class="col-md-8">
                                    <input type="text" name="tempat_penjemputan" id="tempat_penjemputan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Koordinat Penjemputan</label>
                                <div class="col-md-8">
                                    <div id="myMap"></div>
                                    <input type="hidden" name="koordinat_penjemputan" id="koordinat_penjemputan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Mulai Sewa</label>
                                <div class="col-md-8">
                                    <div class="input-group date datetimepicker" id="datetime_mulai_sewa" data-target-input="nearest">
                                        <input type="text" name="mulai_sewa" id="mulai_sewa" class="form-control datetimepicker-input" data-target="#datetime_mulai_sewa">
                                        <div class="input-group-append" data-target="#datetime_mulai_sewa" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Selesai Sewa</label>
                                <div class="col-md-8">
                                    <div class="input-group date datetimepicker" id="datetime_selesai_sewa" data-target-input="nearest">
                                        <input type="text" name="selesai_sewa" id="selesai_sewa" class="form-control datetimepicker-input" data-target="#datetime_selesai_sewa">
                                        <div class="input-group-append" data-target="#datetime_selesai_sewa" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Tujuan</label>
                                <div class="col-md-8">
                                    <select name="tujuan" id="tujuan" class="form-control">
                                        <option value=""> -- Pilih Tujuan -- </option>
                                        <option value="1">Drop Off</option>
                                        <option value="2">Lokasi Awal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Tipe</label>
                                <div class="col-md-8">
                                    <select name="tipe_sewa" id="tipe_sewa" class="form-control">
                                        <option value=""> -- Pilih Tipe -- </option>
                                        <option value="1">Lepas Kunci</option>
                                        <option value="2">Dengan Driver</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h4 class="card-header">Mobil Pesanan</h4>
                        <div class="card-body">
                            <input type="hidden" name="mobil_id" id="mobil_id" class="form-control" value={{ $mobil->id }} readonly>
                            <div class="img-responsive">
                                <img src="{{ $mobil->photo_mobil_1 }}" alt="mobil">
                            </div>
                            <h4 class="mb-2">{{ $mobil->brand->name . ' ' . $mobil->type->name }}</h4>
                            <div class="detail-mobil mt-0">
                                <span><i class="fa fa-calendar-alt text-info"></i>&nbsp; {{ $mobil->tahun_pembuatan }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <abbr title="Klik untuk menggunakan voucher" class="initialism" id="voucher_confirm">Punya Kode Voucher?</abbr>
                        <div class="input-group mt-2 mb-2" id="voucher_section" style="display: none;">
                            <input type="text" class="form-control" id="voucher" name="voucher" placeholder="Gunakan kupon">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="button_kupon">Gunakan Voucher</button>
                            </div>
                        </div>
                        <button class="button button-3d button-rounded button-amber btn-block mr-0 ml-0" type="submit">Lanjutkan</button>
                    </div>
                </div>
            </div>
        @endif
        </form>
        
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Date & Time Picker JS -->
	<script src="{{ asset('website/js/components/moment.js') }}"></script>
	<script src="{{ asset('website/js/components/datepicker.js') }}"></script>
	<script src="{{ asset('website/js/components/timepicker.js') }}"></script>

    <script>
        $(function () {
            $('.datetimepicker').datetimepicker();

            $('#provinsi').select2({
                placeholder: 'Masukkan provinsi',
                ajax: {
                    dataType: 'json',
                    url: '{{ route('select2.provinsi') }}',
                    delay: 400,
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    },
                }
            });

            $('#kota').select2({
                placeholder: 'Masukkan kota',
                ajax: {
                    dataType: 'json',
                    url: '{{ route('select2.kota') }}',
                    delay: 400,
                    data: function(params) {
                        var provinsi = $('#provinsi').val();

                        return {
                            term: params.term,
                            provinsi: provinsi
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    },
                }
            });
        });

        $(document).on('click', '#voucher_confirm', function(){
            $('#voucher_section').toggle('show');
        });
    </script>

    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA6gWwKa5elWn4KJoU4WM4t8k6eqfs_AWw'></script>
    <script type="text/javascript"> 
        var map;
        var marker;
        var myLatlng = new google.maps.LatLng(-6.753374,111.040091);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        function initialize(){
            var mapOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

            marker = new google.maps.Marker({
                map: map,
                position: myLatlng,
                draggable: true 
            }); 

            geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var loc = results[0].formatted_address;
                        var lat = marker.getPosition().lat();
                        var long = marker.getPosition().lng();

                        $('#koordinat_penjemputan').val('[' + lat + ',' + long +']');

                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var loc = results[0].formatted_address;
                            var lat = marker.getPosition().lat();
                            var long = marker.getPosition().lng();

                            $('#koordinat_penjemputan').val('[' + lat + ',' + long +']');

                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection