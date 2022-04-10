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