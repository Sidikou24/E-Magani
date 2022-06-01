@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Profile')

@section('content')

<div class="container">
<h3><strong><em>Les employes:</em></strong></h3>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                          <label for="focus-label">Entrer Nom </label>
                          <input type="text" name="name" value="" class="form-control floating" id="myInput">
                        </div>
                    </div>
                  </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Mail</th>
      <th scope="col">Fonction</th>
      <th scope="col">Pharmacie</th>
      <th scope="col">Sexe</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="myTable">
      @foreach ($employes as $key => $pharmacien)
      <tr>
      <th scope="row">{{ $pharmacien->id }}</th>
      <td>{{ $pharmacien->name }}</td>
      <td>{{ $pharmacien->prenom }}</td>
      <td>{{ $pharmacien->email }}</td>
      <td>{{ $pharmacien->fonction }}</td>
      <td>{{ $pharmacien->pharmacie_nom }}</td>
      <td>{{ $pharmacien->sexe }}</td>
      <td>
        @if ($pharmacien->statut == 0)
        <a href="{{route('search_employer', ['id' => $pharmacien->id, 'status_code' => 1]) }}" class="btn btn-success"><i class="fa fa-unlock"></i>  </a>
        @else
        <a href="{{route('search_employer',['id' => $pharmacien->id, 'status_code' => 0]) }}" class="btn btn-warning"><i class="fa fa-lock"></i></a> 
        @endif
        <a  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $pharmacien->id }}"><i class="fa fa-trash" ></i></a>
      </td>
    </tr>
      @endforeach
  </tbody>   
</table>
</div>

<!-- Modal de suppression d'un pharmacienr -->
<div class="modal right fade" id="delete{{ $pharmacien->id }}"
  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="staticBackdropLabel">Supprimer pharmacien
              </h4>
              <button type="button" class="btn-close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{route('suppPharmacien',$pharmacien->id)}}" method="get">
                  {{ csrf_field() }}
                  <p>Etes-vous sure de Supprimer le pharmacien {{ $pharmacien->name }} ?
                  </p>
                  <div class="modal-footer">
                      <button class="btn btn-info"
                          data-dismiss="modal ">Annuler</button>
                      <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i></button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection
