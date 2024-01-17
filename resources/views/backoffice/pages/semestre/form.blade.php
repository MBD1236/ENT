@extends('backoffice.home')

@section('title', $semestre->id ? "Edition du '$semestre->semestre'" : "Ajout d'un semestre")

@section('content')
<div class="pagetitle"><h1>@yield('title')</h1></div>
<div class="card container">
    <div class="card-body">
        <form action="{{ $semestre->id ? route('admin.semestre.update', $semestre) : route('admin.semestre.store')}}" method="post" class="vstack gap-2">
            @method($semestre->id ? "put" : "post")
            @csrf
            
            <div class="col-12 mt-4">
                <div class="form-floating">
                    <input type="text" name="semestre" id="floatingsemestre" value="{{old('semestre', $semestre->semestre)}}" class="form-control @error('semestre') is-invalid @enderror">
                    <label for="floatingsemestre">Semestre</label>
                    <div class="invalid-feedback">@error('semestre') {{ $message }} @enderror</div>
                </div>
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