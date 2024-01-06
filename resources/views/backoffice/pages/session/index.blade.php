@extends('backoffice.home')

@section('title', 'Sessions')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="d-flex flex-row justify-content-between mt-3">
    <div>
        <h3 class="page-title justify-start fs-2">@yield('title')</h3>
    </div>
    <div>
        <a href="{{ route('admin.session.create') }}" class="btn btn-primary mt-1">
            <i class="fa fa-plus"></i>
            <span>Ajouter une session</span>
        </a>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body py-2 px-2">
        <h2 class="py-2 text-center">Liste des sessions</h2>
        <div class="table-responsive-sm">
            <table class="table table-hover table-centered table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>session</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $sessions as $k => $session )
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $session->session }}</td>
                        <td class="d-flex gap-1 justify-content-end ">
                            <a href="{{ route('admin.session.edit', $session) }}" class="btn btn-info p-1 py-lg-0 py-0 p-lg-1 fs-4"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.session.destroy', $session)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger p-1 py-0 fs-4"><i class="fa fa-trash"></i></button>
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
                    {{$sessions->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
