@extends('backoffice.home')

@section('title', $niveau->id ? "Edition de la '$niveau->niveau'" : "Ajout d'un niveau")

@section('content')
<h1 class="page-title">@yield('title')</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ $niveau->id ? route('admin.niveau.update', $niveau) : route('admin.niveau.store')}}" method="post" class="vstack gap-2">
            @method($niveau->id ? "put" : "post")
            @csrf
            
            <div class="form-group">
                <label for="niveau">Niveau</label>
                <input type="text" name="niveau" id="niveau" value="{{old('niveau', $niveau->niveau)}}" class="form-control @error('niveau') is-invalid @enderror">
                <div class="invalid-feedback">@error('niveau') {{ $message }} @enderror</div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                @if ($niveau->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>
@endsection