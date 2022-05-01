<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
@if(auth()->user()->fonction == 'pharmacien')
<<<<<<< HEAD
<<<<<<< HEAD
    <a href="{{ route('voir_pharmacie') }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> </i> Employer</a>
=======
    <a href="{{ route('voir_employe',$pharmacie) }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> </i> Employer</a>
>>>>>>> 902bf81bd0b5b80add160c203a7c9f69ff3e56d5
    <a href="{{ route('voir_produits',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>  Produits</a>
    <a href="{{ route('ventes',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i> Cashire</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"> </i> Reports</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"> </i> Transactions</a>
    <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
=======
    <a href="{{ route('voir_employe',$pharmacie) }}" class="btn btn-outline rounded-pill"><i class="fa fa-user"> </i>Gerer Employes</a>
    <a href="{{ route('voir_produits',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>Gerer  Produits</a>
    <a href="{{ route('ventes',$pharmacie)}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"> </i>Gerer Ventes</a>
    <a href="#" class="btn btn-outline rounded-pill" ><i class="fa fa-file"> </i> Raports</a>
    <!-- <a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-chart"> </i> Suppliers</a>
>>>>>>> pharmacie
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