<!DOCTYPE html>
<html lang="en">
<head>
  <title>Remindio - A Simple Birthday Reminder App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link  rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
 <!--  <link rel="icon" href="assets/images/favicon.png" type="image" sizes="48x48">  --> 
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <style type="text/css">
  	.invalid-feedback{display: block !important;}
  </style>
</head>
<body>
     @yield('content')
    
     
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js//popper.min.js') }}"></script>
<script src="{{ asset('assets/js//bootstrap.min.js') }}"></script>
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
</body>
</html>