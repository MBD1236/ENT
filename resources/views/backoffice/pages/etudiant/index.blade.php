@extends('backoffice.home')

@section('title', 'Etudiants')
@section('content')

<h3 class="page-title">@yield('title')</h3>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div class="row">

        <div class="col-md-4">
            <a href="{{ route('admin.etudiant.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                <span>Ajouter</span>
            </a>
        </div>
        <div class="col-md-4">
            <form>
                <div class="input-group"> 
                    
                    <input value="{{ $input }}" name="searchIne" type="search" class="form-control" placeholder="Rechercher un etudiant(e) par INE ">
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('admin.etudiant.importer') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" name="fichier" class="form-control">
                    <button type="submit" class="btn btn-primary">Importer</button>
                </div>
            </form>
        </div>
    
</div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>PV</th>
                            <th>INE</th>
                            <th class="text-end">Actions</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $etudiants as $k => $etudiant)
    
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $etudiant->nom}}</td>
                            <td>{{ $etudiant->prenom}}</td>
                            <td>{{ $etudiant->email}}</td>
                            <td>{{ $etudiant->pv}}</td>
                            <td>{{ $etudiant->ine}}</td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('admin.etudiant.edit', $etudiant) }}" class="btn btn-info"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.etudiant.destroy', $etudiant)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
                            {{$etudiants->links()}}
                        </ul>
                </div>
            </div>
        </div>
    </div>
@endsection