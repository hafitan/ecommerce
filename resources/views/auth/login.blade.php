@extends('layouts.app')

@section('content')

<section class="vh-10">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-4 col-lg-4 col-xl-4">
      <br><br>
      <img src="{{url('landing/assets/images/login.gif')}}"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <form method="POST" action="{{ route('login') }}"style="padding-top:125px">
    @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label>Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label>Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">

          <!-- Submit button -->

    
            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
            {{-- @if (Route::has('password.request'))
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
            </a>
            @endif --}}

        </form>
      </div>
    </div>
  </div>
</section>
<style>
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
</style>

@endsection
