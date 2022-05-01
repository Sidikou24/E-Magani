@extends('dashboards.admins.layouts.admin-dash-layout')

@section('title', 'Dasboard')

@section('content')

    <div class="container">
        <h3><strong><em>Les pharmaciens:</em></strong></h3>
        <form class="form-inline my-2 my-lg-0 float-right mb-4" type="get" action="{{ route('recherchePharmacien') }}">
            <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Rechercher pharmacien"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form><br><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Reférence</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pharmaciens as $pharmacien)
                    <tr>
                        <th scope="row">{{ $pharmacien->id }}</th>
                        <td>{{ $pharmacien->name }}</td>
                        <td>{{ $pharmacien->prenom }}</td>
                        <td>{{ $pharmacien->email }}</td>
                        <td>{{ $pharmacien->fonction }}</td>
                        <td>{{ $pharmacien->num_reference }}</td>
                        <td>{{ $pharmacien->sexe }}</td>
                        <td>
                            @if ($pharmacien->statut == 0)
                                <a href="{{ route('search_pharmacien', ['id' => $pharmacien->id, 'status_code' => 1]) }}"
                                    class="btn btn-success"><i class="fa fa-unlock"></i> </a>
                            @else
                                <a href="{{ route('search_pharmacien', ['id' => $pharmacien->id, 'status_code' => 0]) }}"
                                    class="btn btn-warning"><i class="fa fa-lock"></i></a>
                            @endif
                            <a class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#delete{{ $pharmacien->id }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de suppression d'un pharmacienr -->
    <div class="modal right fade" id="delete{{ $pharmacien->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Supprimer pharmacien
                    </h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('suppPharmacien', $pharmacien->id) }}" method="get">
                        {{ csrf_field() }}
                        <p>Voulez vous vraiment supprimer le pharmacien {{ $pharmacien->name }} ?
                        </p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
