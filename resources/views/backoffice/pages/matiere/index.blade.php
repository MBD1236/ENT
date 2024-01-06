@extends('backoffice.home')

@section('title', 'Matieres')
@section('content')

<h3 class="page-title">@yield('title')</h3>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

    <div class="d-flex justify-content-between">
        <div>
            <a href="{{ route('admin.matiere.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>  
                Ajouter
            </a>
        </div>
        <div class="">
                <form>
                    <div class="input-group">
                        <select name="programme" id="programme" class="form-control" type="search">
                            <option value="">Filter par programme</option>
                            @foreach($programmes as $programme)
                                <option value="{{$programme->id}}">{{ $programme->nom}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
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
                            <th>Matieres</th>
                            <th>Semestres</th>
                            <th>Programmes</th>
                            <th>Departement</th>
                            <th class="text-end">Actions</th>
    
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ( $matieres as $k => $matiere )
        
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $matiere->matiere }}</td>
                                    <td>{{ $matiere->semestre->semestre }}</td>
                                    <td>{{ $matiere->programme->nom }}</td>
                                    <td>{{ $matiere->programme->departement->departement }}</td>
                                    <td class="d-flex gap-2 justify-content-end w-100">
                                        <a href="{{ route('admin.matiere.edit', $matiere) }}" class="btn btn-info"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('admin.matiere.destroy', $matiere)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td>Aucune donnée ne correspond à cette recherche</td>
                            @endforelse
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                 <div class="col-sm-12 col-md-12">
                        <ul class="pagination-rounded">
                            {{$matieres->links()}}
                        </ul>
                </div>
            </div>
        </div>
    </div>

    @endsection