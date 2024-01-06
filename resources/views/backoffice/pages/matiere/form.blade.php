@extends('backoffice.home')

@section('title', $matiere->id ? "Modification de '$matiere->matiere'" : "Création d'une matière")

@section('content')
<h1 class="page-title">@yield('title')</h1>
<div class="card container">
    <div class="card-body">
        <form action="{{ $matiere->id ? route('admin.matiere.update', $matiere) : route('admin.matiere.store')}}" method="post" class="vstack gap-2">
            @method($matiere->id ? "put" : "post")
            @csrf
    
            <div class="form-group">
                <label for="matiere">Matiere</label>
                <input type="text" name="matiere" id="matiere" value="{{old('matiere', $matiere->matiere)}}" class="form-control @error('matiere') is-invalid @enderror">
                <div class="invalid-feedback">@error('matiere') {{ $message }} @enderror</div>
            </div>
            
            <div class="form-group">
            
                <label for="semestre_id">Semestre</label>
                <select name="semestre_id" id="semestre" class="form-control @error('semestre_id') is-invalid @enderror">
                    <option value="">Sélectionner un semestre</option>
                    @foreach($semestres as $semestre)
                        <option @selected(old('semestre_id', $matiere->semestre_id == $semestre->id)) value="{{$semestre->id}}">{{ $semestre->semestre}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
            </div>

            <div class="form-group">
            
                <label for="programme_id">Programme</label>
                <select name="programme_id" id="programme" class="form-control @error('programme_id') is-invalid @enderror">
                    <option value="">Sélectionner un programme</option>
                    @foreach($programmes as $programme)
                        <option @selected(old('programme_id', $matiere->programme_id == $programme->id)) value="{{$programme->id}}">{{ $programme->nom}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
            </div>

            <button type="submit" class="btn btn-primary">
                @if ($matiere->id) Modifier
                @else Créer
                @endif
            </button>   
        </form>
    </div>
</div>

    
@endsection