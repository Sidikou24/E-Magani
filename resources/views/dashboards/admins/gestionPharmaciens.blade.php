<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('dashboards.admins.layouts.admin-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
<h3>Les pharmaciens:</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Mail</th>
      <th scope="col">Fonction</th>
      <th scope="col">Numéro de reférence</th>
      <th scope="col">Sexe</th>
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
    </tr>
      @endforeach
  </tbody>   
</table>
</div>

@endsection
