<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Magani &mdash;</title>
    <link rel="icon" href="pharmacie256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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

    <style>
        /* #resultP{
      display:none;
    } */
        #resultPharmacie {
            display: none;
        }

        .site-blocks-cover {
            max-width: 100%;
            display: block;
        }

    </style>

    <!-- PWA  -->
    <meta name="theme-color" content="green" />
    <link rel="apple-tuch-icon" href="pharmacie.png">
    <meta name="apple-mobile-web-app-status-bar" content="green">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" href="pharmacie.png'">
    <link rel="manifest" href="manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>

    <div class="site-wrap">


        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control"
                            placeholder="Entrer le nom d'une pharmacie et taper entrer pour savoir si elle existe ">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="{{ url('/') }}" class="js-logo-clone">E<strong class="text-primary">Magani</strong></a>
                            {{-- <a href="{{ url('/') }}" class="logo"><img src="img/logo-EMagani.jpg"
                                    alt=""></a> --}}
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="{{ url('/') }}">Accueil</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#" class="icons-btn d-inline-block js-search-open"><span
                                            class="icon-search"></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Accueil</a>
                            @else
                                {{-- pour login --}}
                                <a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
                                {{-- pour register --}}
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        @endif
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                            class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>


        <div id="imgAccueil" class="owl-carousel owl-single px-0">
            <div class="site-blocks-cover overlay" style="background-image: url('img/hero_bg_2.jpg'); max-width: 100%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto align-self-center">
                            <div class="site-block-cover-content text-center">
                                <h1 class="mb-0">Adopter <strong class="text-primary">le bon
                                        traitement</strong></h1>

                                <div class="row justify-content-center mb-5">
                                    <div class="col-lg-6 text-center">
                                        <p>Trouvez les produits qu'ils vous faut en quelques clics!!!</p>
                                    </div>
                                </div>

                                <p><button type="submit" data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-primary px-5 py-3">Rechercher Produits</button></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-blocks-cover overlay" style="background-image: url('img/bg_2.jpg'); max-width: 100%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto align-self-center">
                            <div class="site-block-cover-content text-center">
                                <h1 class="mb-0">E-<strong class="text-primary">Magani </strong>Ouvert H24
                                </h1>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-lg-6 text-center">
                                        <p> Plusieurs pharmacies pour vous servir. </p>
                                    </div>
                                </div>
                                <p><button type="submit" onclick="listePharma()" class="btn btn-primary px-5 py-3">Liste
                                        des Pharmacie</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="site-section"> --}}
        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Saisir le(s) produits que vous recherchez
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="formProduit" class="modal-body">

                        <form class="form-horizontal" method="GET" action="{{ route('rechercheProd') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="produit1" class="col-sm-3 offset-sm-1 col-form-label">Produit 1:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control @error('produit1') is-invalid @enderror"
                                        id="produit1" name="produit1" value="{{ old('produit1') }}"
                                        placeholder="nom d'un médicament" autocomplete="produit1">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="produit2" class="col-sm-3 offset-sm-1 col-form-label">Produit 2:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control @error('produit2') is-invalid @enderror"
                                        id="produit3" name="produit2" value="{{ old('produit2') }}"
                                        placeholder="nom d'un médicament" autocomplete="produit2">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="produit3" class="col-sm-3 offset-sm-1 col-form-label">Produit 3:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control @error('produit3') is-invalid @enderror"
                                        id="produit3" name="produit3" value="{{ old('produit3') }}"
                                        placeholder="nom d'un médicament" autocomplete="produit3">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="produit4" class="col-sm-3 offset-sm-1 col-form-label">Produit 4:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control @error('produit4') is-invalid @enderror"
                                        id="produit4" name="produit4" value="{{ old('produit4') }}"
                                        placeholder="nom d'un médicament" autocomplete="produit4">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="annuler" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" onclick="affich()" class="btn btn-primary">Rechercher</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <h4 class="card-header" style="background:white; color:black ">
            <marquee behavior="" direction=""><strong>Ici apparaitra le resultat de vos recherches</strong>
            </marquee>
        </h4><br>
        <!-- affichage resultat aprés recherche des produits -->
        <div id="resultP">
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
        </div>

        <!-- affichage resultat pour afficher la liste des pharmacies inscrites sur le site -->
        <div id="resultPharmacie">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pharmacie </th>
                        <th scope="col">Localité </th>
                        <th scope="col">Pharmacien responsable </th>
                        <th scope="col">Date de création </th>
                        <th scope="col">Nombre d'agent </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pharmacies as $pharmacie)
                        <tr>
                            <td>{{ $pharmacie->name }}</td>
                            <td> {{ $pharmacie->localite }}</td>
                            <td>Dr {{ $pharmacie->nom_proprio }}</td>
                            <td> {{ $pharmacie->dateCrea }}</td>
                            <td> {{ $pharmacie->nbrAgent }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- </div> --}}

        <footer class="site-footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">A propos de <strong class="text-primary">E-Magani</strong>
                            </h3>
                            <p>E-Magani est une plateforme qui vous permet de trouver les produits dont vous avez besoin
                                dans le plus bref délai.</p>
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
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Tous les droits réservés | Site crée
                            par <i class="icon-heart text-danger" aria-hidden="true"></i> <a href="#" target="_blank"
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

   
    <script src="sw.js"></script>
     <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("\sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <script>
        function affich() {
            document.getElementById("resultP").style.display = "block";
            document.getElementById("formProduit").style.display = "none";
            document.getElementById("exampleModal").style.display = "none";
        }

        function listePharma() {
            document.getElementById("resultPharmacie").style.display = "block";
            document.getElementById("resultP").style.display = "none";
        }
    </script>


</body>

</html>
