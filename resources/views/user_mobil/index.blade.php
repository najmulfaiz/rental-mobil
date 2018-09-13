@extends('layouts.website_2_master')

@section('title', 'List Mobil')

@section('style')
    <!-- Bootstrap Data Table Plugin -->
	<link rel="stylesheet" href="{{ asset('website/css/components/bs-datatable.css') }}" type="text/css" />
@endsection

@section('content')
	<div class="content-wrap">
		<div class="container clearfix">

            @if(session('success')) 
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            @endif

			<div class="card">
                <div class="card-body">
                    <div class="col_full container-fluid">
                        <a href="{{ route('user_mobil.create', $id) }}" class="button button-3d button-rounded button-blue button-mini float-right"><i class="icon-plus"></i> Tambah</a>
                    </div>
                
                    <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nopol</td>
                                <td>Brand</td>
                                <td>Type</td>
                                <td style="width: 210px;">Opsi</td>
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
                'autoWidth': false,
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

        $(document).on('click', '.btn-delete', function(){
            var id = $(this).attr('data-id');
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            
            if(confirm('Apa anda yakin?')) {
                $.ajax({
                    url: '{{ url('/user/' . $id . '/mobil') }}/' + id,
                    type: 'POST',
                    data: { '_method': 'DELETE', '_token': csrf_token },
                    success: function(data) {
                        alert('Mobil berhasil dihapus');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("Oops! Something wrong!");
                    }
                });
            }
        });
    </script>
@endsection