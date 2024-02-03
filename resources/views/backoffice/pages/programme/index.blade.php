@extends('backoffice.home')

@section('title', 'Liste des progragramme')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="card mt-2">
        <div class="card-header d-flex justify-content-between  my-3">
            <div>
                <h4 class="text-primary">@yield('title') </h4>
            </div>
            <div>
                <a href="{{ route('admin.programme.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i><span>Ajouter un programme</span>
                </a>
            </div>
        </div>
        <div class="card-body py-2 px-2">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Progragramme</th>
                            <th>Departement</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programmes as $k => $programme )
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $programme->programme }}</td>
                            <td>{{ $programme->departement->departement }}</td>
                            <td class="d-flex gap-1 justify-content-end ">
                                <a href="{{ route('admin.programme.edit', $programme) }}" class="btn btn-primary p-1 py-lg-0 py-0 p-lg-1 fs-6"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.programme.destroy', $programme)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger p-1 py-0 fs-6"><i class="bi bi-trash"></i></button>
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
                        {{$programmes->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
