<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
<h3>Les produits:</h3>
<form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{ route('rechercheProduit',$pharmacie->id)}}">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher un produit" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form><br><br>
<a class="btn btn-success float-right mb-4" href="{{ route('produit.dashboard',$pharmacie->id) }}">Ajouter Nouveau produit</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">quantité</th>
      <th scope="col">prix Unitaire</th>
      <th scope="col">Numéro de lot</th>
      <th scope="col">Date de peremption</th>
      <th scope="col">Lieu</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($produits as $produit)
      <tr>
      <th scope="row">{{ $produit->id }}</th>
      <td>{{ $produit->name }}</td>
      <td>{{ $produit->quantite }}</td>
      <td>{{ $produit->prix }}</td>
      <td>{{ $produit->num_lot }}</td>
      <td>{{ $produit->datePer }}</td>
      <td>Pharmacie {{ $produit->pharmacie_nom }}</td>
      <td>
        <a href="{{ route('modifierProduit',$produit->id) }}" class="btn btn-success"> Modifier </a>
        <a href="{{ route('suppProduit', $produit->id) }}" class="btn btn-danger"> Supprimer </a>
      </td>
    </tr>
      @endforeach
  </tbody>   
</table>
</div>

@endsection