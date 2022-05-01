
@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')
<h4 class="card-header" style="background:white; color:black "><marquee behavior="" direction=""><strong>Bienvenue Pharmacien: {{ Auth::user()->name }} {{ Auth::user()->prenom }} ici votre tableau de bord </strong></marquee></h4><br>
<div class="container">
    <h3>Les pharmacies:</h3>

    <div class="row my-2 my-lg-0 float-right mb-4">
      <div class="col-md-12 text-right ">
      <input class="form-control mr-sm-2 " type="text" name="recherche" placeholder="Rechercher pharmacie" aria-label="Search" >
      </div>
    </div><br><br>

  <a class="btn btn-success float-right mb-4" href="{{ route('pharmacie.dashboard') }}" data-toggle="modal" data-target="#ajouterPharmacie">Ajouter Nouveau pharmacie</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">localité</th>
            <th scope="col">Création</th>
            <th scope="col">Nombre d'agents</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pharmacies as $key => $pharmacie)
            <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $pharmacie->name }}</td>
            <td>{{ $pharmacie->localite }}</td>
            <td>{{ $pharmacie->dateCrea }}</td>
            <td>{{ $pharmacie->nbrAgent }}</td>
            <td>
            <a href="{{ route('pharmacien.dashboard',$pharmacie->id) }}" class="btn btn-success">Gerer</a>
            <a href="" data-toggle="modal" data-target="#editPharmacie{{$pharmacie->id}}" class="btn btn-info btnt-sm"><i class="fa fa-edit"></i> Modifier </a>
              <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletePharmacie{{$pharmacie->id}}"><i class="fa fa-trash"></i> Supprimer </a>
            </td>
          </tr>

                                <div class="modal right fade" id="editPharmacie{{$pharmacie->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Modifier Employe</h4>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                          <!-- <span aria-hidden="true">&times;</span> -->
                                        </button>
                                        {{$pharmacie->id}}
                                      </div>
                                      <div class="modal-body">
                                      <form action="{{ route('majPharmacie',$pharmacie->id) }}" method="get">
                                      {{ csrf_field() }}
                                      <!-- @method('put') -->
                                      <div class="form-group">
                                          <label for="name" >Nom *</label>
                                          <input type="text" class="form-control" id="name" name="name" value="{{$pharmacie->name}}" d autocomplete="name" autofocus placeholder="Nom de l'enregistré">
                                      </div>
                                      <div class="form-group">
                                            <label for="localite" class="">Localite *</label>
                                            <input type="text" class="form-control" id="localite" name="localite" value="{{ $pharmacie->localite}}" d autocomplete="localite" autofocus placeholder="Prenom de l'enregisté">
                                      </div>
                                      <div class="form-group">
                                            <label for="dateCrea">dateCrea</label>
                                            <input type="date" class="form-control" id="dateCrea" placeholder="dateCrea" value="{{$pharmacie->dateCrea}}" name="dateCrea" >
                                      </div>
                                      <div class="form-group">
                                          <label for="nbrAgent" class="">nbrAgent *</label>
                                          <input type="number" class="form-control" id="nbrAgent" placeholder="Nombre D'Agents" name="nbrAgent" >
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn btn-warning btn-block">Modifier Employé</button>
                                      </div>
                                      </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>



                                
                                                             <!-- Modal de suppression d'un employer -->
                                                             <div class="modal right fade" id="deletePharmacie{{$pharmacie->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title" id="staticBackdropLabel">Supprimer Employe</h4>
                                                                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <form action="{{ route('suppPharmacie', $pharmacie->id) }}" method="get">
                                                                    {{ csrf_field() }}
                                                                    <p>Etes-vous sure de Supprimier La Pharmacie {{$pharmacie->name}} ?</p>
                                                                    <div class="modal-footer">
                                                                      <button class="btn btn-info" data-dismiss="modal ">Annuler</button>
                                                                      <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                    </div>
                                                                    </form>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>

            @endforeach
        </tbody>   
      </table>
  </div>
