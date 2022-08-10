<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 

    <!-- Custom CSS -->
     <link rel="stylesheet" href="{{url('landing/css/style.css')}}">

    <title>E-Commerce</title>
</head>

<body>
    <div class="container">
        <header class="head my-3">
            <nav class="navbar navbar-expand-lg navbar-light head__custom-nav">
                <a class="navbar-brand d-flex align-items-center" href="{{url('/    ')}}">
                    <img src="{{url('landing/assets/images/logo.png')}}" alt="website logo">
                    <span>Adera Clothes</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span><img src="{{url('landing/assets/images/menu.png')}}" alt=""></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">

                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item" style="float: left important!">
                                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                     @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="row custom-section d-flex align-items-center">
            <div class="col-12 col-lg-4">
                <h2><i>Adera</i> </h2>
                <p>Aplikasi Platform Jual Beli Produk Di Website Secara Online.</p>
                <a href="{{url('shop')}}">Yuk Mulai</a>
            </div>
            <div class="col-12 col-lg-8">
                <img src="{{url('landing/assets/images/mainbenner.png')}}" alt="Team process banner">
            </div>
        </div>
    </div> 

    <!-- Optional JavaScript -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html> 



{{--  

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 justify-content-center text-center">
            <h1 style="font-weight: bold"> <span style="font-weight: lighter">Login dulu </span>Yuk</h1>
        </div>
    </div>
    <div class="row custom-section d-flex align-items-center">
        <div class="row justify-content-center">

        <div class="col-6 col-lg-6">
            <img src="{{url('landing/assets/images/panel-login.jpg')}}" alt="Team process banner">
        </div>

            <div class="col-md-6 ml-5">
                <div class="card" style="border: 0px">

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                          <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection  --}}
