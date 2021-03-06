@extends('layouts.app')

@section('title','Dasboard')

@section('content') 
<div class="container-fluid">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-md-8">
          <div class="card">
          <h4 class="card-header" style="background:#2ecc71; color:#fff "><marquee behavior="" direction="">Bienvenue Pharmacien: {{ Auth::user()->name }} dans la La Gestions des Ventes de la Pharmacie: {{ $pharmacie->name }}</marquee></h4><br>
            <div class="card-header">
                <h4 style="float: left"> Faire Une Vente</h4>
                <a href="#" style="float: right" class="btn btn-dark" 
                data-toggle="modal" data-target="#addProduit">
                <i class="fa fa-plus"></i> Faire Une Vente</a> 
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
                   
              <form action="{{ route('orders.store',$pharmacie->id)}}" method="post">
                 {{ csrf_field() }}
                    <div class="card-body">
                       <div class="my-2">
                         <form wire:submit.prevent="InsertoCart">
                            <input type="text" id="" wire:model="produit_numRef" class="form-control" placeholder="entrer le numero de reference">
                          </form>
                        </div> 
                      <table class="table table-bordered table-left">
                          <thead>
                            <tr>
                            <th scope="col">Nombre de produits</th>
                              <th scope="col">Nom Du Produit</th>
                              <th scope="col">quantité</th>
                              <th scope="col">Numéro de lot:</th>
                              <th scope="col">prix Unitaire</th>
                              <th scope="col">Dis (%)</th>
                              <th scope="col">Total</th>
                              <th scope="col"><a href="#" class="btn btn-sm btn-success add_more rounded-circle" id="add_more"><i class="fa fa-plus"></i></a></th>
                            </tr>
                          </thead>
                          <tbody class="addMoreProduct">
                          <tr>
                              <td>1</td>
                              <td>
                                  <select name="produit_id[]" id="produit_id" class="form-control produit_id">
                                    <option value="">Selectionner Produit</option>
                                        @foreach ($produits as $produit)
                                        <option data-prix="{{$produit->prix}}" data-lot="{{$produit->num_lot}}" data-name="{{$produit->name}}" value="{{$produit->id}}">{{$produit->name}}</option>
                                        @endforeach
                                  </select>
                              </td>
                              <td>
                                  <input type="number" name="quantite[]" id="quantite" 
                                  class="form-control quantite">
                                  <input type="text" name="name[]" id="name" class="form-control name" style="opacity:0;height:1px;dispaly:none;">
                              </td>
                              <td>
                                  <input type="text" name="num_lot[]" id="num_lot" 
                                  class="form-control num_lot">
                              </td>
                              <td>
                                  <input type="number" name="prix[]" id="prix" 
                                  class="form-control prix">
                              </td>
                              <td>
                                  <input type="number" name="discount[]" id="discount" 
                                  class="form-control discount">
                              </td>
                              <td>
                                  <input type="number" name="total_amount[]" id="total_amount" 
                                  class="form-control total_amount">
                              </td>
                              <td scope="col"><a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">Total <b class="total">0.00</b> </div>
                      <div class="card-body">
                        <div class="btn-group">
                          <button type="button" 
                              onclick="PrintReceiptContent('print')" 
                              class="btn btn-dark"><i class="fa fa-print"></i> Print
                          </button>
                          <button type="button" 
                              onclick="PrintReceiptContent('print')" 
                              class="btn btn-primary"><i class="fa fa-print"></i> Historique
                          </button>
                          <button type="button" 
                              onclick="PrintReceiptContent('print')" 
                              class="btn btn-danger"><i class="fa fa-print"></i> Rapport
                          </button>
                        </div>
                        <div class="panel">
                          <div class="row">
                            <table class="table table-striped">
                              <tr>
                                <td>
                                  <label for="">Nom Du client</label>
                                  <input type="text" name="customer_name" value="" class="form-control">
                                </td>
                                <td>
                                  <label for="">Numero Du client</label>
                                  <input type="number" name="customer_phone" value="" class="form-control">
                                </td>
                              </tr>
                            </table>
                            <td> Methode De Payement <br>

                                <div class="form-group">
                                    <span class="radio-item">
                                      <input type="radio" name="payment_method" id="payment_method"
                                      class="true" value="cash" checked="checked">
                                      <label for="payment_method"><i class="fa fa-money-bill text-success"></i> Cash</label>
                                    </span>
                                    <span class="radio-item">
                                      <input type="radio" name="payment_method" id="payment_method"
                                      class="true" value="bank transfert" >
                                      <label for="payment_method"><i class="fa fa-university text-danger"></i> Bank Transfert</label>
                                    </span>
                                    <span class="radio-item">
                                      <input type="radio" name="payment_method" id="payment_method"
                                      class="true" value="credit Card" >
                                      <label for="payment_method"><i class="fa fa-credit-card text-info"></i>Credit Card</label>
                                    </span>
                                </div>
                            </td> <br>
                            <td> 
                              Payement
                              <input type="number" name="paid_amount" id="paid_amount" value="" class="form-control">
                            </td> 
                            <td> 
                              Monnaie a rendre
                              <input type="number" readonly name="balance" id="balance" value="" class="form-control">
                            </td> 
                            <td>
                                <button class="btn-primary btn-lg btn-block mt-3"> Sauvegarder</button>
                            </td>
                            <td>
                                <button class="btn-danger btn-lg btn-block mt-2"> Calculer</button>
                            </td>
                            <div class="text-center" style="text-align: center !important">
                                <a href="#" class="text-danger" ><i class="fa fa-sign-out-alt"> </i> logout</a>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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
                <input type="number" class="form-control" id="alert_stock" name="alert_stock" value="{{ old('alert_stock') }}" placeholder="alert_stock du produit">
              </div>
              <div class="modal-footer">
              <button class="btn btn-primary btn-block">Inscrire Produits</button>
            </div>
       </form>
      </div>
    </div>
  </div>
