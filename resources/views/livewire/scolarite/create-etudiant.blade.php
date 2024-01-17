<div>
    <div class="pagetitle">
        <h1>Enregistrement d'un etudiant</h1>
    </div>
    <div class="card container mt-3">
        <div class="card-body">
                {{-- FORMULAIRE ETUDIANT --}}
            <form class="mt-4" action="" wire:submit.prevent='save'  class="vstack gap-2" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('nom') is-invalid @enderror" type="text" wire:model="nom" wire:focus.live.debounce.1ms='clearStatus' id="floatingnom" placeholder="nom">
                            <label for="floatingnom">Nom</label>
                            <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('prenom') is-invalid @enderror" type="text" wire:model="prenom" wire:focus.live.debounce.1ms='clearStatus' id="floatingprenom" placeholder="prenom">
                            <label for="floatingprenom">Prénom</label>
                            <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone') is-invalid @enderror" type="tel" wire:model="telephone" id="floatingtelephone" placeholder="telephone">
                            <label for="floatingtelephone">Telephone</label>
                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email" id="floatingemail" placeholder="email">
                            <label for="floatingemail">Email</label>
                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('pv') is-invalid @enderror" type="number" wire:model="pv" id="floatingpv" placeholder="pv">
                            <label for="floatingpv">PV</label>
                            <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('ine') is-invalid @enderror" type="text" wire:model="ine" id="floatingine" placeholder="ine">
                            <label for="floatingine">INE</label>
                            <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('session') is-invalid @enderror" type="text" wire:model="session" id="floatingsession" placeholder="session">
                            <label for="floatingsession">Session</label>
                            <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('programme') is-invalid @enderror" type="text" wire:model="programme" id="floatingProgramme" placeholder="Nom du programme">
                            <label for="floatingProgramme">Programme</label>
                            <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('profil') is-invalid @enderror" type="text" wire:model="profil" id="floatingprofil" placeholder="profil">
                            <label for="floatingprofil">Profil/Option au lycée</label>
                            <div class="invalid-feedback">@error('profil') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('centre') is-invalid @enderror" type="text" wire:model="centre" id="floatingcentre" placeholder="centre">
                            <label for="floatingcentre">Centre</label>
                            <div class="invalid-feedback">@error('centre') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('ecole_origine') is-invalid @enderror" type="text" wire:model="ecole_origine" id="floatingecole_origine" placeholder="ecole_origine">
                            <label for="floatingecole_origine">Ecole d'origine</label>
                            <div class="invalid-feedback">@error('ecole_origine') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" wire:model="photo" id="floatingphoto" placeholder="photo">
                            <label for="floatingphoto">Photo</label>
                            <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" wire:model="date_naissance" id="floatingdate_naissance" placeholder="date_naissance">
                            <label for="floatingdate_naissance">Date de Naissance</label>
                            <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('lieu_naissance') is-invalid @enderror" type="text" wire:model="lieu_naissance" id="floatinglieu_naissance" placeholder="lieu_naissance">
                            <label for="floatinglieu_naissance">Lieu de Naissance</label>
                            <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('pere') is-invalid @enderror" type="text" wire:model="pere" id="floatingpere" placeholder="pere">
                            <label for="floatingpere">Pere</label>
                            <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('mere') is-invalid @enderror" type="text" wire:model="mere" id="floatingmere" placeholder="mere">
                            <label for="floatingmere">Mere</label>
                            <div class="invalid-feedback">@error('mere') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('nom_tuteur') is-invalid @enderror" type="text" wire:model="nom_tuteur" id="floatingnom_tuteur" placeholder="nom_tuteur">
                            <label for="floatingnom_tuteur">Nom du Tuteur(Optionnel)</label>
                            <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone_tuteur') is-invalid @enderror" type="tel" wire:model="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="telephone_tuteur">
                            <label for="floatingtelephone_tuteur">Numero du Tuteur(Optionnel)</label>
                            <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('adresse') is-invalid @enderror" type="text" wire:model="adresse" id="floatingadresse" placeholder="adresse">
                            <label for="floatingadresse">adresse(Optionnel)</label>
                            <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('diplome') is-invalid @enderror" type="file" wire:model="diplome" id="floatingdiplome" placeholder="diplome">
                            <label for="floatingdiplome">Diplome du BAC</label>
                            <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('releve_notes') is-invalid @enderror" type="file" wire:model="releve_notes" id="floatingreleve_notes" placeholder="releve_notes">
                            <label for="floatingreleve_notes">Releve de notes BAC</label>
                            <div class="invalid-feedback">@error('releve_notes') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('certificat_nationalite') is-invalid @enderror" type="file" wire:model="certificat_nationalite" id="floatingcertificat_nationalite" placeholder="certificat_nationalite">
                            <label for="floatingcertificat_nationalite">Certificat de Nationnalite</label>
                            <div class="invalid-feedback">@error('certificat_nationalite') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('certificat_medical') is-invalid @enderror" type="file" wire:model="certificat_medical" id="floatingcertificat_medical" placeholder="certificat_medical">
                            <label for="floatingcertificat_medical">Certificat Medical</label>
                            <div class="invalid-feedback">@error('certificat_medical') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('extrait_naissance') is-invalid @enderror" type="file" wire:model="extrait_naissance" id="floatingextrait_naissance" placeholder="extrait_naissance">
                            <label for="floatingextrait_naissance">Extrait de Naissance</label>
                            <div class="invalid-feedback">@error('extrait_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
    
                <button type="submit" class="btn btn-primary mt-2">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</div>



