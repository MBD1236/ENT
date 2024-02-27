@extends('backoffice.home')

@section('title', 'Liste des années universitaires')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="mt-3">
    <div class="pagetitle">
        <h1>@yield('title')</h3>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-end mb-2">
            <div class="pt-2">
                <a href="{{ route('admin.annee_universitaire.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    <span>Ajouter</span>
                </a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Année Universitaire</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $annee_universitaires as $k => $annee_universitaire )
                    <tr>
                        <th scope="row">{{ $k+1 }}</td>
                        <td>{{ $annee_universitaire->annee_universitaire }}</th>
                        <td class="d-flex gap-1 justify-content-end ">
                            <a href="{{ route('admin.annee_universitaire.edit', $annee_universitaire) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.annee_universitaire.destroy', $annee_universitaire)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
                    {{$annee_universitaires->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
