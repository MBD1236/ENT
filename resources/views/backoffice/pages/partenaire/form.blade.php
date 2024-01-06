@extends('backoffice.home')

@section('title', $partenaire->id ? "Edition du partenaire '$partenaire->nom'" : "Ajout d'un partenaire")

@section('content')
<h1 class="page-title">@yield('title')</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ $partenaire->id ? route('admin.partenaire.update', $partenaire) : route('admin.partenaire.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
            @method($partenaire->id ? "put" : "post")
            @csrf

            <div class="form-floating">
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingNom" placeholder="Nom du partenaire" value="{{old('nom', $partenaire->nom)}}">
                <label for="floatingNom">Nom</label>
                <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating">
                <input class="form-control @error('logo') is-invalid @enderror" type="file" name="logo" id="floatingLogo" placeholder="logo" value="{{old('logo', $partenaire->logo)}}">
                <label for="floatingLogo">Logo</label>
                <div class="invalid-feedback">@error('logo') {{ $message }} @enderror</div>
            </div>
        

            <button type="submit" class="btn btn-primary">
                @if ($partenaire->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>
@endsection