<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

<!-- PREMIUM FEATURES BUTTON -->

<!-- HEADER -->
<header role="banner">
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
                        <li><a href="{{route ('voir_pharmacie')}}">Home</a></li>
                        <!-- <li><a href="products.html">Products</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
</header>
<body onload = "getLocation();">
    

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 px-3 py-3 pt-md-4 pb-md-4">
            <div class="card">
                <div class="card-header">Ajouter une Pharmacie</div>

                <div class="card-body">        
                        
                    <form class="myForm" method="post" action="{{ route('enregistrer') }}"  enctype="multipart/form-data" id="form"> 
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
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Entrer Current password" name="name" >
                                <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="localite" class="col-sm-2 col-form-label">localite</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="localite" placeholder="Entrer localite" name="localite" >
                                <span class="text-danger error-text localite_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateCrea" class="col-sm-2 col-form-label">dateCrea</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" id="dateCrea" placeholder="ReEntrer new password" name="dateCrea" >
                                <span class="text-danger error-text dateCrea_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nbrAgent" class="col-sm-2 col-form-label">nbrAgent</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="nbrAgent" placeholder="ReEntrer new password" name="nbrAgent" >
                                <span class="text-danger error-text nbrAgent_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pharmacie_image" class="col-sm-2 col-form-label">pharmacie_image</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" id="pharmacie_image" placeholder="Entrer pharmacie_image" name="pharmacie_image" >
                                <span class="text-danger error-text pharmacie_image_error"></span>
                                </div>
                            </div>
                            <div class="img-holder"></div>
                            <input type="text" class="form-control" id="latitude" placeholder="Entrer pharmacie image" name="latitude" >        
                            <input type="text" class="form-control" id="longitude" placeholder="Entrer pharmacie image" name="longitude" >
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Ajouter Pharmacie</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{route ('voir_pharmacie')}}" type="reset" class="btn btn-danger">Annuler</a>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        }
      }
      function showPosition(position) {
        document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
      }
    </script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
});

      $(function(){
       $('#form').on('submit',function (e) {
           e.preventDefault();
           var form=this;
           $.ajax({
               url:$(form).attr('action'),
               method:$(form).attr('method'),
               data:new FormData(form),
               processData: false,
               dataType: 'json',
               contentType: false,
               beforeSend: function () {
                   $(form).find('span.error-text').text('');
               },
               success: function (data) {
                   if (data.code == 0) {
                       $.each(data.error, function (prefix, val) {
                           $(form).find('span.'+prefix+'_error').text(val[0]);
                       })
                   } else {
                       $(form)[0].reset();
                       alert(data.msg);
                   }
               }
           });
       });

       //voir l'image selectionner
       $('input[type="file"][name="pharmacie_image"]').val('');

       $('input[type="file"][name="pharmacie_image"]').on('change',function () {
           var img_path= $(this)[0].value;
           var img_holder= $('.img-holder');
           var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
           if (extension == 'jpeg' || extension == 'jpg' || extension == 'png' ) {
              if (typeof(FileReader) != 'undefined') {
                  img_holder.empty();
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                  }
                  img_holder.show();
                  reader.readAsDataURL($(this)[0].files[0]);
              } else {
                  $(img_holder).html('Le navigateur ne supporte pas FileReader');
              }
           } else {
               $(img_holder).empty();
           }
       })
    });
</script>
</body>