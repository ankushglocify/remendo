@extends('layouts.front')

@section('content')
<!-- Banner -->
  <section class="webBanner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="webBannerText wow bounceInLeft" data-wow-offset="300">
            <h1>Never Forget Birthday/Annevirsary</h1>
            <h5>The Only App That Personal Reminders For Your Loved once via Text sms & Email.</h5>
            <div class="scheduleBtn">
              <a href="#" class="scheduleDemoBtn btnEffect">Free Sign Up <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="webBannerText wow bounceInLeft" data-wow-offset="300">
            <img src="assets/images/banner-img.png" class="img-fluid" alt="bannerImg">
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- banner End -->

<!-- How it Works -->
  <section class="howItWorks wow bounceInLeft" data-wow-delay=".5s">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="integrationTitle">
            <h1>Using Remindio is Simple</h1>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="worksbody mt-5">
            <div class="bgBefore">
            </div>
            <div class="bgAfter">
            </div>
            <div class="worksIcon">
              <i class="fas fa-user"></i>
            </div>
            <div class="worksContent">
              <h4>Create Account</h4>
              <p>Import all your orders with automated channel sync and select the shipment</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="worksbody">
            <div class="bgBefore">
            </div>
            <div class="bgAfter">
            </div>
            <div class="worksIcon">
              <i class="fas fa-address-book"></i>
            </div>
            <div class="worksContent">
              <h4>Add Your Contact</h4>
              <p>Based on your requirement select a courier partner</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="worksbody mt-5">
            <div class="bgBefore">
            </div>
            <div class="bgAfter">
            </div>
            <div class="worksIcon">
              <i class="fas fa-bell"></i>
            </div>
            <div class="worksContent">
              <h4>Receive Notifications</h4>
              <p>Pack your orders, print labels and hand it over to the courier partner</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- How it Works End -->

<!-- Why Print Slip -->
<section  id="whyprint" class="whyPrintSlip wow bounceInUp" data-wow-delay=".5s">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
        <div class="whyPrintSlipTitle">
          <h1>Why Remindio?</h1>
        </div>
      </div>
    <div class="col-lg-6 col-md-6 col-sm-12 wow bounceInLeft" data-wow-delay=".5s">
      <div class="slideImg professionalImg">
         <img src="assets/images/why-remind.png" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 wow bounceInRight" data-wow-delay=".5s">
        <div class="slideText professionalText">
           <h3>Personal</h3>
            <ul class="slderList">
              <li> <img src="assets/images/check-right.svg" alt=""> <span>Save all your contact with their Birthdays & Annerversay.</span></li>
              <li><img src="assets/images/check-right.svg" alt=""> <span>Get text & Email Notifications directly to your phone.</span></li>
              <li><img src="assets/images/check-right.svg" alt=""> <span>When your circle is big, you the forget Birthdays & Anneversary of your loved ones.</span></li>
            </ul>
            <div class="scheduleBtn sliderBtn">
              <a href="#" class="scheduleDemoBtn btnEffect">Know More <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Why Print Slip End -->
<!-- Why Print Slip -->

<!-- Why Print Slip End -->
<section class="professional">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 wow bounceInLeft" data-wow-delay=".5s">
        <div class="slideText professionalText">
              <h3>Professional/Office/Commercial</h3>
              <ul class="slderList">
                <li> <img src="assets/images/check-right.svg" alt=""> <span>You are CEO of a company and you have 200+ employees. Its hard to keep track of every one Birthday</span></li>
                <li><img src="assets/images/check-right.svg" alt=""> <span>Make your employee feel special bu wishing them on Birthday.</span></li>
                <li><img src="assets/images/check-right.svg" alt=""> <span>Our app will send you personal Notification as text or email.</span></li>
              </ul>
              <div class="scheduleBtn sliderBtn">
                <a href="#" class="scheduleDemoBtn btnEffect">Know More <span><i class="fas fa-arrow-right"></i></span></a>
              </div>
            </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 wow bounceInRight" data-wow-delay=".5s">
         <div class="slideImg professionalImg">
              <img src="assets/images/professional.png" class="img-fluid">
            </div>
      </div>
    </div>
  </div>
</section>
@endsection
