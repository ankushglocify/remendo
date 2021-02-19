@extends('layouts.auth')

@section('content')
<section class="login">
        <div class="container-fluid">
            <div class="loginDiv">
                <div class="card loginInfo">
                    <div class="card-body">
                        <a href="/" target="_self" class="brand-logo"><img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                        <h4 class="card-title mb-1">Reset Password</h4>
                         <form method="POST" action="{{ route('password.update') }}">
                          @csrf
                            <div class="form-group">
                              <label for="email">E-Mail Address:</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label for="email">Password:</label>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label for="email">Confirm Password:</label>
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-default submitbtn btnEffect">Reset Password</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
