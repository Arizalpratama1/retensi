<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <title>CM Academy</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/LogoCM.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>

    <body class="bg-default">
        <!-- Main content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header bg-gradient-secondary py-4 py-lg-5 pt-lg-2">
            <div class="container">
                <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="px-5">
                    <img src="{{ asset('argon') }}/img/brand/rsia.png" alt="">
                    <br></br>
                    <!-- <h1 class="text-white">Portal Desa Digital</h1> -->
                    <!-- <p class="text-lead text-white">Login Dashboard Portal Desa Digital</p> -->
                    </div>
                </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            </div>
            <!-- Page content -->
            <br><br>
            <div class="container mt--10 pb-4">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="text-center">
                            
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                        </div>
                        <div class="card-footer text-center pt-3 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Belum punya akun?
                            <a href="{{ url('/register')}}" class="text-primary text-gradient font-weight-bold">Daftar</a>
                        </p>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>