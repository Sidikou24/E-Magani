<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')
<h4 class="card-header" style="background:white; color:black "><marquee behavior="" direction=""><strong>Bienvenue Pharmacien: {{ Auth::user()->name }} {{ Auth::user()->prenom }} ici votre tableau de bord </strong></marquee></h4><br>
<div class="container">
<h3><strong>Listes de vos pharmacies inscrites:</strong> </h3>
<!-- <form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{ route('recherchePharmacie')}}">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher pharmacie" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form><br><br> -->

<div class="row my-2 my-lg-0 float-right mb-4">
  <div class="col-md-12 text-right ">
  <input class="form-control mr-sm-2 " type="text" name="recherche" placeholder="Rechercher pharmacie" aria-label="Search" >
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