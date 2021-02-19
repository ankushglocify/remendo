@extends('layouts.auth')

@section('content')
<section class="login">
        <div class="container-fluid">
            <div class="loginDiv">
                <div class="card loginInfo">
                    <div class="card-body">
                        <a href="/" target="_self" class="brand-logo"><img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                        <h4 class="card-title mb-1">Reset Password</h4>
                         <form method="POST" action="{{ route('password.email') }}">
                          @csrf
                            <div class="form-group">
                              <label for="email">E-Mail Address:</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="" name="email" value="{{ old('email') }}" required>
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default submitbtn btnEffect">Send Password Reset Link</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
