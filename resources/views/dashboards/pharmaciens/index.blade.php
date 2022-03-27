@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h4>Bienvenue Pharmacien: {{ Auth::user()->name }}</h4>
                <hr>
                <p>
                    <a href="{{ route('pharmacie.dashboard') }}" class="btn btn-success"><h3>Gerer pharmacies</h3></a>
                    <br><br>
                    <a href="{{ route('ajoutEmploye') }}" ><h3 class="btn btn-success">Gerer Employés</h3></a>
                    <br> <br>
                    <a href="{{ route('voir_produit') }}" ><h3 class="btn btn-success">Gerer stock</h3></a>
                    <br> <br>
                    <a href="#" ><h3 class="btn btn-success">Gerer ventes</h3></a>
                    <br><br>
                </p>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
