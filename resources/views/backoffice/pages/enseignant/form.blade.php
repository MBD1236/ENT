@extends('backoffice.home')

@section('title', $enseignant->exists ? 'Editer un enseignant': 'Ajouter un enseignant')

@section('content')

<div class="card m-4">
    <h3 class="page-title text-center f-400 fs-3">@yield('title')</h3>
    <div class="card-body col-lg-10 m-auto">
        <form class="vstack  gap-2" action="{{ route($enseignant->exists ? 'admin.enseignant.update': 'admin.enseignant.store', $enseignant) }}" method="post" enctype="multipart/form-data">

            @method($enseignant->exists ? 'put' : 'post')
            @csrf

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-floating">
                        <input class="form-control @error('matricule') is-invalid @enderror" type="text" name="matricule" id="floatingmatricule" placeholder="Matricule" value="{{old('matricule', $enseignant->matricule)}}">
                        <label for="floatingmatricule">Matricule</label>
                        <div class="invalid-feedback">@error('matricule') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingnom" placeholder="Nom" value="{{old('nom', $enseignant->nom)}}">
                        <label for="floatingnom">Nom</label>
                        <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" id="floatingprenom" placeholder="Code enseignant" value="{{old('prenom', $enseignant->prenom)}}">
                        <label for="floatingprenom">Prénom</label>
                        <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                    </div>
                </div>
                 <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="floatingPhoto" placeholder="photo" value="{{old('photo', $enseignant->photo)}}">
                        <label for="floatingPhoto">Photo</label>
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
                 </div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingTel" placeholder="+224623229188" value="{{old('telephone', $enseignant->telephone)}}">
                <label for="floatingTel">Téléphone</label>
                <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="floatingInput" placeholder="diallo@gmail.com" value="{{old('email', $enseignant->email)}}">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('adresse') is-invalid @enderror" type="adresse" name="adresse" id="floatingAdresse" placeholder="Adresse" value="{{old('adresse', $enseignant->adresse)}}">
                <label for="floatingAdresse">Code postal/Adresse</label>
                <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
            </div>

            <button type="submit" class="btn btn-primary">
                @if ($enseignant->id) Modifier un enseignant
                @else Créer un nouveau enseignant
                @endif
            </button>
        </form>
    </div>
</div>

@endsection
