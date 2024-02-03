@extends('backoffice.home')

@section('title', 'Listes des matieres')
@section('content')


@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div>
    <div class="pagetitle">
        <h1>@yield('title')</h1>
    </div>
</div>
<div class="d-flex justify-content-between mt-2">
        <div>
            <form>
                <div class="input-group">
                    <select name="programme" id="programme" class="form-select" type="search">
                        <option value="">Filter par programme</option>
                        @foreach($programmes as $programme)
                            <option value="{{$programme->id}}">{{ $programme->programme}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('admin.matiere.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i>  
                Ajouter
            </a>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-bordered mb-0 mt-4">
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
                                    <th>{{ $k+1 }}</th>
                                    <td>{{ $matiere->matiere }}</td>
                                    <td>{{ $matiere->semestre->semestre }}</td>
                                    <td>{{ $matiere->programme->programme }}</td>
                                    <td>{{ $matiere->programme->departement->departement }}</td>
                                    <td class="d-flex gap-2 justify-content-end w-100">
                                        <a href="{{ route('admin.matiere.edit', $matiere) }}" class="btn btn-primary"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.matiere.destroy', $matiere)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                             @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                    </td>
                                </tr>
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