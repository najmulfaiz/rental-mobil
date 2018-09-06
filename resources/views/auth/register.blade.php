<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="theme/img/basic/favicon.ico" type="image/x-icon">
    <title>Remo - Register</title>
    <!-- CSS -->
    <link rel="stylesheet" href="theme/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto paper-card">
                    <div class="text-center">
                        {{-- <img src="theme/img/dummy/u4.png" alt=""> --}}
                        <h3 class="mt-2 p-b-20">Register</h3>
                    </div>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group has-icon"><i class="icon-user-o"></i>
                            <input id="name" type="text" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-icon"><i class="icon-phone_android"></i>
                            <input id="phone" type="text" class="form-control form-control-lg{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group has-icon"><i class="icon-asterisk"></i>
                            <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-icon"><i class="icon-asterisk"></i>
                            <input id="password_confirmation" type="password" class="form-control form-control-lg{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required placeholder="Password Confirmation">
                        </div>

                        <div class="form-group">
                            <label for="level">Daftar sebagai : </label>
                            <br />
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="level_pemilik" name="level" class="custom-control-input" value="pemilik" {{ old('level') == 'pemilik' ? 'selected' : '' }}>
                                <label class="custom-control-label m-0" for="level_pemilik">Pemilik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="level_penyewa" name="level" class="custom-control-input" value="penyewa" {{ old('level') == 'penyewa' ? 'selected' : '' }}>
                                <label class="custom-control-label m-0" for="level_penyewa">Penyewa</label>
                            </div>

                            @if ($errors->has('level'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('level') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="theme/js/app.js"></script>
</body>
</html>