@extends('backoffice.home')
@section('title', $article->id ? "Modification de '$article->titre'" : "Ajout d'un article")
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
</div>
        <div class="card">
            <div class="card-body">
                <form class="mt-4" action="{{ $article->id ? route('admin.article.update', $article) : route('admin.article.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
                    @method($article->id ? "put" : "post")
                    @csrf
            
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id="titre" value="{{old('titre', $article->titre)}}" class="form-control @error('titre') is-invalid @enderror">
                        <div class="invalid-feedback">@error('titre') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{old('description', $article->description)}}" class="form-control @error('description') is-invalid @enderror">
                        <div class="invalid-feedback">@error('description') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <input type="text" name="contenu" id="contenu" value="{{old('contenu', $article->contenu)}}" class="form-control @error('contenu') is-invalid @enderror">
                        <div class="invalid-feedback">@error('contenu') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" value="{{old('photo', $article->photo)}}" class="form-control @error('photo') is-invalid @enderror">
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
        
                    <button type="submit" class="btn btn-primary">
                        @if ($article->id) Modifier
                        @else Créer
                        @endif
                    </button>
                </form>
            </div>
        </div>
        
@endsection