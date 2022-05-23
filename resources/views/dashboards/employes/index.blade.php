@extends('dashboards.employes.layouts.employe-dash-layout')

@section('title','Dasboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h4>Bienvenue cher Employé: {{ Auth::user()->name }} {{ Auth::user()->prenom }}</h4>
                <hr>
                <p>
                    <a href="#"><h3>Gerer ventes</h3></a><br><br>
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
