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
    <title>Prospera Free - New Amazing HTML5 Template</title>
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
    <!-- Top Bar -->
    <!-- <div class="top-bar background-white">
        <div class="line">
            <div class="s-12 m-6 l-6">
                <div class="top-bar-contact">
                    <p class="text-size-12">Contact Us: 0800 200 200 | <a class="text-orange-hover" href="mailto:admin@gmail.com">admin@gmail.com</a></p>
                </div>
            </div> -->
            <!-- <div class="s-12 m-6 l-6">
                <div class="right">
                    <ul class="top-bar-social right">
                        <li><a href="/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                        <li><a href="/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                        <li><a href="/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                        <li><a href="/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>     reseaux sociaux-->
        </div>

        <!-- Top Navigation -->
        <nav class="background-white background-primary-hightlight">
            <div class="line">
                <div class="s-12 l-2">
                    <a href="index.html" class="logo"><img src="img/logo-EMagani.jpg" alt=""></a>
                </div>
                <div class="top-nav s-12 l-10">
                    <p class="nav-text"></p>
                    <ul class="right chevron">
                        <li><a href="{{ route('voir_pharmacie') }}">Home</a></li>
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
                <div class="card-header">Modifier un produit de votre Stock</div>

                <div class="card-body">
                    <!-- @if(!empty($message))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif -->              
                        
                    <form class="form-horizontal" method="GET" action="{{ route('majProduit',$produit->id) }}"> 
                        {{ csrf_field() }}
                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            @if(Session::get('error'))
                                <<div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 offset-sm-1 col-form-label">Nom: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $produit->name }}" required autocomplete="name" autofocus placeholder="Nom du produit">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="num_lot" class="col-sm-3 offset-sm-1 col-form-label">Numéro de lot: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('num_lot') is-invalid @enderror" id="num_lot" name="num_lot" value="{{ old('num_lot') ?? $produit->num_lot }}" required autocomplete="num_lot" autofocus placeholder="Numéro de lot">
                                @error('num_lot')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="quantite" class="col-sm-3 offset-sm-1 col-form-label">Quantité</label>
                            <div class="col-sm-7">
                                <input type="bumber" class="form-control @error('quantite') is-invalid @enderror" id="quantite" name="quantite" value="{{ old('quantite') ?? $produit->quantite }}" required autocomplete="quantite" placeholder="quantite">
                                @error('quantite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prix" class="col-sm-3 offset-sm-1 col-form-label">Prix: </label>
                            <div class="col-sm-7"> 
                                <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix') ?? $produit->prix }}" placeholder="prix du produit" required>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateFab" class="col-sm-3 offset-sm-1 col-form-label">Date de Fabrication: </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control @error('dateFab') is-invalid @enderror" id="dateFab" name="dateFab" value="{{ old('dateFab') ?? $produit->dateFab }}" required autocomplete="dateFab" autofocus>
                                @error('dateFab')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="datePer" class="col-sm-3 offset-sm-1 col-form-label">Date de Péremption: </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control @error('datePer') is-invalid @enderror" id="datePer" name="datePer" value="{{ old('datePer') ?? $produit->datePer }}" required autocomplete="datePer" autofocus>
                                @error('datePer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <button type="submit" class="btn btn-success"> Enregistrer </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{route('voir_produit') }}" type="reset" class="btn btn-danger">Annuler</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>