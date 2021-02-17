@extends('layouts.main')

@section('content')
<!---- Dashboard ----->
<section class="navbarMenu">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="flash-message">
            @if($errors->any())
            <p class="alert alert-danger">{{$errors->first()}}</p>
            @endif
         </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
          @endif


          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
          @endif
        <div class="profileForm">
          <form action="{{url('addMember')}}" method="post">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="name" name="name" class="form-control" id="member_name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" name="email" class="form-control" id="member_email" value="{{ old('email') }}" placeholder="abc@abc.com">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone Number</label>
              <input type="tel" name="phone" class="form-control" id="member_phone" value="{{ old('phone') }}" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Birthday</label>
              <input  name="dob" class="form-control datepicker" id="member_dob" value="{{ old('dob') }}" placeholder="">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Anniversary</label>
              <input  name="aniversary" class="form-control datepicker" id="member_aniver" placeholder="" value="{{ old('aniversary') }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
      
  </div>
</section>

@endsection
