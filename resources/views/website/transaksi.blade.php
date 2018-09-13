@extends('layouts.website_2_master')

@section('style')
    <style>
        .gmaps-section {
            width: 100%;
            height: 300px;
        }
    </style>
@endsection

@section('title', 'My Order')

@section('content')
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-md-6">
                                <h3 class="mb-0">Nomor Order : {{ '#' . sprintf('%06s', $transaksi->id) }}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <h3 class="mb-0">Status : Waiting</h3>
                            </div>
                        </div>
                        <hr />
                        <div class="row p-3">
                            <div class="col-md-6">
                                <h4 class="mb-2"><u>Penyewa</u></h4>
                                <table>
                                    <tr>
                                        <td class="font-weight-bold">Nama</td>
                                        <td align="center" width="15px">:</td>
                                        <td>{{ $transaksi->penyewa->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td align="center">:</td>
                                        <td>{{ $transaksi->penyewa->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Nomor Telepon</td>
                                        <td align="center">:</td>
                                        <td>{{ $transaksi->penyewa->phone }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-2"><u>Pemilik</u></h4>
                                <table>
                                    <tr>
                                        <td class="font-weight-bold">Nama</td>
                                        <td align="center" width="15px">:</td>
                                        <td>{{ $transaksi->mobil->pemilik->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td align="center">:</td>
                                        <td>{{ $transaksi->mobil->pemilik->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Nomor Telepon</td>
                                        <td align="center">:</td>
                                        <td>{{ $transaksi->mobil->pemilik->phone }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <h4 class="mb-2"><u>Detail Order</u></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Mobil</h5>
                                            <p class="mb-0">{{ $transaksi->mobil->brand->name . ' ' . $transaksi->mobil->type->name }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Tahun</h5>
                                            <p class="mb-0">{{ $transaksi->mobil->tahun_pembuatan }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Provinsi</h5>
                                            <p class="mb-0">{{ $transaksi->provinsi->name }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Kota</h5>
                                            <p class="mb-0">{{ $transaksi->kota->name }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Tempat Penjemputan</h5>
                                            <p class="mb-0">{{ $transaksi->tempat_jemput }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Mulai Sewa</h5>
                                            <p class="mb-0">{{ date('d-m-Y h:i:s', strtotime($transaksi->sewa_mulai)) }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Selesai Sewa</h5>
                                            <p class="mb-0">{{ date('d-m-Y h:i:s', strtotime($transaksi->sewa_selesai)) }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Durasi</h5>
                                            <p class="mb-0">{{ $transaksi->durasi }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Tujuan</h5>
                                            <p class="mb-0">{{ ucwords(str_replace('_', ' ', $transaksi->tujuan)) }}</p>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="text-muted mb-0">Tipe Sewa</h5>
                                            <p class="mb-0">{{ ucwords(str_replace('_', ' ', $transaksi->tipe_sewa)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="gmaps-section" id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA6gWwKa5elWn4KJoU4WM4t8k6eqfs_AWw'></script>
    <script type="text/javascript"> 
        var map;
        var marker;
        var myLatlng = new google.maps.LatLng({{ $transaksi->lat }}, {{ $transaksi->lng }});
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        function initialize(){
            var mapOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);

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

                        {{-- $('#koordinat_penjemputan').val('[' + lat + ',' + long +']'); --}}

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

                            {{-- $('#koordinat_penjemputan').val('[' + lat + ',' + long +']'); --}}

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