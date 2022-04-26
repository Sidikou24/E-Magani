<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.admins.layouts.admin-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
<h3><strong><em>Les pharmaciens:</em></strong></h3>
<form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{ route('recherchePharmacien')}}">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher pharmacien" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form><br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Mail</th>
      <th scope="col">Fonction</th>
      <th scope="col">Reférence</th>
      <th scope="col">Sexe</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($pharmaciens as $pharmacien)
      <tr>
      <th scope="row">{{ $pharmacien->id }}</th>
      <td>{{ $pharmacien->name }}</td>
      <td>{{ $pharmacien->prenom }}</td>
      <td>{{ $pharmacien->email }}</td>
      <td>{{ $pharmacien->fonction }}</td>
      <td>{{ $pharmacien->num_reference }}</td>
      <td>{{ $pharmacien->sexe }}</td>
      <td>
        @if ($pharmacien->statut == 0)
        <a href="{{route('search_pharmacien', ['id' => $pharmacien->id, 'status_code' => 1]) }}" class="btn btn-success"><i class="fa fa-unlock"></i>  </a>
        @else
        <a href="{{route('search_pharmacien',['id' => $pharmacien->id, 'status_code' => 0]) }}" class="btn btn-danger"><i class="fa fa-lock"></i></a> 
        @endif
        </td>
    </tr>
      @endforeach
  </tbody>   
</table>
</div>

@endsection
