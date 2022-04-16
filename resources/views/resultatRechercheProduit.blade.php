<!DOCTYPE html>
<html lang="en">

<head>

  <title>E-Magani &mdash;</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="site-wrap">
    <div class="site-navbar py-2">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <!-- <div class="s-12 l-2">
                    <a href="{{url('/')}}" class="logo"><img src="img/logo-EMagani.jpg" alt=""></a>
                </div> -->
              <a href="index.html" class="js-logo-clone">E<strong class="text-primary">Magani</strong></a> 
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
              </ul>
            </nav>
          </div>
          
        </div>
      </div>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          
          <th scope="col">Produit </th>
          <th scope="col">Disponible </th>
        </tr>
      </thead>
      <tbody>
          @foreach ($produits as $produit)
          <tr>
          <td>{{ $produit->name }}</td>
          <td>pharmacie {{ $produit->pharmacie_nom }}</td>
          </tr>
          @endforeach
      </tbody>   
    </table>
  </div><br><br><br><br><br><br><br>
  <div>
  <footer class="site-footer bg-light">
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
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>
</html>

 
