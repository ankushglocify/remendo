@extends('layouts.main')

@section('content')
<!---- Dashboard ----->
<section class="navbarMenu">
  <div class="container-fluid">
      <form action="{{url('addMember')}}" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">NAME</label>
          <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">EMAIL</label>
          <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="abc@abc.com">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">PHONE NUMBER</label>
          <input type="tel" name="phone" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">BIRTHDAY</label>
          <input type="date" name="dob" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">ANIVERSARY</label>
          <input type="date" name="dob" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</section>
@endsection
