@extends('auth.Layout.index')






@section('content')
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('assets3/images/img-01.png') }}" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('employee.register.create') }}">
                @csrf
                <span class="login100-form-title">
                    Create <span style="color: #55B145"> Employee</span> Acount
                </span>

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                  

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
               @enderror

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                  

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror



                <div class="wrap-input100 validate-input" >
                    <select class="input100" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    {{--  <input class="input100" type="email"  
                    class="@error('email') is-invalid @enderror" name="email"
                     value="{{ old('email') }}" required autocomplete="email" 
                     autofocus placeholder="Email">  --}}

                    {{--  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror  --}}

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </span>
                </div>

                @error('gender')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror


                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="date"  
                     name="dob" value="{{ old('dob') }}" required  
                     autofocus placeholder="date">
                    {{--  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror  --}}

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>

                @error('dob')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Sign up
                    </button>
                  
                </div>

                {{--  <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>  --}}

                <div class="text-center p-t-30">
                    <a class="txt2" href="{{ route('register') }}">
                        Register Company
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                    <br />
                    <a class="txt2" href="{{ route('login') }}">
                        Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection