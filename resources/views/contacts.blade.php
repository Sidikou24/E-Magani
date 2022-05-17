<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>E-Magani</title>

  <link rel="stylesheet" href="../assetts/css/maicons.css">

  <link rel="stylesheet" href="../assetts/css/bootstrap.css">

  <link rel="stylesheet" href="../assetts/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assetts/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assetts/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">E</span>-Magani</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('rechercheProd')}}">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/contacts">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assetts/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{route('rechercheProd')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Contacter L'Administrateur</h1>

      <form class="contact-form mt-5" action="{{route('send.email')}}" method="post">
      {{ csrf_field() }}
      @if(Session::get('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
      @if(Session::get('error'))
          <div class="alert alert-danger">
            {{Session::get('error')}}
          </div>
        @endif

        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Nom</label>
            <input type="text" id="fullName" class="form-control" placeholder="Full name.." name="name" value="{{old('name')}}">
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="text" id="emailAddress" class="form-control" placeholder="Email address.." name="email" value="{{old('email')}}">
            @error('email') <span class="text-danger">{{$message}}</span> @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Sujet</label>
            <input type="text" id="subject" class="form-control" placeholder="Enter subject.." name="subject" value="{{old('subject')}}">
            @error('subject') <span class="text-danger">{{$message}}</span> @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Message</label>
            <textarea id="message" class="form-control" rows="8" placeholder="Enter Message.." name="message">{{old('message')}}</textarea>
            @error('message') <span class="text-danger">{{$message}}</span> @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Envoyer Message</button>
      </form>
    </div>
  </div>

  <!-- <div class="maps-container wow fadeInUp">
    <div id="google-maps"></div>
  </div> -->

  <div class="page-section banner-home bg-image" style="background-image: url(../assetts/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assetts/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Vous pouvez installer l'application sur votre mobile ou ordianteur</h1>
          <a href="#"><img src="../assetts/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assetts/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
  <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">A propos de <strong class="text-primary">E-Magani</strong></h3>
              <p>E-Magani est une plateforme qui vous permet de trouver les produits dont vous avez besoin dans le plus bref délai.</p>
            </div>
          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Informez-vous</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Nutrition</a></li>
              <li><a href="#">Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">FSM,Laboratoire RLANTIS, Monastir avenue Habib Bourguiba</li>
                <li class="phone"><a href="tel://55519224">+216 55519224</a></li>
                <li class="phone"><a href="tel://55519215">+216 55519215</a></li>
                <li class="email">Sidikou@gmail.com</li>
                <li class="email">Ridouane@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> Tous les droits réservés | Site crée 
               par <i class="icon-heart text-danger" aria-hidden="true"></i>  <a href="#" target="_blank"
                class="text-primary">SidikouDari & RidouaneDoudou</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
  </footer>

<script src="../assetts/js/jquery-3.5.1.min.js"></script>

<script src="../assetts/js/bootstrap.bundle.min.js"></script>

<script src="../assetts/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assetts/vendor/wow/wow.min.js"></script>

<script src="../assetts/js/google-maps.js"></script>

<script src="../assetts/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>