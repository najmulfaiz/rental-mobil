@extends('layouts.website_2_master')

@section('title', 'Tambah Mobil')

@section('style')
    <!-- Bootstrap Data Table Plugin -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
    #myMap {
        height: 300px;
        width: 100%;
    }
    </style>
@endsection

@section('content')
	<div class="content-wrap">
		<div class="container clearfix">

            <div class="col_full">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user_mobil.store', $id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5>Detail Mobil</h5>
                            <hr>
                            <div class="col_half" style="margin-bottom: 10px;">
                                <div class="form-group">
                                    <label for="nopol">Nopol</label>
                                    <input type="text" id="nopol" name="nopol" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select id="brand" name="brand" class="form-control"></select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" class="form-control"></select>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_pembuatan">Tahun Pembuatan</label>
                                    <input type="text" id="tahun_pembuatan" name="tahun_pembuatan" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select id="provinsi" name="provinsi" class="form-control"></select>
                                </div>

                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <select id="kota" name="kota" class="form-control"></select>
                                </div>
                            </div>

                            <div class="col_half col_last" style="margin-bottom: 10px;">
                                <div id="myMap"></div>
                                
                                <div class="form-group">
                                    <label for="koordinat_lokasi">Koordinat Lokasi</label>
                                    <input type="text" id="koordinat_lokasi" name="koordinat_lokasi" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" id="foto" name="foto[]" class="form-control" multiple>
                                </div>
                            </div>
                            
                            <div class="clear"></div>
                            <h5>Tarif</h5>
                            <hr>

                            <div class="col_half" style="margin-bottom: 10px;">
                                <h5 class="text-center"><u>Tarif Lepas Kunci</u></h5>
                                <div class="col_half" style="margin-bottom: 10px;">
                                    <div class="form-group">
                                        <label for="lepas_biasa_1">Hari Biasa 1 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_biasa_1" name="lepas_biasa_1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lepas_biasa_3">Hari Biasa 3 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_biasa_3" name="lepas_biasa_3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lepas_biasa_24">Hari Biasa 24 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_biasa_24" name="lepas_biasa_24" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col_half col_last" style="margin-bottom: 10px;">
                                    <div class="form-group">
                                        <label for="lepas_khusus_1">Hari Weekend & Khusus 1 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_khusus_1" name="lepas_khusus_1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lepas_khusus_3">Hari Weekend & Khusus 3 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_khusus_3" name="lepas_khusus_3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lepas_khusus_24">Hari Weekend & Khusus 24 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="lepas_khusus_24" name="lepas_khusus_24" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col_half col_last" style="margin-bottom: 10px;">
                                <h5 class="text-center"><u>Tarif Dengan Driver</u></h5>
                                <div class="col_half" style="margin-bottom: 10px;">
                                    <div class="form-group">
                                        <label for="driver_biasa_1">Hari Biasa 1 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_biasa_1" name="driver_biasa_1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="driver_biasa_3">Hari Biasa 3 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_biasa_3" name="driver_biasa_3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="driver_biasa_24">Hari Biasa 24 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_biasa_24" name="driver_biasa_24" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col_half col_last" style="margin-bottom: 10px;">
                                    <div class="form-group">
                                        <label for="driver_khusus_1">Hari Weekend & Khusus 1 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_khusus_1" name="driver_khusus_1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="driver_khusus_3">Hari Weekend & Khusus 3 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_khusus_3" name="driver_khusus_3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="driver_khusus_24">Hari Weekend & Khusus 24 Jam</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" id="driver_khusus_24" name="driver_khusus_24" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <button class="button button-3d button-rounded button-blue" type="submit">Simpan</button>
                        </form>

                        {{-- <input id="address" type="text" style="width:600px;"/><br/>
                        <input type="text" id="latitude" placeholder="Latitude"/>
                        <input type="text" id="longitude" placeholder="Longitude"/> --}}

                    </div>
                </div>
            </div>

		</div>
	</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#brand').select2({
                placeholder: 'Masukkan brand mobil',
                ajax: {
                    dataType: 'json',
                    url: '{{ route('select2.brand') }}',
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

            $('#type').select2({
                placeholder: 'Masukkan type mobil',
                ajax: {
                    dataType: 'json',
                    url: '{{ route('select2.type') }}',
                    delay: 400,
                    data: function(params) {
                        var brand = $('#brand').val();

                        return {
                            term: params.term,
                            brand: brand
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    },
                }
            });

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
                zoom: 18,
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
                        
                        // $('#latitude,#longitude').show();
                        // $('#address').val(results[0].formatted_address);
                        // $('#latitude').val(marker.getPosition().lat());
                        // $('#longitude').val(marker.getPosition().lng());

                        $('#koordinat_lokasi').val('[' + lat + ',' + long +']');

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
                            
                            // $('#address').val(results[0].formatted_address);
                            // $('#latitude').val(marker.getPosition().lat());
                            // $('#longitude').val(marker.getPosition().lng());

                            $('#koordinat_lokasi').val('[' + lat + ',' + long +']');

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