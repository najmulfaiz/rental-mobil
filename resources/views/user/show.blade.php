@extends('layouts.website_2_master')

@section('title', 'Profil User')

@section('content')
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="col_full">
				<img src="{{ isset($photo->photo_diri) && $photo->photo_diri != '' ? asset($photo->photo_diri) : asset('website/images/icons/avatar.jpg') }}" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">
				<div class="heading-block noborder">
					<h3>{{ $user->name }}</h3>
					<span>About</span>
				</div>
				@if(session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
				@endif
				@if(session('danger'))
					<div class="alert alert-success">{{ session('danger') }}</div>
				@endif
			</div>

			<div class="col_one_third">
				<div class="card">
					<h4 class="card-header">
						Overview
						<a href="#" class="btn btn-info btn-sm float-right">Ubah Profil</a>
					</h4>
					<div class="card-body">
						<table>
							<tr>
								<td class="font-weight-bold" width="100px">Email</td>
								<td>:</td>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<td class="font-weight-bold">Phone</td>
								<td>:</td>
								<td>{{ $user->phone }}</td>
							</tr>
							<tr>
								<td class="font-weight-bold">Tipe Akun</td>
								<td>:</td>
								<td>{{ ucwords($user->level) }}</td>
							</tr>
						</table>
						<em>Terakhir Diubah : {{ date('d-m-Y H:i:s', strtotime($user->updated_at)) }}</em>
					</div>
				</div>
			</div>
			
			@if(Auth::user()->level == 'penyewa')
				<div class="col_two_third col_last">
					<div class="card">
						<h4 class="card-header">
							Photo
							<a href="javascript:;" class="btn btn-info btn-edit-photo btn-sm float-right">Ubah Photo Pengguna</a>
						</h4>
						<div class="card-body">
							<table>
								<tr>
									<td class="font-weight-bold" width="150px">Photo Diri</td>
									<td>:</td>
									<td>
										@if(isset($photo->photo_diri))
											<a href="javascript:;" data-title="Photo Diri" data-src="{{ asset($photo->photo_diri) }}" class="button button-3d button-mini button-rounded button-aqua btn-view-image">View</a>
										@else
											<em>Photo belum diupload</em>
										@endif
									</td>
								</tr>
								<tr>
									<td class="font-weight-bold">Photo KTP</td>
									<td>:</td>
									<td>
										@if(isset($photo->photo_ktp))
											<a href="javascript:;" data-title="Photo KTP" data-src="{{ asset($photo->photo_ktp) }}" class="button button-3d button-mini button-rounded button-aqua btn-view-image">View</a>
										@else
											<em>Photo belum diupload</em>
										@endif
									</td>
								</tr>
								<tr>
									<td class="font-weight-bold">Photo Buku Bank</td>
									<td>:</td>
									<td>
										@if(isset($photo->photo_buku_bank))
											<a href="javascript:;" data-title="Photo Buku Bank" data-src="{{ asset($photo->photo_buku_bank) }}" class="button button-3d button-mini button-rounded button-aqua btn-view-image">View</a>
										@else
											<em>Photo belum diupload</em>
										@endif
									</td>
								</tr>
								<tr>
									<td class="font-weight-bold">Photo SIM</td>
									<td>:</td>
									<td>
										@if(isset($photo->photo_sim))
											<a href="javascript:;" data-title="Photo SIM" data-src="{{ asset($photo->photo_sim) }}" class="button button-3d button-mini button-rounded button-aqua btn-view-image">View</a>
										@else
											<em>Photo belum diupload</em>
										@endif
									</td>
								</tr>
							</table>
							<em>Terakhir Diubah : {{ isset($photo->updated_at) ? date('d-m-Y H:i:s', strtotime($photo->updated_at)) : '-' }}</em>
						</div>
					</div>
				</div>
			@endif

			<div class="clear"></div>

		</div>

	</div>

	<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modal_view_title"></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<img src="#" alt="IMAGE" id="modal_view_image">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Photo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form action="{{ route('user.edit_photo', $user->id) }}" method="post" enctype="multipart/form-data" id="form_photo">
							@csrf
							@method('PATCH')
							<input type="hidden" name="photo_id" id="photo_id" value="{{ isset($photo->id) ? $photo->id : '#' }}">
							<div class="form-group">
								<label for="photo_diri">Photo Diri</label>
								<input type="file" class="form-control-file" id="photo_diri" name="photo_diri">
							</div>

							<div class="form-group">
								<label for="photo_ktp">Photo KTP</label>
								<input type="file" class="form-control-file" id="photo_ktp" name="photo_ktp">
							</div>

							<div class="form-group">
								<label for="photo_buku_bank">Photo Buku Bank</label>
								<input type="file" class="form-control-file" id="photo_buku_bank" name="photo_buku_bank">
							</div>

							<div class="form-group">
								<label for="photo_sim">Photo SIM</label>
								<input type="file" class="form-control-file" id="photo_sim" name="photo_sim">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btn_save">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
        $(document).on('click', '.btn-view-image', function(){
            var title = $(this).attr('data-title');
            var src = $(this).attr('data-src');

            $('#modal_view_title').text(title);
            $('#modal_view_image').attr('src', src);
            $('#modal_view').modal('show');
        });

		$(document).on('click', '.btn-edit-photo', function(){
            $('#modal_edit').modal('show');
        });

		$(document).on('click', '#btn_save', function(){
			$('#form_photo').submit();
		});
    </script>
@endsection