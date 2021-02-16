@extends('layouts.auth')

@section('content')
<section class="login">
        <div class="container-fluid">
            <div class="loginDiv">
                <div class="card loginInfo">
                    <div class="card-body">
                        <a href="#" target="_self" class="brand-logo"><img class="img-fluid" src="assets/images/logo.png" alt="logo"></a>
                        <h4 class="card-title mb-1">Login</h4>
                         <form method="POST" action="{{ route('register') }}">
                          @csrf
                            <div class="form-group">
                              <label for="email">Name:</label>
                              <input type="emaameil" class="form-control @error('name') is-invalid @enderror" id="email"  placeholder="john@example.com" name="name" value="{{ old('name') }}" value="{{ old('name') }}" required>
                               @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="pwd">E-Mail Address:</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="pwd" placeholder="" name="email" value="{{ old('email') }}" required>
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label for="pwd">Password:</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="" name="password" required>
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label for="pwd">Confirm Password:</label>
                              <input type="password" class="form-control " id="pwd" placeholder="" name="password_confirmation" required>
                              @error('Password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            
                            <button type="submit" class="btn btn-default submitbtn btnEffect">Submit</button>
                             <div class="signUp">
                              <span>If you already have an account?
                               <a href="{{ route('login') }}" class="" target="_self">Login</a></span>
                          </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
