@extends('backoffice.home')

@section('title', 'Departements')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif


<div class="pagetitle">
        <h1>@yield('title')</h1>
</div>
<div class="card mt-2">
    <div class="card-body py-2 px-2">
        <div class="d-flex justify-content-end mb-2">
            <div>
                <a href="{{ route('admin.departement.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i><span>Ajouter un departement</span>
                </a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-centered table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Departements</th>
                        <th>Code departement</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Addresse</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $departements as $k => $departement )
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $departement->departement }}</td>
                        <td>{{ $departement->codedepartement }}</td>
                        <td>{{ $departement->email }}</td>
                        <td>{{ $departement->telephone }}</td>
                        <td>{{ $departement->adresse }}</td>
                        <td><img width="20px" src="{{asset('storage/'.$departement->photo) }}" alt=""></td>
                        <td>{{ substr($departement->description, 0, 10)}}...</td>
                        <td class="d-flex gap-1 justify-content-end ">
                            <a href="{{ route('admin.departement.edit', $departement) }}" class="btn btn-primary p-1 py-lg-0 py-0 p-lg-1 fs-4"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.departement.destroy', $departement)}}" method="post">
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
                    {{$departements->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
