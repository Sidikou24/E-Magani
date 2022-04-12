<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>E-Magani</title>
    <link rel="icon" href="https://www.jsdelivr.com/img/icon_256x256.png">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">

    <!-- other CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Magani</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
</head>
<!-- PREMIUM FEATURES BUTTON -->

<!-- HEADER -->
<header role="banner">
        <!-- Top Navigation -->
        <nav class="background-white background-primary-hightlight">
            <div class="line">
                <div class="s-12 l-2">
                    <a href="{{url('/')}}" class="logo"><img src="img/logo-EMagani.jpg" alt=""></a>
                </div>
                <div class="top-nav s-12 l-10">
                    <p class="nav-text"></p>
                    <ul class="right chevron">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <!-- <li><a href="products.html">Products</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 px-3 py-3 pt-md-4 pb-md-4">
            <div class="card">
                <div class="card-header">Saisir le(s) produits(s) dont vous avez besoin</div>

                <div class="card-body">
                   
                    <form class="form-horizontal" method="GET" action="{{route('clientProduitSearch')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="produit1" class="col-sm-3 offset-sm-1 col-form-label">Produit 1:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('produit1') is-invalid @enderror" id="produit1" name="produit1" value="{{ old('produit1') }}"  placeholder="nom d'un médicament" autocomplete="produit1">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="produit2" class="col-sm-3 offset-sm-1 col-form-label">Produit 2:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('produit2') is-invalid @enderror" id="produit3" name="produit2" value="{{ old('produit2') }}"  placeholder="nom d'un médicament" autocomplete="produit2">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="produit3" class="col-sm-3 offset-sm-1 col-form-label">Produit 3:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('produit3') is-invalid @enderror" id="produit3" name="produit3" value="{{ old('produit3') }}"  placeholder="nom d'un médicament" autocomplete="produit3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="produit4" class="col-sm-3 offset-sm-1 col-form-label">Produit 4:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('produit4') is-invalid @enderror" id="produit4" name="produit4" value="{{ old('produit4') }}"  placeholder="nom d'un médicament" autocomplete="produit4">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <button type="submit"  class="btn btn-success">Rechercher</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>