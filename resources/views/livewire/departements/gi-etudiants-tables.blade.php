<div>
    <h2 class="page-title">
        <span style="text-transform:uppercase">Liste des etudiants du departement Génie Informatique</span>
    </h2>

    <div class="row mt-1">
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-pink">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-eye-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Etudiants</h6>
                    <h2 class="my-2">{{ $etudiants->count() }}</h2>
                    <p class="mb-0">
                        <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-wallet-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Niveaux</h6>
                    <h2 class="my-2">{{ $niveaux->count() }}</h2>
                    <p class="mb-0">
                        <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-info">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-shopping-basket-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Promotions</h6>
                    <h2 class="my-2">753</h2>
                    <p class="mb-0">
                        <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-primary">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-group-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Programmes</h6>
                    <h2 class="my-2">{{ $programmes->count() }}</h2>
                    <p class="mb-0">
                        <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
        </div> <!-- end col-->
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="row mb-1">

                <div class="col-md-2">
                      <select class="form-control" type="search" wire:model.live='niveau'>
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
                    <select class="form-control" type="search" wire:model.live='searchProgramme'>
                        <option value="0">Filtrer par programme</option>
                        @foreach ($programmes as $programme)
                        <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2"><button class="btn btn-info" wire:click="generatePDF">Imprimer la liste</button></div>

            </div>
            <div class="bg-primary p-2 white-bg"><span style="color: white">Information sur les etudiants</span></div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered table-bordered mb-0">
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
