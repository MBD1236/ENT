@extends('backoffice.home')

@section('title', 'Liste de tous les étudiants réinscrit')
@section('content')

<h3 class="page-title py-3 text-primary fw-bold text-center">@yield('title')</h3>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div class="card mb-0 py-3">
    <div class="card-body d-flex justify-content-between">
        <div>
            <a href="{{ route('admin.inscription.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                <span>Inscription / Reinscription</span>
            </a>
        </div>
        <div>
            <form>
                <div class="input-group"> 
                    <input  name="searchEtudiant" type="search" class="form-control" placeholder="Rechercher" value="{{ $lastvalue }}">
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>INE</th>
                        <th>Departement</th>
                        <th>Programme</th>
                        <th>Promotion</th>
                        <th>Niveau</th>
                        <th>Année Universitaire</th>
                        <th>Photo</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                    @forelse ($inscriptions as $k => $inscription)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $inscription->etudiant->ine}}</td>
                        <td>{{ $inscription->etudiant->prenom}} {{ $inscription->etudiant->nom}}</td>
                        <td>{{ $inscription->programme->programme}}</td>
                        <td>{{ $inscription->promotion->promotion}}</td>
                        <td>{{ $inscription->niveau->niveau}}</td>
                        <td>{{ $inscription->annee_universitaire->annee_universitaire}}</td>
                        <td><img width="20px" height="20px" src="{{asset('storage/'.$inscription->etudiant->photo) }}" alt=""></td>
                        <td class="d-flex gap-2 justify-content-end w-100">
                            <a href="{{ route('admin.inscription.edit', $inscription) }}" class="btn btn-primary py-0 px-1 fs-6"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.inscription.destroy', $inscription)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger py-0 px-1 fs-6"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-info">Aucune donnée ne correspond à cette recherche !</div>
                    @endforelse
                </tbody>
            </table>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
    <div class="card-footer mt-1">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="pagination-rounded">
                    {{$inscriptions->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection