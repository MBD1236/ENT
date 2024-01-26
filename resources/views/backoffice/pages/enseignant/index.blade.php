@extends('backoffice.home')

@section('title', 'Liste des enseignants')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="d-flex flex-row justify-content-between mt-3">
    <div class="pagetitle">
        <h1>@yield('title')</h1>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body py-2 px-2">
        <div class="d-flex flex-row justify-content-end mb-2">
            <div class="pt-2">
                <a href="{{ route('admin.enseignant.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    <span>Ajouter</span>
                </a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Departement</th>
                        <th>Photo</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $enseignants as $k => $enseignant )
                    <tr>
                        <th>{{ $k+1 }}</th>
                        <td>{{ $enseignant->matricule }}</td>
                        <td>{{ $enseignant->nom }}</td>
                        <td>{{ $enseignant->prenom }}</td>
                        <td>{{ $enseignant->email }}</td>
                        <td>{{ $enseignant->telephone }}</td>
                        <td>{{ $enseignant->adresse }}</td>
                        <td>{{ $enseignant->departement->departement ?? 'Mission' }}</td>
                        <td><img width="50px" src="{{asset('storage/'.$enseignant->photo) }}" alt=""></td>
                        <td class="d-flex gap-1 justify-content-end ">
                            <a href="{{ route('admin.enseignant.edit', $enseignant) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.enseignant.destroy', $enseignant)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger p-1 py-0 fs-4"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
    <div class="card-footer mt-1">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="pagination-rounded">
                    {{$enseignants->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
