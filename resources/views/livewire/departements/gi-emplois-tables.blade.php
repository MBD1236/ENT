<div>
    <div class="pagetitle text-center card-header text-primary">
        <h1>Emploi du temps </h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="card my-0 py-4">
        <div class="card-body row ">
            <div class="col-md-3 col-lg-3 col-sm-6">
                <select class="form-select" type="search" wire:model.live='semestre'>
                    <option value="0">Filtrer par semestre</option>
                    @foreach ($semestres as $semestre)
                        <option value="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6">
                <select class="form-select" wire:model.live='promotion'>
                    <option value="0">Filtrer par promotion</option>
                    @foreach ($promotions as $promotion)
                        <option value="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6">
                <select class="form-control" type="search" wire:model.live='searchProgramme'>
                    <option value="0">Filtrer par programme</option>
                    @foreach ($programmes as $programme)
                        <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6">
                <select class="form-select" wire:model.live='annee_universitaire'>
                    <option value="0">Filtrer par annee universitaire</option>
                    @foreach ($annee_universitaires as $annee_universitaire)
                        <option value="{{ $annee_universitaire->id }}">{{ $annee_universitaire->annee_universitaire }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive-sm">
                {{-- ajouter une nouvelle ligne --}}
                <div class="emplois d-flex justify-content-between mt-4">
                    <button wire:click="toggleForm" class="btn btn-link border border-1">Ajouter une ligne</button>
                   
                    <div class="col-lg-2 col-md-2 col-sm-12 my-2 text-end">
                        @if ($addline)
                        <button form="addemploi" type="submit" class="btn btn-primary">Enregistrer</button>
                        @endif
                    </div>
                </div>
                <div class="row">
                     {{-- la recherche --}}
                    <div class="col-lg-4 col-md-4 col-sm-12 my-2 text-end">
                        <form>
                            <div class="input-group"> 
                                <input value="" name="searchIne" type="search" class="form-control" placeholder="Rechercher un etudiant(e) par INE ">
                                <button type="submit" class="btn btn-primary"><span class="ri-search-line search-icon text-muted"></span></button>
                            </div>
                        </form>
                    </div>
                    {{-- l'import du fichier --}}
                    <div class="col-lg-4 col-md-4 col-sm-12 my-2 text-end">
                        <form action="{{ route('genieinfo.upload') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="fichier" class="form-control @error('fichier') is-invalid @enderror">
                                <button type="submit" class="btn btn-primary">Importer</button>
                                <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>
                            </div>
                        </form>
                    </div>
                    {{-- bouton enregistrer --}}
                </div>
                {{-- le tableau --}}
                <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>Jours</th>
                            <th>Horaires</th>
                            <th>Matières</th>
                            <th>Professeurs</th>
                            <th>Programme</th>
                            <th>Promotion</th>
                            <th>Semestre</th>
                            <th>An universitaire</th>
                            <th>Salle</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Formulaire d'ajout d'une nouvelle ligne (initiallement caché) -->
                        @if ($addline)
                        <tr>
                            <form action="" wire:submit.prevent='save' id="addemploi">
                                @csrf

                                <td>
                                    <input type="text" wire:model="jour" required placeholder="Jour..." class="form-control @error('jour') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('jour') {{ $message }} @enderror</div>
                                </td>

                                <td>
                                    <input type="text" wire:model="horaire" required  placeholder="Horaire..." class="form-control @error('horaire') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                    <div class="invalid-feedback">@error('horaire') {{ $message }} @enderror</div>
                                </td>

                                <td>
                                    <select wire:model="matiere_id" id="" class="form-select @error('matiere_id') is-invalid @enderror">
                                        <option value="0">Matière</option>
                                        @foreach ($matieres as $matiere)
                                            <option value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="enseignant_id" id="" class="form-select @error('enseignant_id') is-invalid @enderror">
                                        <option value="0">Enseignant</option>
                                        @foreach ($enseignants as $enseignant)
                                            <option value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="programme_id" id="" class="form-select @error('programme_id') is-invalid @enderror">
                                        <option value="0">Programme</option>
                                        @foreach ($programmes as $programme)
                                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror
                                    </div>
                                </td>
                                <td>
                                    <select wire:model="promotion_id" id="" class="form-select @error('promotion_id') is-invalid @enderror">
                                        <option value="0">Promotion</option>
                                        @foreach ($promotions as $promotion)
                                            <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                </td>

                                <td>
                                    <select wire:model="semestre_id" required class="form-select @error('semestre_id') is-invalid @enderror">
                                        <option value="0">Semestre</option>
                                        @foreach ($semestres as $semestre)
                                            <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="annee_universitaire_id" class="form-select @error('annee_universitaire_id') is-invalid @enderror" required>
                                        <option value="0">Annee universitaire</option>
                                        @foreach ($annee_universitaires as $i)
                                            <option value="{{ $i->id }}" wire:key="{{ $i->id }}">{{ $i->annee_universitaire }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <input type="text" wire:model="salle" required placeholder="Salle..." class="form-control @error('salle') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('salle') {{ $message }} @enderror</div>
                                </td>
                                <td></td>

                            </form>
                        </tr>
                        <!-- fin du formulaire d'ajout -->
                        @endif

                        {{-- @dump($emplois) --}}

                        @forelse ($emplois as $k => $emploi)
                            @if ($editingId === $emploi->id)
                            {{-- Debut du formulaire de modification --}}
                                <tr wire:key='{{ $emploi->id }}'>
                                    <form action="" wire:submit.prevent='update' id="editemploi">
                                        <td>
                                            <input wire:model='jour' type="text" value="{{ $emploi->jour }}" class="form-control @error('jour') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('jour') {{ $message }} @enderror</div>
                                        </td>

                                        <td>
                                            <input type="text" wire:model='horaire' value="{{ $emploi->horaire}}" class="form-control @error('horaire') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('horaire') {{ $message }} @enderror</div>
                                        </td>

                                        <td>
                                            <select wire:model='matiere_id' class="form-control @error('matiere_id') is-invalid @enderror">
                                                <option value="0">Matière</option>
                                                @foreach ($matieres as $matiere)
                                                    <option @selected($emploi->matiere_id == $matiere->id) value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                        </td>

                                        <td>
                                            <select wire:model='enseignant_id' class="form-control @error('enseignant_id') is-invalid @enderror">
                                                <option value="0">Enseignant</option>
                                                @foreach ($enseignants as $enseignant)
                                                    <option @selected($emploi->enseignant_id == $enseignant->id) value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                                                @endforeach   
                                            </select>
                                            <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                        </td>

                                        <td>
                                            <select wire:model='programme_id' class="form-control @error('programme_id') is-invalid @enderror">
                                                <option value="0">Programme</option>
                                                @foreach ($programmes as $programme)
                                                    <option @selected($emploi->programme_id == $programme->id) value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror </div>
                                        </td>

                                        <td>
                                            <select wire:model='promotion_id' class="form-control @error('promotion_id') is-invalid @enderror">
                                                <option value="0">Promotion</option>
                                                @foreach ($promotions as $promotion)
                                                    <option @selected($emploi->promotion_id == $promotion->id) value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                        </td>
                                        
                                        <td>
                                            <select wire:model='semestre_id' class="form-control @error('semestre_id') is-invalid @enderror">
                                                <option value="0">Semestre</option>
                                                @foreach ($semestres as $semestre)
                                                    <option @selected($emploi->semestre_id == $semestre->id) value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='annee_universitaire_id' class="form-control @error('annee_universitaire_id') is-invalid @enderror" required>
                                                <option value="0">Annee universitaire</option>
                                                @foreach ($annee_universitaires as $annee_universitaire)
                                                    <option @selected($emploi->annee_universitaire_id == $annee_universitaire->id) value="{{ $annee_universitaire->id }}" wire:key="{{ $annee_universitaire->id }}">{{ $annee_universitaire->annee_universitaire }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('annee_universitaire_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <input wire:model='salle' type="text" value="{{ $emploi->salle }}" placeholder="Salle..." class="form-control @error('salle') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('salle') {{ $message }} @enderror</div>
                                        </td>
                                        <td class="d-flex gap-1 justify-content-end">
                                            <button form='editemploi' type='submit' class="btn btn-primary p-1 py-0 fs-4"><i class="bi bi-pencil-square"></i></button>
                                            <button wire:click='cancel' class="btn btn-danger p-1 py-0 fs-4"><i class="bi bi-eraser"></i></button>
                                        </td>
                                    </form>
                                </tr>
                            {{-- fin du formulaire de modification  --}}
                            @else
                                <tr>
                                    <td>{{ $emploi->jour}}</td>
                                    <td>{{ $emploi->horaire}}</td>
                                    <td>{{ $emploi->matiere->matiere}}</td>
                                    <td>{{ $emploi->enseignant->prenom}} {{ $emploi->enseignant->nom}}</td>
                                    <td>{{ $emploi->programme->programme }}</td>
                                    <td>{{ $emploi->promotion->promotion }}</td>
                                    <td>{{ $emploi->semestre->semestre }}</td>
                                    <td>{{ $emploi->annee_universitaire->annee_universitaire }}</td>
                                    <td>{{ $emploi->salle }}</td>
                                    <td class="d-flex gap-1 justify-content-end ">
                                        <button wire:click="edit({{ $emploi->id }})" class="btn btn-primary p-1 py-0 fs-4">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button wire:click='delete({{ $emploi->id }})' class="btn btn-danger p-1 py-0 fs-4"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="11">
                                    <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                </td>
                            </tr>
                        @endforelse  
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->
        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{-- {{$emplois->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>