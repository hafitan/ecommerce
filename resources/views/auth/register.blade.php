@extends('layouts.app')

@section('content')

<section class="vh-10">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-4 col-lg-4 col-xl-4">
      <br><br>
      <img src="{{url('landing/assets/images/register.gif')}}"style="padding-top:10px"
          class="img-fluid" alt="Phone image">
      </div>
      
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1" style="padding-top:90px">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-left">{{ __('username') }}</label>

                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row"> --}}
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('role') }}</label> --}}

                                <div class="col-md-8">
                                    <input id="password" type="hidden" value="0" class="form-control @error('password') is-invalid @enderror" name="role" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            {{-- </div> --}}

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        {{ __('Register') }}
                                    </button>
                                    
                                </div>
                            </div>
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
