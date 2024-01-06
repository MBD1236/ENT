@extends('backoffice.home')

@section('title', $etudiant->id ? "Modification de '$etudiant->ine'" : "Création d'un etudiant")

@section('content')
<h1 class="page-title">@yield('title')</h1>

@if($errors->any())
<ul>
  @foreach ($errors->all() as $item)
      <li>{{ $item }}</li>
  @endforeach
</ul>
@endif

<div class="card container">
    <div class="row mt-4">
    <div class="d-lg-flex align-items-end justify-content-end">
        <div class="col-3 d-lg-block ">
            <form>
                <div class="input-group"> 
                    <input name="searchIne" type="search" class="form-control" placeholder="Rechercher un etudiant(e) par INE ">
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
    </div>
   </div>
    <div class="card-body">
            {{-- FORMULAIRE ETUDIANT --}}
        <form action="{{ $etudiant->id ? route('admin.etudiant.update', $etudiant) : route('admin.etudiant.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
            @method($etudiant->id ? "put" : "post")
            @csrf
    
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingnom" placeholder="nom" value="{{old('nom', $etudiant->nom)}}">
                        <label for="floatingnom">Nom</label>
                        <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" id="floatingprenom" placeholder="prenom" value="{{old('prenom', $etudiant->prenom)}}">
                        <label for="floatingprenom">Prénom</label>
                        <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingtelephone" placeholder="telephone" value="{{old('telephone', $etudiant->telephone)}}">
                        <label for="floatingtelephone">Telephone</label>
                        <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="floatingemail" placeholder="email" value="{{old('email', $etudiant->email)}}">
                        <label for="floatingemail">Email</label>
                        <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('pv') is-invalid @enderror" type="number" name="pv" id="floatingpv" placeholder="pv" value="{{old('pv', $etudiant->pv)}}">
                        <label for="floatingpv">PV</label>
                        <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('ine') is-invalid @enderror" type="text" name="ine" id="floatingine" placeholder="ine" value="{{old('ine', $etudiant->ine)}}">
                        <label for="floatingine">INE</label>
                        <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('session') is-invalid @enderror" type="text" name="session" id="floatingsession" placeholder="session" value="{{old('session', $etudiant->session)}}">
                        <label for="floatingsession">Session</label>
                        <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('programme') is-invalid @enderror" type="text" name="programme" id="floatingProgramme" placeholder="Nom du Programme" value="{{old('programme', $etudiant->programme)}}">
                        <label for="floatingProgramme">programme</label>
                        <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('profil') is-invalid @enderror" type="text" name="profil" id="floatingprofil" placeholder="profil" value="{{old('profil', $etudiant->profil)}}">
                        <label for="floatingprofil">Profil/Option au lycée</label>
                        <div class="invalid-feedback">@error('profil') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('centre') is-invalid @enderror" type="text" name="centre" id="floatingcentre" placeholder="centre" value="{{old('centre', $etudiant->centre)}}">
                        <label for="floatingcentre">Centre</label>
                        <div class="invalid-feedback">@error('centre') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('ecole_origine') is-invalid @enderror" type="text" name="ecole_origine" id="floatingecole_origine" placeholder="ecole_origine" value="{{old('ecole_origine', $etudiant->ecole_origine)}}">
                        <label for="floatingecole_origine">Ecole d'origine</label>
                        <div class="invalid-feedback">@error('ecole_origine') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="floatingphoto" placeholder="photo" value="{{old('photo', $etudiant->photo)}}">
                        <label for="floatingphoto">Photo</label>
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" name="date_naissance" id="floatingdate_naissance" placeholder="date_naissance" value="{{old('date_naissance', $etudiant->date_naissance)}}">
                        <label for="floatingdate_naissance">Date de Naissance</label>
                        <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('lieu_naissance') is-invalid @enderror" type="text" name="lieu_naissance" id="floatinglieu_naissance" placeholder="lieu_naissance" value="{{old('lieu_naissance', $etudiant->lieu_naissance)}}">
                        <label for="floatinglieu_naissance">Lieu de Naissance</label>
                        <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('pere') is-invalid @enderror" type="text" name="pere" id="floatingpere" placeholder="pere" value="{{old('pere', $etudiant->pere)}}">
                        <label for="floatingpere">Pere</label>
                        <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('mere') is-invalid @enderror" type="text" name="mere" id="floatingmere" placeholder="mere" value="{{old('mere', $etudiant->mere)}}">
                        <label for="floatingmere">Mere</label>
                        <div class="invalid-feedback">@error('mere') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('nom_tuteur') is-invalid @enderror" type="text" name="nom_tuteur" id="floatingnom_tuteur" placeholder="nom_tuteur" value="{{old('nom_tuteur', $etudiant->nom_tuteur)}}">
                        <label for="floatingnom_tuteur">Nom du Tuteur(Optionnel)</label>
                        <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('telephone_tuteur') is-invalid @enderror" type="tel" name="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="telephone_tuteur" value="{{old('telephone_tuteur', $etudiant->telephone_tuteur)}}">
                        <label for="floatingtelephone_tuteur">Numero du Tuteur(Optionnel)</label>
                        <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" id="floatingadresse" placeholder="adresse" value="{{old('adresse', $etudiant->adresse)}}">
                        <label for="floatingadresse">adresse(Optionnel)</label>
                        <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('diplome') is-invalid @enderror" type="file" name="diplome" id="floatingdiplome" placeholder="diplome" value="{{old('diplome', $etudiant->diplome)}}">
                        <label for="floatingdiplome">Diplome du BAC</label>
                        <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('releve_notes') is-invalid @enderror" type="file" name="releve_notes" id="floatingreleve_notes" placeholder="releve_notes" value="{{old('releve_notes', $etudiant->releve_notes)}}">
                        <label for="floatingreleve_notes">Releve de notes BAC</label>
                        <div class="invalid-feedback">@error('releve_notes') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('certificat_nationalite') is-invalid @enderror" type="file" name="certificat_nationalite" id="floatingcertificat_nationalite" placeholder="certificat_nationalite" value="{{old('certificat_nationalite', $etudiant->certificat_nationalite)}}">
                        <label for="floatingcertificat_nationalite">Certificat de Nationnalite</label>
                        <div class="invalid-feedback">@error('certificat_nationalite') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('certificat_medical') is-invalid @enderror" type="file" name="certificat_medical" id="floatingcertificat_medical" placeholder="certificat_medical" value="{{old('certificat_medical', $etudiant->certificat_medical)}}">
                        <label for="floatingcertificat_medical">Certificat Medical</label>
                        <div class="invalid-feedback">@error('certificat_medical') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('extrait_naissance') is-invalid @enderror" type="file" name="extrait_naissance" id="floatingextrait_naissance" placeholder="extrait_naissance" value="{{old('extrait_naissance', $etudiant->extrait_naissance)}}">
                        <label for="floatingextrait_naissance">Extrait de Naissance</label>
                        <div class="invalid-feedback">@error('extrait_naissance') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                @if ($etudiant->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>

    
@endsection