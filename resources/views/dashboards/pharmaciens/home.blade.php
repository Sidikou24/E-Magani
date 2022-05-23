
@yield('home')

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-9">
            <div class="card">
                <h4 class="card-header" style="background:#2ecc71; color:#fff "><marquee behavior="" direction="">
                @if(auth()->user()->fonction == 'pharmacien')
                    Bienvenue Pharmacien: {{ Auth::user()->name }} {{ Auth::user()->prenom }} dans la pharmacie: {{ $pharmacie->name }}
                @else
                    Bienvenue Employer: {{ Auth::user()->name }} {{ Auth::user()->prenom }} dans la pharmacie: {{Auth::user()->pharmacie_nom }}
                @endif
                </marquee></h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
