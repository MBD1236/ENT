@extends('backoffice.home')

@section('title', 'Liste des articles')
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
        <div class="card-body">
            <div class="d-flex justify-content-end my-2">
                <a href="{{ route('admin.article.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                    Ajouter</a>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th class="text-end">Actions</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $articles as $k => $article)
    
                        <tr>
                            <th>{{ $k+1 }}</th>
                            <td>{{ $article->titre}}</td>
                            <td>{{ $article->description}}</td>
                            <td><img src="/storage/{{ $article->photo}}" alt="" style="object-fit: cover; width:70px; height:35px;"></td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('admin.article.edit', $article) }}" class="btn btn-primary"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.article.destroy', $article)}}" method="post">
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
                            {{$articles->links()}}
                        </ul>
                </div>
            </div>
        </div>
    </div>

    @endsection