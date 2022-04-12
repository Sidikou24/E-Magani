<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('welcome')

@section('contenu')

<table class="table">
      <thead class="thead-dark">
        <tr>
          
          <th scope="col">Produit </th>
          <th scope="col">Disponible </th>
        </tr>
      </thead>
      <tbody>
          @foreach ($produits as $produit)
          <tr>
          <td>{{ $produit->name }}</td>
          <td>pharmacie {{ $produit->pharmacie_nom }}</td>
          </tr>
          @endforeach
      </tbody>   
    </table>

@endsection
