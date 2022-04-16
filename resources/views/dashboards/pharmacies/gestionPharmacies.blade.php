<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')
<h4>Bienvenue Pharmacien: {{ Auth::user()->name }}</h4>
<div class="container">
<h3>Les pharmacies:</h3>
<!-- <form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{ route('recherchePharmacie')}}">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher pharmacie" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form><br><br> -->

<div class="row my-2 my-lg-0 float-right mb-4">
  <div class="col-md-12 text-right ">
  <input class="form-control mr-sm-2 " type="text" name="recherche" placeholder="Rechercher pharmacie" aria-label="Search" >
  </div>
</div><br><br>

<a class="btn btn-success float-right mb-4" href="{{ route('pharmacie.dashboard') }}">Ajouter Nouveau pharmacie</a>
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
        <a href="{{ route('modifierpharmacie',$pharmacie->id) }}" class="btn btn-success"> Modifier </a>
        <a href="{{ route('suppPharmacie', $pharmacie->id) }}" class="btn btn-danger"> Supprimer </a>
      </td>
    </tr>
      @endforeach
  </tbody>   
</table>
</div>

@endsection