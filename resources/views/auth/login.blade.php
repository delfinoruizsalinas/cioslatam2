<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    
    @include('layouts.css')
    <!-- Custom fonts for this template-->
    <style>
        .bg-password-image2{
            background: url({{ asset('dash/images/cios/latam_login.jpg') }});
            background-position: center;
            background-size: cover;  
        }
        .btn-primary, .btn-primary:active, .btn-primary:focus {
            color: #ffffff;
            background: rgb(8, 71, 90);
            border-color: #1DBEDE;
        }
    </style>

</head>

<body id="page-top">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image2"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">BIENVENIDO</h1>
                                        <p class="mb-4">Escribe Correo Electrónico y Contraseña para Ingresar</p>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"  aria-describedby="emailHelp" placeholder="Correo  Electrónico"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-user" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Contraseña">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Login') }}
                                                </button>
                                                  @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>                                       
                                        </div> 
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @extends('layouts.js')
    <!-- Bootstrap core JavaScript-->
</body>

</html>