</div><br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#exampleModal">
Ajouter Nouvelle pharmacie
</button>
<!-- <a class="" href="{{ route('pharmacie.dashboard') }}"></a> -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">localité</th>
      <th scope="col">Création</th>
      <th scope="col">Nombre d'agents</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($pharmacies as $pharmacie)
      <tr>
      <th scope="row">{{ $pharmacie->id }}</th>
      <td>{{ $pharmacie->name }}</td>
      <td>{{ $pharmacie->localite }}</td>
      <td>{{ $pharmacie->dateCrea }}</td>
      <td>{{ $pharmacie->nbrAgent }}</td>
       <td>
       <a href="{{ route('pharmacien.dashboard',$pharmacie->id) }}" class="btn btn-success">Gerer</a>
        <a href="{{ route('modifierpharmacie',$pharmacie->id) }}" class="btn btn-primary"> <i class="fa fa-edit"></i> Modifier </a>
        <a href="{{ route('suppPharmacie', $pharmacie->id) }}" class="btn btn-danger"> <i class="fa fa-trash"></i> Supprimer </a>
      </td>
    </tr>
      @endforeach
  </tbody>   
</table>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle pharmacie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form class="form-horizontal" method="GET" action="{{ route('enregistrer') }}"> 
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de la pharmacie">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="localite" class="col-sm-3 offset-sm-1 col-form-label">Localité: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('localite') is-invalid @enderror" id="localite" name="localite" value="{{ old('localite') }}" required autocomplete="localite" placeholder="localite">
                                @error('localite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateCrea" class="col-sm-3 offset-sm-1 col-form-label">Date de creation: </label>
                            <div class="col-sm-7"> 
                                <input type="date" class="form-control" id="dateCrea" name="dateCrea" value="{{ old('dateCrea') }}" placeholder="date de Création de la pharmacie">

                                @error('dateCrea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nbrAgent" class="col-sm-3 offset-sm-1 col-form-label">Nombre d'agents: </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control @error('nbrAgent') is-invalid @enderror" id="nbrAgent" name="nbrAgent" value="{{ old('nbrAgent') }}" required autocomplete="nbrAgent" autofocus placeholder="Nombre d'agents de la pharmacie">
                                @error('nbrAgent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="offset-sm-4 col-sm-7">
                                <button type="submit" class="btn btn-success"> Ajouter </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                            </div>
                        </div>

                    </form>
      
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
@endsection




<!-- Modal d'ajout d'un Ajouter une Pharmacie -->
<div class="modal right fade" id="ajouterPharmacie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Ajouter une Pharmacie</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" method="post" action="{{ route('enregistrer') }}"  enctype="multipart/form-data" id="form">
       {{ csrf_field() }}
       <div class="form-group">
          <label for="name" >Nom de La Pharmacie</label>
          <input type="text" class="form-control" id="name" placeholder="Entrer Current password" name="name" >
          <span class="text-danger error-text name_error"></span>
       </div>
       <div class="form-group">
            <label for="localite" class="">localite *</label>
            <input type="text" class="form-control" id="localite" placeholder="Entrer localite" name="localite" >
            <span class="text-danger error-text localite_error"></span>
       </div>
       <div class="form-group">
            <label for="dateCrea" class="">dateCrea *</label>
            <input type="date" class="form-control" id="dateCrea" placeholder="Date de Creation" name="dateCrea" >
            <span class="text-danger error-text dateCrea_error"></span>
       </div>
       <div class="form-group">
          <label for="nbrAgent" class="">nbrAgent *</label>
          <input type="number" class="form-control" id="nbrAgent" placeholder="Nombre D'Agents" name="nbrAgent" >
          <span class="text-danger error-text nbrAgent_error"></span>
       </div>
       <div class="form-group">
            <label for="pharmacie_image" class="">Image de la pharmacie</label>
            <input type="file" class="form-control" id="pharmacie_image" placeholder="Entrer pharmacie image" name="pharmacie_image" >
            <span class="text-danger error-text pharmacie_image_error"></span>
        </div>
       <div class="modal-footer">
         <button class="btn btn-primary">Inscrire Pharmacie</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="{{route ('voir_pharmacie')}}" type="reset" class="btn btn-danger">Annuler</a>
       </div>

       </form>
      </div>
    </div>
  </div>
</div>


@endsection
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
  .modal.right .modal-dialog{
    /* position: absolute; */
    top: 0;
    right: 0;
    margin-right: 19vh;
  }
  .modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%,0,0);
    transform: translate3d(25%, , 0, 0);
  }
</style>
<style>
    .modal.left .modal-dialog{
        position: absolute;
        top: 0;
        left:0;
        margin: 0;
    }
    .modal.left .modal-dialog.modal-sm{
        max-width: 300px;
    }
    .mmodal.left .modal-content{
        min-height: 100vh
    }

    h4{
        font-family: Verdona, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        font-weight: bolder;
        text-transform: uppercase;
    }

    .card-header{
        background: #2ecc71;
        color: #fff;
    }
</style>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
