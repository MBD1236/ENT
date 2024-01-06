@extends('backoffice.home')

@section('title', $departement->exists ? 'Editer un departement': 'Ajouter un departement')

@section('content')
<div class="card m-4">
    <div class="card-body col-lg-10 m-auto">
          <h3 class="page-title text-center f-400 fs-3">@yield('title')</h3>
        <form class="vstack  gap-2" action="{{ route($departement->exists ? 'admin.departement.update': 'admin.departement.store', $departement) }}" method="post" enctype="multipart/form-data">

            @method($departement->exists ? 'put' : 'post')
            @csrf

            
            <div class="form-floating">
                <input class="form-control @error('departement') is-invalid @enderror" type="text" name="departement" id="floatingDepartement" placeholder="Nom du departement" value="{{old('departement', $departement->departement)}}">
                <label for="floatingDepartement">Departement</label>
                <div class="invalid-feedback">@error('departement') {{ $message }} @enderror</div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('codedepartement') is-invalid @enderror" type="text" name="codedepartement" id="floatingCodedepartement" placeholder="Code departement" value="{{old('codedepartement', $departement->codedepartement)}}">
                        <label for="floatingCodedepartement">Code departement</label>
                        <div class="invalid-feedback">@error('codedepartement') {{ $message }} @enderror</div>
                    </div>
                </div>
                 <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="floatingPhoto" placeholder="photo" value="{{old('photo', $departement->photo)}}">
                        <label for="floatingPhoto">Photo</label>
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
                 </div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingTel" placeholder="+224623229188" value="{{old('telephone', $departement->telephone)}}">
                <label for="floatingTel">Téléphone</label>
                <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="floatingInput" placeholder="diallo@gmail.com" value="{{old('email', $departement->email)}}">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('adresse') is-invalid @enderror" type="adresse" name="adresse" id="floatingAdresse" placeholder="Adresse" value="{{old('adresse', $departement->adresse)}}">
                <label for="floatingAdresse">Code postal/Adresse</label>
                <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="floatingDescription" cols="30" rows="10" placeholder="Une petite description">{{old('description', $departement->description)}}</textarea>
                <label for="floatingDescription">Une petite description</label>
                <div class="invalid-feedback">@error('description') {{ $message }} @enderror</div>
            </div>
            <button type="submit" class="btn btn-primary">
                @if ($departement->id) Modifier un departement
                @else Créer un nouveau departement
                @endif
            </button>
        </form>
    </div>
</div>
@endsection
