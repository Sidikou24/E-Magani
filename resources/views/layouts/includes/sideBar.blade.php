<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
    @if(auth()->user()->fonction == 'pharmacien')
        <li class="active">
            <a href="{{route('voir_pharmacie')}}"><i class="fa fa-home fa-lg"></i> Home </a>
        </li>
        <li>
            <a href="{{ route('voir_employe',$pharmacie) }}"><i class="fa fa-user"></i>Gerer Employer</a>
        </li>
        <li>
            <a href="{{ route('ventes',$pharmacie)}}"><i class="fa fa-box fa-lg"></i>Gerer Ventes</a>
        </li>
        <li>
            <a href="{{ route('voir_produits',$pharmacie)}}"><i class="fa fa-truck fa-lg"></i>Gerer Produits</a>
        </li>
    @else
        <li class="active">
            <a href="employe.profile"><i class="fa fa-home fa-lg"></i> Home </a>
        </li>

        <li>
            <a href="{{ route('vente')}}"><i class="fa fa-box fa-lg"></i>Gerer Ventes</a>
        </li>
    @endif


    </ul>
</nav>



<style>
    #sidebar ul.lead{
        border-bottom: 1px solid #2ecc71;
        width: fit-content;
    }

    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #2ecc71;
    }

    #sidebar ul li a:hover{
        color: #fff;
        background: #2ecc71;
        text-decoration: none !important;
    }

    #sidebar ul li a i{
        margin-right: 15px;
    }
    #sidebar ul li.active>a,
    a[aria-expanded="true"]{
        color: #fff;
        background: #2ecc71;
    }

</style> 