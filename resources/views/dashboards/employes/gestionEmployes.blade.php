<!-- <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head> -->
@extends('layouts.app')

@section('title','Dasboard')

@section('content')

<!-- <div class="container">
  <h3>Les employes de la pharmacie: {{$pharmacie->name}}</h3>
  
<form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{route('rechercheEmploye',$pharmacie->id)}}">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher un employe" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form><br><br>
<a class="btn btn-success float-right mb-4" href="{{ route('ajoutEmploye',$pharmacie->id) }}">Ajouter Nouveau employe</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Fonction</th>
      <th scope="col">Email</th>
      <th scope="col">Lieu</th>
      <th scope="col">Naissance</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($employes as $employe)
      <tr>
      <th scope="row">{{ $employe->id }}</th>
      <td>{{ $employe->name }}</td>
      <td>{{ $employe->prenom }}</td>
      <td>{{ $employe->fonction }}</td>
      <td>{{ $employe->email }}</td>
      <td>pharmacie {{ $employe->pharmacie_nom }}</td>
      <td>{{ $employe->dateNaiss }}</td>
      <td>
        <a href="{{ route('suppEmploye', $employe->id) }}" class="btn btn-danger"> Retirer </a>
      </td>
    </tr>
      @endforeach
  </tbody>   
</table> -->
<!-- </div> -->
<div class="container">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-md-9">
          <div class="card">
          <h4 class="card-header" style="background:#2ecc71; color:#fff "><marquee behavior="" direction="">Bienvenue Pharmacien: {{ Auth::user()->name }} dans la La Gestions des Employer de la Pharmacie: {{ $pharmacie->name }}</marquee></h4>
            <div class="card-header">
              <h4 style="float: left"> Ajouter Nouveau employe</h4>
              <a href="#" style="float: right" class="btn btn-dark" 
              data-toggle="modal" data-target="#addUser">
              <i class="fa fa-plus"></i> Ajouter Nouveau employe</a> </div>
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
            <div class="card-body">
              <table class="table table-bordered table-left">
                <thead>
                    <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Prénom</th>
                          <th scope="col">Fonction</th>
                          <th scope="col">Email</th>
                          <th scope="col">Lieu</th>
                          <th scope="col">Naissance</th>
                          <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $key =>  $employe)
                          <tr>
                              <th scope="row">{{ $key + 1 }}</th>
                              <td>{{ $employe->name }}</td>
                              <td>{{ $employe->prenom }}</td>
                              <td>{{ $employe->fonction }}</td>
                              <td>{{ $employe->email }}</td>
                              <td>pharmacie {{ $employe->pharmacie_nom }}</td>
                              <td>{{ $employe->dateNaiss }}</td>
                              <td>
                                <div class="btn-group">
                                <a href="" data-toggle="modal" data-target="#editUser{{$employe->id}}" class="btn btn-info btnt-sm"><i class="fa fa-edit"></i> Modifier </a>
                                  <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{$employe->id}}"><i class="fa fa-trash"></i> Retirer </a>
                                  
                                </div>
                              </td>
                            </tr>



                                                          <!-- Modal de modification d'un employer -->
                                <div class="modal right fade" id="editUser{{$employe->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Modifier Employe</h4>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                          <!-- <span aria-hidden="true">&times;</span> -->
                                        </button>
                                        {{$employe->id}}
                                      </div>
                                      <div class="modal-body">
                                      <form action="{{route('users.update',$employe->id)}}" method="post">
                                      {{ csrf_field() }}
                                      <!-- @method('put') -->
                                      <div class="form-group">
                                          <label for="name" >Nom *</label>
                                          <input type="text" class="form-control" id="name" name="name" value="{{$employe->name}}" required autocomplete="name" autofocus placeholder="Nom de l'enregistré">
                                      </div>
                                      <div class="form-group">
                                            <label for="prenom" class="">Prénom *</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $employe->prenom}}" required autocomplete="prenom" autofocus placeholder="Prenom de l'enregisté">
                                      </div>
                                      <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{$employe->email}}" name="email" require>
                                      </div>
                                      <div class="form-group">
                                            <label for="fonction" class="">Fonction *</label>
                                            <input type="text" id="fonction" class="form-control" name="fonction" list="fon" required pattern="[Ee]mployé" value="employé">
                                              <datalist id="fon">
                                                <option>employé</option>
                                              </datalist>
                                      </div>
                                      <div class="form-group">
                                          <label for="pharmacie_nom" class="">Inscrire dans la pharmacie? *</label>
                                          <select class="form-control" name="pharmacie_nom" id="pharmacie_nom" >                          
                                              <!-- <option selected disabled value="">Choisir...</option> -->
                                              <option>{{$pharmacie->name}}</option>                           
                                            </select>
                                      </div>
                                        <div class="form-group">
                                            <label for="dateNaiss" class="">Date de Naissance</label>
                                            <input type="date" class="form-control" id="dateNaiss" name="dateNaiss"  autocomplete="dateNaiss" autofocus value="{{$employe->dateNaiss}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="pays" class="">Pays *</label>
                                            <input type="text" class="form-control" id="pays" name="pays" value="{{$employe->pays}}" required autocomplete="pays">
                                        </div>
                                        <div class="form-group">
                                            <label for="ville" class="">Ville *</label>
                                            <input type="text" class="form-control" id="ville" name="ville" value="{{$employe->ville}}" required autocomplete="ville" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="codePostal" class="">Code postal *</label>
                                            <input type="text" class="form-control" id="codePostal" name="codePostal" value="{{$employe->codePostal}}" required autocomplete="codePostal" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="numTel" class="">Téléphone</label>
                                            <input type="text" class="form-control" id="numTel" name="numTel" value="{{$employe->numTel}}" required autocomplete="numTel" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="sexe" class="">Sexe :</label>
                                            <input type="radio" id="masculin" name="sexe" value="masculin" required>
                                                        <label for="masculin">Masculin</label>
                                                        <input type="radio" id="feminin" name="sexe" value="feminin" required>
                                                        <label for="feminin">Feminin</label>
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
                                  <div class="modal right fade" id="deleteUser{{$employe->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Supprimer Employe</h4>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <form action="{{ route('suppEmploye', $employe->id) }}" method="get">
                                      {{ csrf_field() }}
                                      <p>Etes-vous sure de Supprimier L'employer {{$employe->name}} ?</p>
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
          </div>
      </div>
      <div class="col-md-3">
      <div class="card">
        <div class="card-header">Rechercher un employe </div>
        <div class="card-body">
         ..........
        </div>
      </div>
      </div>
    </div>
  </div>
