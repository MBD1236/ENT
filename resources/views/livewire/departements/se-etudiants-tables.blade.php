<div>
    <div class="pagetitle">
        <h1>
            Liste des etudiants du departement Sciences des Energies
        </h1>
    </div>

    <div class="mb-1 card">
        <div class="card-body mt-4">
            <div class="row ">
                <div class="col-md-2">
                    <select class="form-select" type="search" wire:model.live='niveau'>
                        <option value="0">Filtrer par un niveau</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
              </div>
      
              <div class="col-md-2">
                    <input  type="text" class="form-control" placeholder="Filtrer par la session"
                      wire:model.debounce.900ms.live="session">
              </div>
              <div class="col-md-2">
                  <select class="form-select" type="search" wire:model.live='searchProgramme'>
                      <option value="0">Filtrer par programme</option>
                      @foreach ($programmes as $programme)
                      <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                      @endforeach
                  </select>
              </div>
      
              <div class="col-md-4">
                  <button class="btn btn-primary" wire:click="generatePDF">
                      <i class="bi bi-file-pdf"></i>
                      <span>Télecharger la liste(Pour impression)</span>
                  </button>
              </div>
              <div class="col-md-2"><a href="{{ route('genieinfo.pdf') }}">imprime</a></div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INE</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Niveau</th>
                            <th>Promotion</th>
                            <th>Programme</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($etudiants as $k => $etudiant)
                        <tr wire:key="{{ $etudiant->id }}">
                            <td>{{ $k+1 }}</td>
                            <td>{{ $etudiant->etudiant->ine}}</td>
                            <td>{{ $etudiant->etudiant->nom}}</td>
                            <td>{{ $etudiant->etudiant->prenom}}</td>
                            <td>{{ $etudiant->niveau->niveau}}</td>
                            <td>{{ $etudiant->promotion->promotion}}</td>
                            <td>{{ $etudiant->programme->nom}}</td>

                        </tr>
                        @empty
                        <div class="alert alert-info">Aucune donnée ne correspond à cette recherche !</div>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{-- {{$etudiants->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

