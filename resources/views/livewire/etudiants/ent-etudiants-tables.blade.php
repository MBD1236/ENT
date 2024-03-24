<div>
    <div class="pagetitle text-center pge">
        <h1>Bienvenue au formulaire d'inscription</h1>
        <i>Les champs qui ont l'astérique (*) sont tous obligatoire </i>
    </div>
    <div class="card container mt-3">
        <div class="card-body">

            <form class="mt-4" action="" wire:submit.prevent='save'  class="vstack gap-2" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('nom') is-invalid @enderror" type="text" wire:model="nom" wire:focus.live.debounce.1ms='clearStatus' id="floatingnom" placeholder="nom">
                            <label for="floatingnom">Nom <span class="text-danger">*</span> </label>
                            <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('prenom') is-invalid @enderror" type="text" wire:model="prenom" wire:focus.live.debounce.1ms='clearStatus' id="floatingprenom" placeholder="prenom">
                            <label for="floatingprenom">Prénom <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('prenom') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone') is-invalid @enderror" type="tel" wire:model="telephone" id="floatingtelephone" placeholder="telephone">
                            <label for="floatingtelephone">Telephone <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('telephone') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email" id="floatingemail" placeholder="email">
                            <label for="floatingemail">Email <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('pv') is-invalid @enderror" type="number" wire:model="pv" id="floatingpv" placeholder="pv">
                            <label for="floatingpv">PV <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('pv') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('ine') is-invalid @enderror" type="text" wire:model="ine" id="floatingine" placeholder="ine">
                            <label for="floatingine">INE <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('ine') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('session') is-invalid @enderror" type="text" wire:model="session" id="floatingsession" placeholder="session">
                            <label for="floatingsession">Session <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('programme') is-invalid @enderror" type="text" wire:model="programme" id="floatingProgramme" placeholder="Nom du programme">
                            <label for="floatingProgramme">Programme <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('profil') is-invalid @enderror" type="text" wire:model="profil" id="floatingprofil" placeholder="profil">
                            <label for="floatingprofil">Profil/Option au lycée <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('profil') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('centre') is-invalid @enderror" type="text" wire:model="centre" id="floatingcentre" placeholder="centre">
                            <label for="floatingcentre">Centre <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('centre') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('ecole_origine') is-invalid @enderror" type="text" wire:model="ecole_origine" id="floatingecole_origine" placeholder="ecole_origine">
                            <label for="floatingecole_origine">Ecole d'origine <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('ecole_origine') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" wire:model="photo" id="floatingphoto" placeholder="photo">
                            <label for="floatingphoto">Photo <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('photo') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('date_naissance') is-invalid @enderror" type="date" wire:model="date_naissance" id="floatingdate_naissance" placeholder="date_naissance">
                            <label for="floatingdate_naissance">Date de Naissance <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('date_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('lieu_naissance') is-invalid @enderror" type="text" wire:model="lieu_naissance" id="floatinglieu_naissance" placeholder="lieu_naissance">
                            <label for="floatinglieu_naissance">Lieu de Naissance <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('lieu_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('pere') is-invalid @enderror" type="text" wire:model="pere" id="floatingpere" placeholder="pere">
                            <label for="floatingpere">Pere <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('pere') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('mere') is-invalid @enderror" type="text" wire:model="mere" id="floatingmere" placeholder="mere">
                            <label for="floatingmere">Mere <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('mere') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('nom_tuteur') is-invalid @enderror" type="text" wire:model="nom_tuteur" id="floatingnom_tuteur" placeholder="nom_tuteur">
                            <label for="floatingnom_tuteur">Nom du tuteur</label>
                            <div class="invalid-feedback">@error('nom_tuteur') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('telephone_tuteur') is-invalid @enderror" type="tel" wire:model="telephone_tuteur" id="floatingtelephone_tuteur" placeholder="telephone_tuteur">
                            <label for="floatingtelephone_tuteur">Numero du tuteur </label>
                            <div class="invalid-feedback">@error('telephone_tuteur') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('adresse') is-invalid @enderror" type="text" wire:model="adresse" id="floatingadresse" placeholder="adresse">
                            <label for="floatingadresse">Adresse du tuteur</label>
                            <div class="invalid-feedback">@error('adresse') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('diplome') is-invalid @enderror" type="file" wire:model="diplome" id="floatingdiplome" placeholder="diplome">
                            <label for="floatingdiplome">Diplome du BAC <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('diplome') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('releve_notes') is-invalid @enderror" type="file" wire:model="releve_notes" id="floatingreleve_notes" placeholder="releve_notes">
                            <label for="floatingreleve_notes">Releve de notes BAC <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('releve_notes') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('certificat_nationalite') is-invalid @enderror" type="file" wire:model="certificat_nationalite" id="floatingcertificat_nationalite" placeholder="certificat_nationalite">
                            <label for="floatingcertificat_nationalite">Certificat de Nationnalite <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('certificat_nationalite') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('certificat_medical') is-invalid @enderror" type="file" wire:model="certificat_medical" id="floatingcertificat_medical" placeholder="certificat_medical">
                            <label for="floatingcertificat_medical">Certificat Medical <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('certificat_medical') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control @error('extrait_naissance') is-invalid @enderror" type="file" wire:model="extrait_naissance" id="floatingextrait_naissance" placeholder="extrait_naissance">
                            <label for="floatingextrait_naissance">Extrait de Naissance <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">@error('extrait_naissance') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
    
               <div class="row my-3">
                    <div class="card text-center my-3 py-3 surete">
                        <b><span>Êtes-vous sûr de l'exactitude des informations que vous avez fourni ci-haut ?</span></b>
                        <i><span>Verifiez s'il n'y a pas d'erreur avant de s'inscrire; sinon en cas d'erreur veillez contacter l'administrateur pour vous aidez</span></i>
                    </div>
                    <div class="d-flex flex-row gap-2">
                        <button type="submit" class="btn btn-primary fw-bold fs-6"><i class="bi bi-save me-1"></i> S'inscrire</button>
                        <button wire:click='cancel' class="btn btn-danger fw-bold fs-6"><i class="bi bi-eraser me-1"></i>Annuler</button>
                    </div>
                    <div class="col-3">
                    </div>
               </div>
            </form>

        </div>
    </div>
</div>



