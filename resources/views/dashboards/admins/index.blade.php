@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h4>Bienvenue Administrateur: {{ Auth::user()->name }}</h4>
                <hr>
                <p>
                    <a href="#"><h3>Gerer pharmacien</h3></a>
                    <br> <br>
                    <a href="#"><h3>Gerer paharmacie</h3></a>
                    <br> <br>
                    <a href="profile"><h3>Mon profil</h3></a>
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
