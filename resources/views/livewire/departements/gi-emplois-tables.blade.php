<div>
    <div class="pagetitle">
        <h1>Emploi du Temps Global du departement Génie Informatique</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="row mb-1 mt-4">
        <div class="col-md-2">
            <select class="form-select" wire:model.live='niveau'>
                <option value="0">niveau</option>
                @foreach ($niveaux as $niv)
                <option value="{{ $niv->id }}">{{ $niv->niveau }}</option>
                @endforeach
                <!-- Ajoutez d'autres options en fonction de vos niveaux -->
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-select" wire:model.live='session'>
                <option value="0">Filtrer par une session</option>
                @foreach ($sessions as $i)
                <option value="{{ $i->id }}">{{ $i->session }}</option>
                @endforeach
                <!-- Ajoutez d'autres options en fonction de vos niveaux -->
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" type="search" wire:model.live='searchProgramme'>
                <option value="0">Filtrer par programme</option>
                @foreach ($programmes as $programme)
                <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>Horaires</th>
                            <th>Jours</th>
                            <th>Matières</th>
                            <th>Professeurs</th>
                            <th>Programme</th>
                            <th>Promotion</th>
                            <th>Niveau</th>
                            <th>Semestre</th>
                            <th>Session</th>
                            <th>Salle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($emplois as $k => $emploi)
                            @if ($editingId === $emploi->id)
                            {{-- Debut du formulaire de modification --}}
                                <tr wire:key='{{ $emploi->id }}'>
                                    <form action="" wire:submit.prevent='update' id="editemploi">
                                        <td>
                                            <input type="text" wire:model='horaire'
                                                value="{{ $emploi->horaire}}" class="form-control @error('horaire') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('horaire') {{ $message }} @enderror</div>
                                        </td>
        
                                        <td>
                                            <input wire:model='jour' type="text" value="{{ $emploi->jour }}" class="form-control @error('jour') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('jour') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='matiere_id'
                                                class="form-control @error('matiere_id') is-invalid @enderror">
                                                <option value="0">Matière</option>
                                                @foreach ($matieres as $matiere)
                                                <option @selected($emploi->matiere_id == $matiere->id) value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                                @endforeach
        
                                            </select>
                                            <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='enseignant_id'
                                                class="form-control @error('enseignant_id') is-invalid @enderror">
                                                <option value="0">Enseignant</option>
                                                @foreach ($enseignants as $enseignant)
                                                <option @selected($emploi->enseignant_id == $enseignant->id) value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{
                                                    $enseignant->nom }}</option>
                                                @endforeach
        
                                            </select>
                                            <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='programme_id'
                                                class="form-control @error('programme_id') is-invalid @enderror">
                                                <option value="0">programme</option>
                                                @foreach ($programmes as $programme)
                                                <option @selected($emploi->programme_id == $programme->id) value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror
                                            </div>
                                        </td>
                                        <td>
                                            <select wire:model='promotion_id'
                                                class="form-control @error('promotion_id') is-invalid @enderror">
                                                <option value="0">Promotion</option>
                                                @foreach ($promotions as $promotion)
                                                <option @selected($emploi->promotion_id == $promotion->id) value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='niveau_id' class="form-control @error('niveau_id') is-invalid @enderror">
                                                <option value="0">Niveau</option>
                                                @foreach ($niveaux as $niv)
                                                <option @selected($emploi->niveau_id == $niv->id) value="{{ $niv->id }}" wire:key="{{ $niv->id }}">{{ $niv->niveau }}</option>
                                                @endforeach
                                                <!-- Ajoutez d'autres options en fonction de vos niveaux -->
                                            </select>
                                            <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='semestre_id'
                                                class="form-control @error('semestre_id') is-invalid @enderror">
                                                <option value="0">Semestre</option>
                                                @foreach ($semestres as $semestre)
                                                <option @selected($emploi->semestre_id == $semestre->id) value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                                @endforeach
                                                <!-- Ajoutez d'autres options en fonction de vos niveaux -->
                                            </select>
                                            <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <select wire:model='session_id'
                                                class="form-control @error('session_id') is-invalid @enderror" required>
                                                <option value="0">Session</option>
                                                @foreach ($sessions as $i)
                                                <option @selected($emploi->session_id == $i->id) value="{{ $i->id }}" wire:key="{{ $i->id }}">{{ $i->session }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">@error('session_id') {{ $message }} @enderror</div>
                                        </td>
                                        <td>
                                            <input wire:model='salle' type="text" value="{{ $emploi->salle }}" class="form-control @error('salle') is-invalid @enderror">
                                            <div class="invalid-feedback">@error('salle') {{ $message }} @enderror</div>
                                        </td>
                                        <td class="text-end">
                                            <button form='editemploi' type='submit' class="btn btn-info p-1 py-0 fs-4 mb-1">Modifier</button>
                                            <button wire:click='cancel' class="btn btn-danger p-1 py-0 fs-4">Annuler</button>
                                        </td>
        
                                    </form>
                                </tr>
                            {{-- fin du formulaire de modification  --}}
                            @else
                                <tr>

                                    <td>{{ $emploi->horaire}}</td>
                                    <td>{{ $emploi->jour}}</td>
                                    <td>{{ $emploi->matiere->matiere}}</td>
                                    <td>{{ $emploi->enseignant->prenom}} {{ $emploi->enseignant->nom}}</td>
                                    <td>{{ $emploi->programme->nom }}</td>
                                    <td>{{ $emploi->promotion->promotion }}</td>
                                    <td>{{ $emploi->niveau->niveau }}</td>
                                    <td>{{ $emploi->semestre->semestre }}</td>
                                    <td>{{ $emploi->session->session }}</td>
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


                        <!-- Formulaire d'ajout d'une nouvelle ligne (initiallement caché) -->
                        @if ($addline)
                        <tr>
                            <form action="" wire:submit.prevent='save' id="addemploi">
                                @csrf
                                <td>
                                    <input type="text" wire:model="horaire" required
                                        class="form-control @error('horaire') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                                    <div class="invalid-feedback">@error('horaire') {{ $message }} @enderror</div>
                                </td>

                                <td>
                                    <input type="text" wire:model="jour" required class="form-control @error('jour') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('jour') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="matiere_id" id=""
                                        class="form-select @error('matiere_id') is-invalid @enderror">
                                        <option value="0">Matière</option>
                                        @foreach ($matieres as $matiere)
                                        <option value="{{ $matiere->id }}">{{ $matiere->matiere }}</option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback">@error('matiere_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="enseignant_id" id=""
                                        class="form-select @error('enseignant_id') is-invalid @enderror">
                                        <option value="0">Enseignant</option>
                                        @foreach ($enseignants as $enseignant)
                                        <option value="{{ $enseignant->id }}" wire:key="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{
                                            $enseignant->nom }}</option>
                                        @endforeach

                                    </select>
                                    <div class="invalid-feedback">@error('enseignant_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="programme_id" id=""
                                        class="form-select @error('programme_id') is-invalid @enderror">
                                        <option value="0">programme</option>
                                        @foreach ($programmes as $programme)
                                        <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('programme_id') {{ $message }} @enderror
                                    </div>
                                </td>
                                <td>
                                    <select wire:model="promotion_id" id=""
                                        class="form-select @error('promotion_id') is-invalid @enderror">
                                        <option value="0">Promotion</option>
                                        @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->id }}" wire:key="{{ $promotion->id }}">{{ $promotion->promotion }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('promotion_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="niveau_id" required
                                        class="form-select @error('niveau_id') is-invalid @enderror">
                                        <option value="0">Niveau</option>
                                        @foreach ($niveaux as $niv)
                                        <option value="{{ $niv->id }}" wire:key="{{ $niv->id }}">{{ $niv->niveau }}</option>
                                        @endforeach
                                        <!-- Ajoutez d'autres options en fonction de vos niveaux -->
                                    </select>
                                    <div class="invalid-feedback">@error('niveau_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="semestre_id" required
                                        class="form-select @error('semestre_id') is-invalid @enderror">
                                        <option value="0">Semestre</option>
                                        @foreach ($semestres as $semestre)
                                        <option value="{{ $semestre->id }}" wire:key="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                                        @endforeach
                                        <!-- Ajoutez d'autres options en fonction de vos niveaux -->
                                    </select>
                                    <div class="invalid-feedback">@error('semestre_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <select wire:model="session_id"
                                        class="form-select @error('session_id') is-invalid @enderror" required>
                                        <option value="0">Session</option>
                                        @foreach ($sessions as $i)
                                        <option value="{{ $i->id }}" wire:key="{{ $i->id }}">{{ $i->session }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">@error('session_id') {{ $message }} @enderror</div>
                                </td>
                                <td>
                                    <input type="text" wire:model="salle" required class="form-control @error('salle') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('salle') {{ $message }} @enderror</div>
                                </td>

                            </form>
                        </tr>
                        <!-- fin du formulaire d'ajout -->
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-between mt-1">
                    <button wire:click="toggleForm" class="btn btn-link">Ajouter une ligne</button>
                    @if ($addline)
                    <button form="addemploi" type="submit" class="btn btn-primary">Enregistrer</button>
                    @endif

                </div>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$emplois->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
</div>