</div>



<div class="modal">
    <div id="print">
      @include('dashboards.reports.recu')
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

  .radio-item input[type="radio"]{
    visibility: hidden;
    width: 20px;
    height: 20px;
    margin : 0 5px 0 5px;
    padding: 0;
    cursor: pointer;
  }
  /* Avant style */
  .radio-item input[type="radio"]:before{
    position: relative;
    display: inline-block;
    margin : 4px -25px -4px 0s;
    visibility: visible;
    width: 20px;
    height: 20px;
    border-radius: 10px;
    border: 2px inset rgb(150, 150, 150 0.75);
    background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
    rgb(250, 250, 250) 5%,  rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
    content: '';
    cursor: pointer;
  }

  /* Apres styles */
  .radio-item input[type="radio"]:checked:after{
    position: relative;
    top: -28px;
    left: 4px;
    display: inline-block;
    border-radius: 6px;
    visibility: visible;
    width: 12px;
    height: 12px;
    background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%,
    rgb(225, 250, 100) 5%,  rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
    content: '';
    cursor: pointer;
  }

  /* Apres click */
  .radio-item input[type="radio"].true:checked:after{
    background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%,
    rgb(225, 250, 100) 5%,  rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
  }

  .radio-item input[type="radio"].false:checked:after{
    background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
    rgb(250, 250, 250) 5%,  rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
  }

  .radio-item label{
    display: inline-block;
    margin: 0;
    padding: 0;
    line-height: 25px;
    height: 25px;
    cursor: pointer; 
  }


</style>

@endsection

@section('script')

    <script>
        // $(document).ready(function(){
        //     alert(1);
        // })
            $('.add_more').on('click',function() {
               var produit = $('.produit_id').html();
               var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
               var tr = '<tr><td class"no">' + numberofrow + '</td>' +
                        '<td> <select class="form-control produit_id" name="produit_id[]">'+ produit + 
                        '</select> </td>' +
                        '<td> <input type="number" name="quantite[]" id="quantite" class="form-control quantite"> '+
                        '<input type="text" name="name[]" id="name" class="form-control name" style="opacity:0;height:1px;dispaly:none;"></td>' +
                        '<td><input type="text" name="num_lot[]" id="num_lot" class="form-control num_lot"></td>'+
                        '<td> <input type="number" name="prix[]" id="prix" class="form-control prix"> </td>' +
                        '<td> <input type="number" name="discount[]" id="discount" class="form-control discount"> </td>' +
                        '<td> <input type="number" name="total_amount[]" class="form-control total_amount"> </td>' +
                        '<td scope="col"><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a>';
                        $('.addMoreProduct').append(tr);
            });
            $('.addMoreProduct').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
            })

            function TotalAmount() {
                var total= 0;
                $('.total_amount').each(function (i, e) {
                  var amount = $(this).val() - 0;
                  total += amount;
                });
                $('.total').html(total);
            }


            $('.addMoreProduct').delegate('.produit_id', 'change', function () {
                var tr = $(this).parent().parent();
                var td = $(this).parent().parent();
                var prix = tr.find('.produit_id option:selected').attr('data-prix');
                var lot = td.find('.produit_id option:selected').attr('data-lot');
                var nom = td.find('.produit_id option:selected').attr('data-name');
                td.find('.name').val(nom);
                td.find('.num_lot').val(lot);
                tr.find('.prix').val(prix);
                var qty = tr.find('.quantite').val() - 0;
                // var lot = tr.find('.num_lot').val() ;
                var disc = tr.find('.discount').val() - 0;
                var prix = tr.find('.prix').val() - 0;
                var total_amount = (qty * prix) - ((qty * prix * disc) / 100);
                tr.find('.total_amount').val(total_amount);
                TotalAmount();
            });
            $('.addMoreProduct').delegate('.quantite, .discount', 'keyup', function () {
              var tr = $(this).parent().parent();
              var qty = tr.find('.quantite').val() - 0;
              var disc = tr.find('.discount').val() - 0;
              var prix = tr.find('.prix').val() - 0;
              var total_amount = (qty * prix) - ((qty * prix * disc) / 100);
              tr.find('.total_amount').val(total_amount);
              TotalAmount();
            }) ;
            $('#paid_amount').keyup(function () {
              var total = $('.total').html();
              var paid_amount = $(this).val();
              var tot = paid_amount - total;
              $('#balance').val(tot).toFixed(2);
            });

            // Section d'affichage
            function PrintReceiptContent(el) {
              var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width:100%; border: none; background-color: #2ecc71; color: #fff ;padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Print Receipt" onClick="window.print()"  >';
                  data += document.getElementById(el).innerHTML;
                  myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
                  myReceipt.screnX = 0;
                  myReceipt.screnY= 0;
                  myReceipt.document.write(data);
                  myReceipt.document.title= "Print Receipt";
                  myReceipt.focus();
                  setTimeout(() => {
                    myReceipt.close();
                  }, 10000);
            }
    </script>
@endsection

