<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
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
</table>
</div>

@endsection