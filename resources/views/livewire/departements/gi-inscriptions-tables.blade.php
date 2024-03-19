<div>
    <div class="pagetitle my-3 text-center fw-bold">
        <h1>
            Liste des étudiants inscrits
        </h1>
    </div>

    <div class="mb-0 card">
        <div class="card-body mt-4">
            <div class="row ">
                <div class="col-md-4 col-lg-4 col-sm-12 my-2">
                    <select class="form-select" type="search" wire:model.live='niveau'>
                        <option value="0">Filtrer par niveaux</option>
                        @foreach ($niveaux as $niveau)
                            <option value="{{ $niveau->id }}" wire:key="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 my-2">
                    <select class="form-select" type="search" wire:model.live='searchProgramme'>
                        <option value="0">Filtrer par programmes</option>
                        @foreach ($programmes as $programme)
                            <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 col-lg-2 col-sm-12 my-2 text-end">
                    <button class="btn btn-primary" wire:click="generatePDF">
                        <i class="bi bi-file-pdf"></i>
                        <span>Télecharger</span>
                    </button>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 my-2">
                    <a href="{{ route('genieinfo.pdf') }}" class="btn btn-light">Imprimer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 col-sm-12 my-2 d-flex flex-row">
                    <input  type="text" class="form-control" placeholder="Research by session..." wire:model.debounce.900ms.live="session">
                    @if (!$session)
                        <span class="bntSearch"><i class="bi bi-search"></i></span>
                    @endif
                </div>
                <div class="col-md-6 col-lg-5 col-sm-12 my-2 d-flex flex-row">
                    <input type="search" name="search" class="form-control" placeholder="Research by any field.." wire:model.debounce.500ms.live="search">
                    @if (!$search)
                        <span class="bntSearch"><i class="bi bi-search"></i></span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tableau" class="table table-hover table-centered table-bordered mb-0 mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INE</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Niveau</th>
                            <th>Session</th>
                            <th>Promotion</th>
                            <th>Programme</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inscriptions as $k => $inscription)
                            <tr wire:key="{{ $inscription->id }}">
                                <td>{{ $k+1 }}</td>
                                <td>{{ $inscription->etudiant->ine}}</td>
                                <td>{{ $inscription->etudiant->nom}}</td>
                                <td>{{ $inscription->etudiant->prenom}}</td>
                                <td>{{ $inscription->niveau->niveau}}</td>
                                <td>{{ $inscription->session->session}}</td>
                                <td>{{ $inscription->promotion->promotion}}</td>
                                <td>{{ $inscription->programme->programme}}</td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="8">
                                    <div class="alert alert-info text-center fw-bold">Aucune donnée ne correspond à cette recherche !</div>
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
                        {{-- {{$inscriptions->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>