@extends('backoffice.home')

@section('title', $annee_universitaire->id ? "Edition de l'année universitaire '$annee_universitaire->annee_universitaire'" : "Ajout d'une annee_universitaire")

@section('content')
<div class="pagetitle"><h1>@yield('title')</h1></div>
<div class="card">
    <div class="card-body">
        <form action="{{ $annee_universitaire->id ? route('admin.annee_universitaire.update', $annee_universitaire) : route('admin.annee_universitaire.store')}}" method="post" class="vstack gap-2">
            @method($annee_universitaire->id ? "put" : "post")
            @csrf
            <div class="col-12 mt-4">
                <div class="form-floating">
                    <input class="form-control @error('annee_universitaire') is-invalid @enderror" type="text" name="annee_universitaire" id="floatingannee_universitaire" placeholder="annee_universitaire" value="{{old('annee_universitaire', $annee_universitaire->annee_universitaire)}}">
                    <label for="floatingannee_universitaire">année universitaire</label>
                    <div class="invalid-feedback">@error('annee_universitaire') {{ $message }} @enderror</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                @if ($annee_universitaire->id) Modifier une année universitaire
                @else Ajouter une année universitaire
                @endif
            </button>
        </form>
    </div>
</div>
@endsection