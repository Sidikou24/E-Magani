<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Mon blog</title>
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
                        <li><a href="{{ route('voir_employe',$pharma->id)}}">Retour</a></li>
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
                <div class="card-header">Inscrire Nouveau Employ??</div>

                <div class="card-body">
                    <!-- @if(!empty($message))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif -->
                    <form class="form-horizontal" method="POST" action="{{ route('inscrireEmploye',$pharma->id) }}">
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
                            <label for="name" class="col-sm-3 offset-sm-1 col-form-label">Nom *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de l'enregistr??">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prenom" class="col-sm-3 offset-sm-1 col-form-label">Pr??nom *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus placeholder="Prenom de l'enregist??">
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 offset-sm-1 col-form-label">Adresse Email *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Mail de l'enregistr??">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="fonction" class="col-sm-3 offset-sm-1 col-form-label">Fonction *</label>
                            <div class="col-sm-7">
                                <input type="text" id="fonction" class="form-control" name="fonction" list="fon" required pattern="[Ee]mploy??">
                                <datalist id="fon">
                                    <option>Employ??</option>
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3"> 
                            <label for="pharmacie_nom" class="col-sm-3 offset-sm-1 col-form-label">Inscrire dans quelle pharmacie? *</label>
                            <div class="col-sm-7">
                                <select class="form-control @error('pharmacie_nom') is-invalid @enderror" name="pharmacie_nom" id="pharmacie_nom" required>
                                   
                                        <!-- <option selected disabled value="">Choisir...</option> -->
                                        <option>{{$pharma->name}}</option>
                                    
                                </select>
                                @error('pharmacie_nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateNaiss" class="col-sm-3 offset-sm-1 col-form-label">Date de Naissance *</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control @error('dateNaiss') is-invalid @enderror" id="dateNaiss" name="dateNaiss" value="{{ old('dateNaiss') }}" required autocomplete="dateNaiss" autofocus>
                                @error('dateNaiss')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pays" class="col-sm-3 offset-sm-1 col-form-label">Pays *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('pays') is-invalid @enderror" id="pays" name="pays" value="{{ old('pays') }}" required autocomplete="pays">
                                @error('pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ville" class="col-sm-3 offset-sm-1 col-form-label">Ville *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="codePostal" class="col-sm-3 offset-sm-1 col-form-label">Code postal *</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('codePostal') is-invalid @enderror" id="codePostal" name="codePostal" value="{{ old('codePostal') }}" required autocomplete="codePostal" autofocus>
                                @error('codePostal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="numTel" class="col-sm-3 offset-sm-1 col-form-label">T??l??phone</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control  @error('numTel') is-invalid @enderror" id="numTel" name="numTel" value="{{ old('numTel') }}" required autocomplete="numTel" autofocus>
                                @error('numTel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sexe" class="col-sm-3 offset-sm-1 col-form-label">Sexe :</label>
                            <div class="col-sm-7">
                                <input type="radio" id="masculin" name="sexe" value="masculin" required>
                                <label for="masculin">Masculin</label>
                                <input type="radio" id="feminin" name="sexe" value="feminin" required>
                                <label for="feminin">Feminin</label>
                            </div>

                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-sm-3 offset-sm-1 col-form-label">Mot de passe *</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-sm-4 offset-sm-1 col-form-label">Confirmation mot de passe *</label>
                            <div class="col-sm-6">
                                
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <p>(*) Champs obligatoires</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <button type="submit" class="btn btn-success">Inscrire Employ??</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{route ('voir_pharmacie')}}" type="reset" class="btn btn-danger">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>