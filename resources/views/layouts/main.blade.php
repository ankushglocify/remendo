<!DOCTYPE html>
<html lang="en">
<head>
   <title>{{ config('app.name', 'Laravel') }}</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link  rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
  <link  rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <!-- <link rel="icon" href="assets/images/favicon.png" type="image" sizes="48x48"> -->  
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark dashboardMenu ">
          <a class="dashboardLogo" href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="menuList collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="TopBar">
              <li>
                <a href="{{url('/members')}}" class=""><span>Users</span></a>
              </li>
            <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <!--  <img src="{{ asset('assets/images/gravatar.jpg') }}" alt=""/> -->
                    <span>{{ Auth::user()->name }}</span>
                  </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <ul>
                    <li><a class="dropdown-item" href="#" onclick="openNav()">Profile</a></li>
                    <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
                </ul>
                  <form id="logout-form" action="https://www.printslips.com/logout" method="POST" style="display: none;">
                   {{ csrf_field() }}
                  </form>
                </div>
              </li>  
            </ul>
          </div>  
        </nav>
    </div>
  </header>
<!-- Header End -->
     @yield('content')
    
<!--- Footer ----->
<footer class="dashboardFooter">
  <div class="container-fluid">
    <div class="footerContent">
      <p>Copyright © Remindio</p>
    </div>
  </div>
</footer>
<!--- Footer End ----->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    $('#user_data_table').DataTable();
     /*$(document).ready(function () {
      dtable = $('#user_data_table').DataTable({
          "processing": true,
          "serverSide": true,
          "searching": true,
          "pageLength": 10,
           // "scrollY":     '80vh',
           "scrollX": true,
           "bSort" : false,
           "autoWidth":false,
          // "scrollCollapse": true,
          "lengthMenu": [ 10, 50, 70, 100, 150 ],
          "ajax":{
              "url": "{{url('getMembers')}}",
              "dataType": "json",
              "type": "get",
              "data":{ }
         },
        "columns": [
          { "data": "name" },
          { "data": "phone" },
          { "data": "dob" },
          { "data": "aniversary" },
          
          {
            "mData": "uid",
            "mRender": function (uid)  {
              return  `<a href="" class="btn btn-primary btn-sm">Edit</a><a class="btn btn-danger btn-sm margin-left-10" href="">Delete</a>`;
            }
          },
        ]

    });
  });*/
</script>
</body>
</html>     
