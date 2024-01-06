@extends('backoffice.home')

@section('title', $semestre->id ? "Edition du '$semestre->semestre'" : "Ajout d'un semestre")

@section('content')
<h1 class="page-title">@yield('title')</h1>
<div class="card container">
    <div class="card-body">
        <form action="{{ $semestre->id ? route('admin.semestre.update', $semestre) : route('admin.semestre.store')}}" method="post" class="vstack gap-2">
            @method($semestre->id ? "put" : "post")
            @csrf
            
            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input type="text" name="semestre" id="semestre" value="{{old('semestre', $semestre->semestre)}}" class="form-control @error('semestre') is-invalid @enderror">
                <div class="invalid-feedback">@error('semestre') {{ $message }} @enderror</div>
            </div>
            
            <button type="submit " class="btn btn-primary">
                @if ($semestre->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>

@endsection