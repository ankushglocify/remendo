@extends('layouts.auth')

@section('content')
<section class="login">
        <div class="container-fluid">
            <div class="loginDiv">
                <div class="card loginInfo">
                    <div class="card-body">
                        <a href="#" target="_self" class="brand-logo"><img class="img-fluid" src="assets/images/logo.png" alt="logo"></a>
                        <h4 class="card-title mb-1">Login</h4>
                        <form method="POST" class="loginForm" action="{{ route('login') }}">
                          @csrf
                            <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="john@example.com" name="email" value="{{ old('email') }}" required>
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="pwd">Password:</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Password" name="password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkbox d-flex justify-content-between">
                              <label><input type="checkbox" name="remember" >Remember me</label>
                              <a href="{{ route('password.request') }}" class="" target="_self"><small>Forgot Password?</small></a>
                            </div>
                            <button type="submit" class="btn btn-default submitbtn btnEffect">Submit</button>
                            <div class="signUp">
                              <span>Don't have an account?
                              <a href="{{ route('register') }}" class="" target="_self"> Sign up</a></span>
                          </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
