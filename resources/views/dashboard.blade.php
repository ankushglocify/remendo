@extends('layouts.main')

@section('content')
<!---- Dashboard ----->

<section class="dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="birthdayList">
          <div class="birthdayIcon">
            <i class="fas fa-birthday-cake"></i>
          </div>
          <div class="birthdayTitle">
            <h2>Birthday</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="birthdayList">
          <div class="birthdayIcon">
            <i class="far fa-calendar-plus"></i>
          </div>
          <div class="birthdayTitle">
            <h2>Anniversary</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
