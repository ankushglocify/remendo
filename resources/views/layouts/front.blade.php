<!DOCTYPE html>
<html lang="en">
<head>
   <title>{{ config('app.name', 'Laravel') }}</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link  rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  <link  rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
   <link href="{{ asset('assets/css/jquerysctipttop.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image" sizes="48x48">
  
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-md navbar-dark navbarMenu ">
          <a class="navbarLogo" href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse menuList" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#whyprint">Why Us?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/register')}}">Sign Up</a>
              </li>    
            </ul>
          </div>  
        </nav>
      </div>
    </div>
  </header>
<!-- Header End -->
     @yield('content')
    
<!-- footer -->
<div class="footerBottom">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="copyRight">
          <p>Copyright Ⓒ 2021 Remindio. All Rights Reserved.</p>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="bottomList">
         <ul class="bottommenuList">
           <li> A Product of <a href="http://www.glocify.com/" target="_blank">Glocify Technologies.</a></li>
         </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer End -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <script src="{{ asset('assets/js/all.js') }}"></script>
  <script src="{{ asset('assets/js/wow.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.animateTyping.js')}}"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>
  <script>
    $(document).ready(function(){
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        } 
      });
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
</body>
</html>     
