@extends('layouts.website_2_master')

@section('title', 'List Mobil')

@section('style')
    <!-- Bootstrap Data Table Plugin -->
	<link rel="stylesheet" href="{{ asset('website/css/components/bs-datatable.css') }}" type="text/css" />
@endsection

@section('content')
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="card">
                <div class="card-body">
                    <div class="col_full container-fluid">
                        <a href="{{ route('mobil.create', $id) }}" class="button button-3d button-rounded button-blue button-mini float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                
                    <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nopol</td>
                                <td>Brand</td>
                                <td>Type</td>
                                <td>Opsi</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

		</div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('website/js/components/bs-datatable.js') }}"></script>
    <script>
        $(document).ready(function(){
            var tableData = $('.datatable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    url: '{{ route('datatable.user_mobil') }}',
                    data: {
                        user_id: '{{ $id }}'
                    }
                }
            });
        });
    </script>
@endsection