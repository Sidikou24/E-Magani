@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h4>Bienvenue Pharmacien: {{ Auth::user()->name }} </h4>
                <h4>dans la pharmacie: {{ $pharmacie->name }}</h4>
                <hr>
                <div>
                
                    <a href="{{ route('voir_employe',$pharmacie) }}"  class="btn btn-success"> Gerer Employés</a>
                    <br> <br>
                    <a href="{{ route('voir_produit',$pharmacie) }}"  class="btn btn-success">Gerer stock</a>
                    <br> <br>
                    <a href="#"  class="btn btn-success">Gerer ventes</a>
                    <br><br>
                </div>

                <br><br><br><br>
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