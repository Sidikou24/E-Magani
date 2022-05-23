
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@extends('layouts.app')

@section('title','Dasboard')

@section('content') 
<div class="container-fluid">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-md-9">
          <div class="card">
          <h4 class="card-header" style="background:#2ecc71; color:#fff "><marquee behavior="" direction="">Bienvenue Pharmacien: {{ Auth::user()->name }} {{ Auth::user()->prenom }} dans la Gestion des Produit de la Pharmacie: {{ $pharmacie->name }}</marquee></h4><br>
            <div class="card-header">
              <h4 style="float: left"> Ajouter Nouveau Produits</h4>
              <a href="#" style="float: right" class="btn btn-dark" 
              data-toggle="modal" data-target="#addProduit">
              <i class="fa fa-plus"></i> Ajouter Nouveau Produits</a> 
            </div>
              @if(Session::get('success'))
                  <div class="alert alert-success">
                    {{Session::get('success')}}
                  </div>
                @endif
              @if(Session::get('error'))
                  <div class="alert alert-danger">
                    {{Session::get('error')}}
                  </div>
                @endif
            <div class="card-body">
              <table class="table table-bordered table-left">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">quantité</th>
                      <th scope="col">prix Unitaire</th>
                      <th scope="col">Numéro de lot</th>
                      <th scope="col">Date de peremption</th>
                      <th scope="col">Alert_Stock</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    @foreach ($produits as $key => $produit)
                                <tr>
                                    <th scope="row">{{ $key +1 }}</th>
                                    <td>{{ $produit->name }}</td>
                                    <td>{{ $produit->quantite }}</td>
                                    <td>{{ number_format($produit->prix,2) }}</td>
                                    <td>{{ $produit->num_lot }}</td>
                                    <td>{{ $produit->datePer }}</td>
                                    <td>@if($produit->alert_stock >= $produit->quantite)
                                          <span class="badge badge-danger">low Stock > {{$produit->alert_stock }}</span>
                                        @else 
                                          <span class="badge badge-success">{{ $produit->alert_stock }}</span>
                                      @endif
                                  </td>
                                  <td>
                                    <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#editProduit{{$produit->id}}" class="btn btn-info btnt-sm"><i class="fa fa-edit"></i> Modifier </a>
                                      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProduit{{$produit->id}}"><i class="fa fa-trash"></i> Retirer </a>
                                    </div>
                                  </td>
                                </tr>



                                                              <!-- Modal de modification d'un Produits -->
                                    <div class="modal right fade" id="editProduit{{$produit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Modifier produits</h4>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                              <!-- <span aria-hidden="true">&times;</span> -->
                                            </button>
                                            {{$produit->id}}
                                          </div>
                                          <div class="modal-body">
                                                <form action="{{ route('majProduit',$produit->id) }}" method="get">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="name" class="">Nom: </label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$produit->name }}" required autocomplete="name" autofocus placeholder="Nom du produit">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="num_lot" class="">Numéro de lot: </label>
                                                        <input type="text" class="form-control" id="num_lot" name="num_lot" value="{{ $produit->num_lot }}" required autocomplete="num_lot" autofocus placeholder="Numéro de lot">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="quantite" class="">Quantité</label>
                                                        <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $produit->quantite }}" required autocomplete="quantite" placeholder="quantite">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="prix" class="">Prix: </label>
                                                        <input type="number" class="form-control" id="prix" name="prix" value="{{ $produit->prix }}" placeholder="prix du produit">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="dateFab" class="">Date de Fabrication: </label>
                                                        <input type="date" class="form-control" id="dateFab" name="dateFab" value="{{ $produit->dateFab }}" required autocomplete="dateFab" autofocus>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="datePer" class="">Date de Péremption: </label>
                                                        <input type="date" class="form-control " id="datePer" name="datePer" value="{{ $produit->datePer }}" required autocomplete="datePer" autofocus>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="alert_stock" class="">Alert_Stock: </label>
                                                        <input type="number" class="form-control" id="alert_stock" name="alert_stock" value="{{ $produit->alert_stock }}" placeholder="alert_stock du produit">
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Modifier produit</button>
                                                      </div>
                                              </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                    
                                                                <!-- Modal de suppression d'un employer -->
                                      <div class="modal right fade" id="deleteProduit{{$produit->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Supprimer Produit</h4>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          <form action="{{ route('suppProduit', $produit->id) }}" method="get">
                                          {{ csrf_field() }}
                                          <p>Etes-vous sure de Supprimier Le produit? {{$produit->name}} ?</p>
                                          <div class="modal-footer">
                                            <!-- <button class="btn btn-info" data-dismiss="modal ">Annuler</button> -->
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
          <div class="card-header">Rechercher un produit </div>
              <div class="card-body">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-8 col-12">
                        <div class="form-group form-focus">
                          <label for="focus-label">Entrer Nom </label>
                          <input type="text" name="name" value="" class="form-control floating" id="myInput">
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>




<!-- Modal d'ajout d'un nouveau produits -->
<div class="modal right fade" id="addProduit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Ajouter Nouveau produits</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ route('ajouterProduits',$pharmacie->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="">Nom: </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom du produit">
              </div>
              <div class="form-group">
                <label for="num_lot" class="">Numéro de lot: </label>
                <input type="text" class="form-control" id="num_lot" name="num_lot" value="{{ old('num_lot') }}" required autocomplete="num_lot" autofocus placeholder="Numéro de lot">
              </div>
              <div class="form-group">
                <label for="quantite" class="">Quantité</label>
                <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite') }}" required autocomplete="quantite" placeholder="quantite">
              </div>
              <div class="form-group">
                <label for="prix" class="">Prix: </label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix') }}" placeholder="prix du produit" required>
              </div>
              <div class="form-group">
                <label for="dateFab" class="">Date de Fabrication: </label>
                <input type="date" class="form-control" id="dateFab" name="dateFab" value="{{ old('dateFab') }}" required autocomplete="dateFab" autofocus>
              </div>
              <div class="form-group">
                <label for="datePer" class="">Date de Péremption: </label>
                <input type="date" class="form-control " id="datePer" name="datePer" value="{{ old('datePer') }}" required autocomplete="datePer" autofocus>
              </div>
              <div class="form-group">
                <label for="alert_stock" class="">Alert_Stock: </label>
                <input type="number" class="form-control" id="alert_stock" name="alert_stock" value="{{ old('alert_stock') }}" placeholder="alert_stock du produit" required>
              </div>
              <div class="modal-footer">
              <button class="btn btn-success btn-block">Ajouter Produits</button>
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


@section('script')
<script>
  // $(document).ready(function () {
  //   alert(1);
  // })
  $(document).ready(function(){
    $('#myInput').on('keyup',function () {
      var value=$(this).val().toLowerCase();
      $('#myTable tr').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
@endsection