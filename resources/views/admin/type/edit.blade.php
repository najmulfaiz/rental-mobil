@extends('layouts.admin_master')

@section('title')
    Master Type
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header white">
                    <strong> Edit Master Type "{{ $type->name }}" </strong>
                </div>
                <form action="{{ route('admin.type.update', $type->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-control" disabled="true">
                                    <option value=""> -- Pilih Brand -- </option>
                                </select>
                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="col-form-label font-weight-bold" for="name">Type Name</label>
                                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $type->name }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.type.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
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
            $.ajax({
                url: '{{ route('api.brand') }}',
                dataType: 'json',
                type: 'get',
                data: { },
                success: function(data) {
                    var id = {{ $type->brand->id }};
                    $('#brand').html('<option value=""> -- Pilih Brand -- </option>');
                    
                    $.each(data, function(index, value){
                        if(value.id == id) {
                            $('#brand').append('<option value="' + value.id + '" selected>' + value.name + '</option>');
                        } else {
                            $('#brand').append('<option value="' + value.id + '">' + value.name + '</option>');
                        }
                    });

                    $('#brand').removeAttr('disabled');
                },
                error: function(xhr) {
                    console.log(xhr.status);
                }
            });
        });
    </script>
@endsection
