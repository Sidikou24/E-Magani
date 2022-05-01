<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>E-Magani</title>
    <link rel="icon" href="img/logo-EMagani.jpg">



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
                    <a href="{{url('/')}}" class="logo"><img src="img/logo-EMagani.jpg" alt=""></a>
                </div>
                <div class="top-nav s-12 l-10">
                    <p class="nav-text"></p>
                    <ul class="right chevron">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{route('login')}}">Products</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 px-3 py-3 pt-md-4 pb-md-4">
            <div class="card">
                <div class="card-header">Connexion</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 offset-sm-1 col-form-label">Adresse Email</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id=" email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-3 offset-sm-1 col-form-label">Mot de passe</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <button type="submit" class="submit-form button background-primary border-radius text-white">Connexion</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{route('register')}}" style="color: #44bd32;text-decoration: none;">Creer Un Nouveau compte</a>
                               
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}"  style="color: #44bd32;text-decoration: none;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>