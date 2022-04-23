<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
@if(auth()->user()->fonction == 'pharmacien')
    <a href="{{ route('voir_employe',$pharmacie) }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> </i> Employer</a>
    <a href="{{ route('voir_produits',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>  Produits</a>
    <a href="{{ route('ventes',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i> Cashire</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"> </i> Reports</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"> </i> Customers</a>
    <a href="" class="btn btn-outline rounded-pill"><i class="fa fa-th"></i> </a>
    <a href="" class="btn btn-outline rounded-pill"><i class="fa fa-bars"></i></a>
@else 
    <a href="{{ route('vente')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i> Cashire</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"> </i> Reports</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"> </i> Transactions</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"> </i> Customers</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Incoming</a>
@endif
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