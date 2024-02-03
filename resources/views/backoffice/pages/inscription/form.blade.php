@extends('backoffice.home')
@section('title', $inscription->id ? "Modification de '$inscription->ine'" : "Création d'une inscription")

@section('content')
<h1 class="page-title">@yield('title')</h1>
{{-- @if($errors->any())
<ul>
  @foreach ($errors->all() as $item)
      <li>{{ $item }}</li>
  @endforeach
</ul>
@endif --}}

<div class="card container">
    <div class="row mt-4">
    <div class="d-lg-flex align-items-end justify-content-end">
        <div class="col-3 d-lg-block ">
            <form>
                <div class="input-group"> 
                    <input name="searchIne" type="search" class="form-control" placeholder="Entrer l'INE de l'étudiant" value="{{ $inputIne ?? '' }}">
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
    </div>
   </div>
    <div class="card-body">
            {{-- FORMULAIRE inscription --}}
        <form action="{{ $inscription->id ? route('admin.inscription.update', $inscription) : route('admin.inscription.store')}}" method="post" class="vstack gap-2" enctype="multipart/form-data">
            @method($inscription->id ? "put" : "post")
            @csrf
            <div class="form-floating">
                <input class="form-control @error('etudiant_id') is-invalid @enderror" type="hidden" name="etudiant_id" id="floatingetudiant_id" placeholder="etudiant_id" value="{{old('etudiant_id', $etudiant->id ?? '')}}">
                <div class="invalid-feedback">@error('etudiant_id') {{ $message }} @enderror</div>
            </div>

           <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 mt-2 ">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="floatingnom" placeholder="nom" value="{{old('nom', $etudiant->nom)}}" @disabled(!$inscription->id)>
                                <label for="floatingnom">Nom</label>
                                <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" id="floatingprenom" placeholder="prenom" value="{{old('prenom', $etudiant->prenom)}}" @disabled(!$inscription->id)>
                                <label for="floatingprenom">Prénom</label>
                                <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('pv') is-invalid @enderror" type="number" name="pv" id="floatingpv" placeholder="pv" value="{{old('pv', $etudiant->pv)}}" @disabled(!$inscription->id)>
                                <label for="floatingpv">PV</label>
                                <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('ine') is-invalid @enderror" type="text" name="ine" id="floatingine" placeholder="ine" value="{{old('ine', $etudiant->ine)}}" @disabled(!$inscription->id)>
                                <label for="floatingine">INE </label>
                                <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" name="date_naissance" id="floatingdate_naissance" placeholder="date_naissance" value="{{old('date_naissance', $etudiant->date_naissance)}}" @disabled(!$inscription->id)>
                                <label for="floatingdate_naissance">Date de Naissance</label>
                                <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('lieu_naissance') is-invalid @enderror" type="text" name="lieu_naissance" id="floatinglieu_naissance" placeholder="lieu_naissance" value="{{old('lieu_naissance', $etudiant->lieu_naissance)}}" @disabled(!$inscription->id)>
                                <label for="floatinglieu_naissance">Lieu de Naissance</label>
                                <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($inputIne !== null) 
                    @if ($etudiant->photo !== null)
                    <div class="col-lg-2 col-md-2 col-sm-6 text-center mt-2 d-flex flex-column align-items-center justify-content-end ">
                        <img src="/storage/{{$etudiant->photo }}" class="img-fluid" alt="Photo" width="100px" height="100px">
                    </div>
                    @endif
                @endif
           </div>
           <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('pere') is-invalid @enderror" type="text" name="pere" id="floatingpere" placeholder="pere" value="{{old('pere', $etudiant->pere )}} et de {{old('mere', $etudiant->mere )}} " @disabled(!$inscription->id)>
                        <label for="floatingadresse">Filiation</label>
                        <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                   <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="floatingtelephone" placeholder="telephone" value="{{old('telephone', $etudiant->telephone)}}">
                            <label for="floatingtelephone">Telephone</label>
                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="floatingemail" placeholder="email" value="{{old('email', $etudiant->email)}}">
                            <label for="floatingemail">Email</label>
                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" id="floatingadresse" placeholder="adresse" value="{{old('adresse', $etudiant->adresse)}}")>
                        <label for="floatingadresse">Adresse</label>
                        <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                    </div>
                </div>
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
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="floatingphoto" placeholder="photo" value="{{old('photo', $etudiant->photo)}}">
                        <label for="floatingphoto">Photo</label>
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select name="session_id" id="session_id" class="form-control @error('session_id') is-invalid @enderror">
                            <option value="">Sélectionner une session</option>
                            @foreach($sessions as $session)
                                <option @selected(old('session_id', $inscription->session_id == $session->id)) value="{{$session->id}}">{{ $session->session}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('session_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select name="promotion_id" id="promotion_id" class="form-control @error('promotion_id') is-invalid @enderror">
                            <option value="">Sélectionner une promotion</option>
                            @foreach($promotions as $promotion)
                                <option @selected(old('promotion_id', $inscription->promotion_id == $promotion->id)) value="{{$promotion->id}}">{{ $promotion->promotion}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select name="niveau_id" id="niveau_id" class="form-control @error('niveau_id') is-invalid @enderror">
                            <option value="">Sélectionner un niveau</option>
                            @foreach($niveaux as $niveau)
                                <option @selected(old('niveau_id', $inscription->niveau_id == $niveau->id)) value="{{$niveau->id}}">{{ $niveau->niveau}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select name="programme_id" id="programme_id" class="form-control @error('programme_id') is-invalid @enderror">
                            <option value="">Sélectionner un programme</option>
                            @foreach($programmes as $programme)
                                <option @selected(old('programme_id', $inscription->programme_id == $programme->id)) value="{{$programme->id}}">{{ $programme->programme}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                    </div>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary">
                @if ($inscription->id) Modifier un étudiant
                @else Inscrire un nouvelle étudiant
                @endif
            </button>
        </form>
    </div>
</div>

    
@endsection