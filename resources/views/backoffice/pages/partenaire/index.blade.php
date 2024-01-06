@extends('backoffice.home')

@section('title', 'Partenaires')
@section('content')

<h3 class="page-title">@yield('title')</h3>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<a href="{{ route('admin.partenaire.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
     Ajouter</a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Partenaires</th>
                            <th>Logos</th>
                            <th class="text-end">Actions</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $partenaires as $k => $partenaire )
    
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $partenaire->nom }}</td>
                            <td><img src="/storage/{{ $partenaire->logo }}" alt="" style="object-fit: cover; width:50px; height:35px; border-radius:50px"></td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('admin.partenaire.edit', $partenaire) }}" class="btn btn-info"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.partenaire.destroy', $partenaire)}}" method="post">
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
                            {{$partenaires->links()}}
                        </ul>
                </div>
            </div>
        </div>
    </div>

@endsection