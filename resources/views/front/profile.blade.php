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
          <form action="{{url('profile')}}" method="post">
           {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">NAME</label>
              <input type="name" name="name" class="form-control" id="member_name" value="{{ $data->name}}" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">EMAIL</label>
              <input type="email" name="email" class="form-control" id="member_email" value="{{$data->email}}" placeholder="abc@abc.com">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">CURRENT PASSWORD </label>
              <input type="password" name="current_password" class="form-control" id="member_phone" value="" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">NEW PASSWORD</label>
              <input type="password"  name="new_password" class="form-control " id="member_dob" value="" placeholder="">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">CONFIRM NEW PASSWORD</label>
              <input type="password" name="new_confirm_password" class="form-control " id="member_aniver" placeholder="" value="">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
      
  </div>
</section>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
