@extends('layouts.admin_master')

@section('title')
    Master Voucher
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header white">
                    <strong> Edit Voucher "{{ $voucher->kode_voucher }}" </strong>
                </div>
                <form action="{{ route('admin.voucher.update', $voucher->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="kode_voucher">Kode Voucher</label>
                                <input type="text" name="kode_voucher" id="kode_voucher" class="form-control{{ $errors->has('kode_voucher') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $voucher->kode_voucher }}">
                                @if ($errors->has('kode_voucher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_voucher') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="waktu_mulai">Waktu Mulai</label>
                                <input type="text" name="waktu_mulai" id="waktu_mulai" class="date-time-picker form-control{{ $errors->has('waktu_mulai') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ date('Y/m/d H:i', strtotime($voucher->waktu_mulai)) }}" readonly>
                                @if ($errors->has('waktu_mulai'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('waktu_mulai') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="waktu_berakhir">Waktu Berakhir</label>
                                <input type="text" name="waktu_berakhir" id="waktu_berakhir" class="date-time-picker form-control{{ $errors->has('waktu_berakhir') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ date('Y/m/d H:i', strtotime($voucher->waktu_berakhir)) }}" readonly>
                                @if ($errors->has('waktu_berakhir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('waktu_berakhir') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="max_pemakaian">Maximal Pemakaian</label>
                                <input type="number" name="max_pemakaian" id="max_pemakaian" class="form-control{{ $errors->has('max_pemakaian') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $voucher->max_pemakaian }}">
                                @if ($errors->has('max_pemakaian'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('max_pemakaian') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="bentuk" class="col-form-label font-weight-bold">Bentuk</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bentuk_solid" name="bentuk" class="custom-control-input"{{ $voucher->bentuk == 'solid' ? 'checked' : '' }} value="solid">
                                    <label class="custom-control-label m-0" for="bentuk_solid">Solid</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="bentuk_persen" name="bentuk" class="custom-control-input" {{ $voucher->bentuk == 'persen' ? 'checked' : '' }} value="persen">
                                    <label class="custom-control-label m-0" for="bentuk_persen">Persen</label>
                                </div>
                                @if ($errors->has('bentuk'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bentuk') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="isi">Isi</label>
                                <input type="number" name="isi" id="isi" class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $voucher->isi }}">
                                @if ($errors->has('isi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('isi') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="level">Level</label>
                                <select name="level" id="level" class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}">
                                    <option value=""> -- Pilih Level -- </option>
                                    <option value="penyewa" {{ $voucher->level == 'penyewa' ? 'selected' : '' }}>Penyewa</option>
                                    <option value="rental" {{ $voucher->level == 'rental' ? 'selected' : '' }}>Rental</option>
                                </select>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-form-label font-weight-bold">Status</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status_aktif" name="status" class="custom-control-input"{{ $voucher->status == 'aktif' ? 'checked' : '' }} value="aktif">
                                    <label class="custom-control-label m-0" for="status_aktif">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status_tidak_aktif" name="status" class="custom-control-input" {{ $voucher->status == 'tidak' ? 'checked' : '' }} value="tidak">
                                    <label class="custom-control-label m-0" for="status_tidak_aktif">Tidak Aktif</label>
                                </div>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.voucher.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endsection
