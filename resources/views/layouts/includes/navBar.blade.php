<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
@if(auth()->user()->fonction == 'pharmacien')
    <a href="{{ route('voir_employe',$pharmacie) }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> </i>Gerer Employes</a>
    <a href="{{ route('voir_produits',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>Gerer  Produits</a>
    <a href="{{ route('ventes',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i>Gerer Ventes</a>
    <a href="#" class="btn btn-outline rounded-pill" data-toggle="modal" data-target="#historique"><i class="fa fa-file"> </i> Raports</a>
    <!-- <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"> </i> Customers</a>
    <a href="" class="btn btn-outline rounded-pill"><i class="fa fa-th"></i> </a>
    <a href="" class="btn btn-outline rounded-pill"><i class="fa fa-bars"></i></a> -->
@else 
    <a href="{{ route('vente')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i>Gerer Ventes</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"> </i> Raports</a>
    <!-- <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"> </i> Transactions</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"> </i> Customers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Incoming</a> -->
@endif
<!-- Recette Jour -->
<div class="modal">
    <div id="jour">
      @include('dashboards.reports.jour')
    </div>
</div>

<!-- Recette Semaine -->
<div class="modal">
    <div id="semaine">
      @include('dashboards.reports.semaine')
    </div>
</div>

<!-- Recette Mois -->
<div class="modal">
    <div id="mois">
      @include('dashboards.reports.mois')
    </div>
</div>

<!-- Recette Annee -->
<div class="modal">
    <div id="annee">
      @include('dashboards.reports.annee')
    </div>
</div>
<style>
    .btn-outline{
        border-color:#2ecc71;
        color: #2ecc71;
    }

    .btn-outline:hover{
        background:#2ecc71;
        color: #fff;
    }
</style>

@section('script')
    <script>
       // Jour
       function PrintReceiptJour(el) {
              var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width:100%; border: none; background-color: #2ecc71; color: #fff ;padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Recettes Journaliere" onClick="window.jour()"  >';
                  data += document.getElementById(el).innerHTML;
                  myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
                  myReceipt.screnX = 0;
                  myReceipt.screnY= 0;
                  myReceipt.document.write(data);
                  myReceipt.document.title= "Recettes Journaliere";
                  myReceipt.focus();
            }

          // Semaine
          function PrintReceiptSemaine(el) {
              var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width:100%; border: none; background-color: #2ecc71; color: #fff ;padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Recettes Hebdomadere" onClick="window.semaine()"  >';
                  data += document.getElementById(el).innerHTML;
                  myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
                  myReceipt.screnX = 0;
                  myReceipt.screnY= 0;
                  myReceipt.document.write(data);
                  myReceipt.document.title= "Recettes Hebdomadere";
                  myReceipt.focus();
            }

            // Mois
            function PrintReceiptMois(el) {
              var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width:100%; border: none; background-color: #2ecc71; color: #fff ;padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Recettes Mensuelle" onClick="window.mois()"  >';
                  data += document.getElementById(el).innerHTML;
                  myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
                  myReceipt.screnX = 0;
                  myReceipt.screnY= 0;
                  myReceipt.document.write(data);
                  myReceipt.document.title= "Recettes Mensuelle";
                  myReceipt.focus();
            }
            
            // Annee
            function PrintReceiptAnnee(el) {
              var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width:100%; border: none; background-color: #2ecc71; color: #fff ;padding: 14px 28px; font-size: 16px; cursor: pointer; text-align: center;" value="Recettes Annuelle" onClick="window.annee()"  >';
                  data += document.getElementById(el).innerHTML;
                  myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
                  myReceipt.screnX = 0;
                  myReceipt.screnY= 0;
                  myReceipt.document.write(data);
                  myReceipt.document.title= "Recettes Annuelle";
                  myReceipt.focus();
            }
    </script>
@endsection


<style>
    .btn-outline{
        border-color:#2ecc71;
        color: #2ecc71;
    }

    .btn-outline:hover{
        background:#2ecc71;
        color: #fff;
    }
</style>