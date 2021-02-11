@extends('layouts.main')

@section('content')
<!---- Dashboard ----->

<section class="dashboard">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 marginBottom">
        <div class="birthdayList">
          <div class="birthdayIcon">
            <i class="fas fa-birthday-cake"></i>
          </div>
          <div class="birthdayTitle">
            <h2>Birthday</h2>
          </div>
          <div class="birthdayBody">
            <p class="Upcoming">Upcoming Birthdays</p>

            @foreach($dob as $dobs)
              <p class="membername">{{$dobs->name}}</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 marginBottom">
        <div class="birthdayList">
          <div class="birthdayIcon">
            <i class="far fa-calendar-plus"></i>
          </div>
          <div class="birthdayTitle">
            <h2>Anniversary</h2>
          </div>
          <div class="birthdayBody">
             <p class="Upcoming">Upcoming Anniversaries</p>
            @foreach($aniversary as $aniversarys)
              <p class="membername">{{$aniversarys->name}}</p>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
