<div>
    <div class="mb-1 card">
        <div class="row m-auto">
            <div class="pagetitle card-header my-2">
                <h1>Liste des enseignants du département Génie Informatique</h1>
            </div>
        </div>

        <div class="card-body mt-4">
            <div class="row col-10 m-auto">
                {{-- pour rechercher dans la table --}}
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <input type="search" name="search" class="form-control" placeholder="Rechercher ici ..." wire:model.debounce.500ms="search">
                    
                </div>

                {{-- pour sélectionner un département --}}
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <select class="form-select" type="search" wire:model.live="searchDepartement">
                        <option value="0">Sélectionner un département</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}" wire:key="{{ $departement->id}}">{{ $departement->departement }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enseignants as $k => $enseignant)
                            <tr wire:key="{{ $enseignant->id }}">
                                <td>{{ $k+1 }}</td>
                                <td>{{ $enseignant->matricule}}</td>
                                <td>{{ $enseignant->nom}}</td>
                                <td>{{ $enseignant->prenom}}</td>
                                <td>{{ $enseignant->telephone}}</td>
                                <td>{{ $enseignant->email}}</td>
                                <td>{{ $enseignant->adresse}}</td>
                                <td><img width="40px" height="30px" src="{{asset('storage/'.$enseignant->photo) }}" alt="Mr/Mme"></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
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
                <div class="col-sm-12 col-md-6 col-lg-6 align-items-start">
                    <p> <strong>Affichage de </strong>{{ $enseignants->firstItem() }} - {{ $enseignants->lastItem() }}<strong> sur </strong>{{ $enseignants->total() }}<strong> éléments </strong> </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $enseignants->links('livewire.pagination.bootstrap') }}
                        </ul>
                    </nav>
                </div>
            </div>  
        </div>
    </div>
</div>
