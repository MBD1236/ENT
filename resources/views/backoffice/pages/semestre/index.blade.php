@extends('backoffice.home')

@section('title', 'Semestres')
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

    <div class="card mt-2">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-end mb-2">
                <div class="pt-2">
                    <a href="{{ route('admin.semestre.create') }}" class="btn btn-primary">
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
                            <th>Semestre</th>
                            <th class="text-end">Actions</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $semestres as $k => $semestre )
    
                        <tr>
                            <th>{{ $k+1 }}</th>
                            <td>{{ $semestre->semestre }}</td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('admin.semestre.edit', $semestre) }}" class="btn btn-primary"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.semestre.destroy', $semestre)}}" method="post">
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
                            {{$semestres->links()}}
                        </ul>
                </div>
            </div>
        </div>
    </div>

    @endsection