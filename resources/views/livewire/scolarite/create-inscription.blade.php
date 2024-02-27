<div>

<div class="pagetitle">
<h1>Inscription des etudiants</h1>

</div>
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
            <form action="" wire:submit.prevent='init'>
                <div class="input-group"> 
                    <input wire:model="searchIne" type="search" class="form-control" placeholder="Entrer l'INE de l'étudiant">
                    <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                </div>
            </form>
        </div>
    </div>
   </div>
    <div class="card-body">
            {{-- FORMULAIRE inscription --}}
        <form action=""  wire:submit.prevent='store' class="vstack gap-2" enctype="multipart/form-data">
            <div class="form-floating">
                <input class="form-control @error('etudiant_id') is-invalid @enderror" type="hidden" wire:model.defer="etudiant_id" id="floatingetudiant_id" placeholder="etudiant_id">
                <div class="invalid-feedback">@error('etudiant_id') {{ $message }} @enderror</div>
            </div>

           <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 mt-2 ">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('nom') is-invalid @enderror" type="text" wire:model.defer="nom" id="floatingnom" placeholder="nom" disabled>
                                <label for="floatingnom">Nom</label>
                                <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('prenom') is-invalid @enderror" type="text" wire:model.defer="prenom" id="floatingprenom" placeholder="prenom" disabled>
                                <label for="floatingprenom">Prénom</label>
                                <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('pv') is-invalid @enderror" type="number" wire:model.defer="pv" id="floatingpv" placeholder="pv" disabled>
                                <label for="floatingpv">PV</label>
                                <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('ine') is-invalid @enderror" type="text" wire:model.defer="ine" id="floatingine" placeholder="ine" disabled>
                                <label for="floatingine">INE </label>
                                <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" wire:model.defer="date_naissance" id="floatingdate_naissance" placeholder="date_naissance" disabled>
                                <label for="floatingdate_naissance">Date de Naissance</label>
                                <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                            <div class="form-floating">
                                <input class="form-control @error('lieu_naissance') is-invalid @enderror" type="text" wire:model.defer="lieu_naissance" id="floatinglieu_naissance" placeholder="lieu_naissance" disabled>
                                <label for="floatinglieu_naissance">Lieu de Naissance</label>
                                <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($this->searchIne !== '' && $etudiant) 
                    @if ($etudiant->photo !== null)
                    <div class="col-lg-2 col-md-2 col-sm-6 text-center mt-2 d-flex flex-column align-items-center justify-content-end">
                        <img src="/storage/{{$etudiant->photo }}" class="img-fluid" alt="Photo" width="100px" height="100px">
                    </div>
                    @endif
                @endif
           </div>
           <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control type="text" value="{{ $this->pere  }} et de {{ $this->mere }}" id="floatingpere" placeholder="pere" disabled>
                        <label for="floatingadresse">Filiation</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                   <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone') is-invalid @enderror" type="tel" wire:model.defer="telephone" id="floatingtelephone" placeholder="telephone">
                            <label for="floatingtelephone">Telephone</label>
                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model.defer="email" id="floatingemail" placeholder="email">
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
                        <input class="form-control @error('adresse') is-invalid @enderror" type="text" wire:model.defer="adresse" id="floatingadresse" placeholder="adresse">
                        <label for="floatingadresse">Adresse</label>
                        <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('nom_tuteur') is-invalid @enderror" type="text" wire:model.defer="nom_tuteur" id="floatingnom_tuteur" placeholder="nom_tuteur">
                        <label for="floatingnom_tuteur">Nom du Tuteur(Optionnel)</label>
                        <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('telephone_tuteur') is-invalid @enderror" type="tel" wire:model.defer="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="telephone_tuteur">
                        <label for="floatingtelephone_tuteur">Numero du Tuteur(Optionnel)</label>
                        <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" wire:model.defer="photo" id="floatingphoto" placeholder="photo">
                        <label for="floatingphoto">Photo</label>
                        <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select wire:model="annee_universitaire_id" id="annee_universitaire_id" class="form-control @error('annee_universitaire_id') is-invalid @enderror">
                            <option value="0">Sélectionner une année universitaire</option>
                            @foreach($annee_universitaires as $annee_universitaire)
                                <option value="{{$annee_universitaire->id}}" wire:key='{{ $annee_universitaire->id }}'>{{ $annee_universitaire->annee_universitaire}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select wire:model="promotion_id" id="promotion_id" class="form-control @error('promotion_id') is-invalid @enderror">
                            <option value="">Sélectionner une promotion</option>
                            @foreach($promotions as $promotion)
                                <option value="{{$promotion->id}}" wire:key='{{ $promotion->id }}'>{{ $promotion->promotion}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select wire:model="niveau_id" id="niveau_id" class="form-control @error('niveau_id') is-invalid @enderror">
                            <option value="0">Sélectionner un niveau</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{$niveau->id}}" wire:key='{{ $niveau->id }}'>{{ $niveau->niveau}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="form-floating">
                        <select wire:model="programme_id" id="programme_id" class="form-control @error('programme_id') is-invalid @enderror">
                            <option value="0">Sélectionner un programme</option>
                            @foreach($programmes as $programme)
                                <option value="{{$programme->id}}" wire:key='{{ $programme->id }}'>{{ $programme->programme}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror</div>
                    </div>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary">
                        Créer
            </button>
        </form>
    </div>
</div>

</div>