</div>




<!-- Modal d'ajout d'un nouveau employer -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau employe</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ route('inscrireEmploye',$pharmacie->id) }}" method="post">
       {{ csrf_field() }}
       <div class="form-group">
          <label for="name" >Nom *</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de l'enregistré">
       </div>
       <div class="form-group">
            <label for="prenom" class="">Prénom *</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus placeholder="Prenom de l'enregisté">
       </div>
       <div class="form-group">
            <label for="fonction" class="">Fonction *</label>
            <input type="text" id="fonction" class="form-control" value="employé" name="fonction" list="fon" required pattern="[Ee]mployé">
              <datalist id="fon">
                <option>employé</option>
              </datalist>
       </div>
       <div class="form-group">
          <label for="pharmacie_nom" class="">Inscrire dans quelle pharmacie? *</label>
          <select class="form-control" name="pharmacie_nom" id="pharmacie_nom" required>                          
              <!-- <option selected disabled value="">Choisir...</option> -->
              <option>{{$pharmacie->name}}</option>                           
            </select>
       </div>
       <div class="form-group">
            <label for="numTel" class="">Téléphone</label>
            <input type="text" class="form-control" id="numTel" name="numTel" value="{{ old('numTel') }}" required autocomplete="numTel" autofocus>
         </div>
         <div class="form-group">
            <label for="sexe" class="">Sexe :</label>
            <input type="radio" id="masculin" name="sexe" value="masculin" required>
                        <label for="masculin">Masculin</label>
                        <input type="radio" id="feminin" name="sexe" value="feminin" required>
                        <label for="feminin">Feminin</label>
         </div>
       <div class="form-group">
          <label for="password" class="">Mot de passe *</label>
          <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
       </div>
       <div class="form-group">
          <label for="password_confirmation" class="">Confirmation mot de passe *</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password-confirm">
       </div>
       <div class="modal-footer">
         <button class="btn btn-primary btn-block">Inscrire Employé</button>
       </div>
       <div class="form-group">
         
       </div>
       <div class="form-group">
         
       </div>

       </form>
      </div>
    </div>
  </div>
</div>








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

@endsection