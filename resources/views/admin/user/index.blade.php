@extends('layouts.admin_master')

@section('title')
    Master User
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('danger'))
                <div class="alert alert-success">{{ session('danger') }}</div>
            @endif
            <div class="card">
                <div class="card-header white">
                    <strong> List Master User  </strong>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary btn-xs float-right">Tambah User</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hovered dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var tableData = $('.dataTable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': '{{ route('datatable.user') }}'
            });
        });

        $(document).on('click', '.btn-delete', function(){
            var token = $('meta[name=csrf-token]').attr('content');
            var id = $(this).attr('data-id');
            
            if(confirm('Are you sure?')) {
                $.ajax({
                    url: '{{ route('admin.user.index') }}/' + id,
                    dataType: 'json',
                    type: 'post',
                    data: {
                        _token: token,
                        _method: 'DELETE'
                    },
                    success: function(data) {
                        if(!data.error) {
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status);
                    }
                });
            }
        });
    </script>
@endsection
