@extends('dashboards.admins.layouts.admin-dash-layout')

@section('title','Dasboard')

@section('content')

    <a href="{{ route('search_pharmacien') }}" class="btn btn-success"><h3>Gerer Pharmaciens</h3></a>

@endsection
