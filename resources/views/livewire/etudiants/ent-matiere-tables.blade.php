<div>
    <div class="mb-1 card">
        <div class="row m-auto">
            <div class="pagetitle card-header my-2">
                <h1>Liste des matières du département</h1>               
            </div>
        </div>

        <div class="card-body mt-4">
            <div class="row col-12 m-auto">
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <select class="form-select" type="search" wire:model.live='semestre'>
                        <option value="0">Selectionner un semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <select class="form-select" type="search" wire:model.live='searchProgramme'>
                        <option value="0">Selectionner un programme</option>
                        @foreach ($programmes as $programme)
                        <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->programme }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <input type="search" name="search" class="form-control" placeholder="Rechercher ici ..." wire:model.debounce.500ms="search">
                </div>
                
            </div>
            
        </div>
    </div>
        
    <div class="card mt-1 py-4">
        <div class="card-body">
            <!-- Section Licence 1 -->
            <p class="licence">
                <a class="btn btn-primary fs-5" data-bs-toggle="collapse" href="#collapseLicence1" role="button" aria-expanded="false" aria-controls="collapseLicence1">
                    <i class="bi bi-plus-circle me-2"></i>Licence 1
                </a>
            </p>
            <div class="collapse collapse-horizontal" id="collapseLicence1">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <!-- Tableau pour Licence 1 -->
                        <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Matières</th>
                                    <th>Programmes</th>
                                    <th>Semestre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($matieresLicence1 as $k => $matiere)
                                    <tr>
                                        <th>{{ $k+1 }}</th>
                                        <td>{{ $matiere->matiere}}</td>
                                        <td>{{ $matiere->programme->programme}}</td>
                                        <td>{{ $matiere->semestre->semestre}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div>        
            <!-- Section Licence 2 -->
            <p class="licence">
                <a class="btn btn-primary fs-5" data-bs-toggle="collapse" href="#collapseLicence2" role="button" aria-expanded="false" aria-controls="collapseLicence2">
                    <i class="bi bi-plus-circle me-2"></i> Licence 2
                </a>
            </p>
            <div class="collapse" id="collapseLicence2">
                <div class="card card-body">
                    <div class="table-responsive-sm">
                        <!-- Tableau pour Licence 2 -->
                            <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matières</th>
                                        <th>Programmes</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($matieresLicence2 as $k => $matiere)
                                        <tr>
                                            <th>{{ $k+1 }}</th>
                                            <td>{{ $matiere->matiere}}</td>
                                            <td>{{ $matiere->programme->programme}}</td>
                                            <td>{{ $matiere->semestre->semestre}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div>
             <!-- Section Licence 3 -->
            <p class="licence">
                <a class="btn btn-primary fs-5" data-bs-toggle="collapse" href="#collapseLicence3" role="button" aria-expanded="false" aria-controls="collapseLicence3">
                    <i class="bi bi-plus-circle me-2"></i> Licence 3
                </a>
            </p>
            <div class="collapse" id="collapseLicence3">
                <div class="card card-body">
                    <div class="table-responsive-sm">
                        <!-- Tableau pour Licence 2 -->
                            <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matières</th>
                                        <th>Programmes</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($matieresLicence3 as $k => $matiere)
                                        <tr>
                                            <th>{{ $k+1 }}</th>
                                            <td>{{ $matiere->matiere}}</td>
                                            <td>{{ $matiere->programme->programme}}</td>
                                            <td>{{ $matiere->semestre->semestre}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div>
             <!-- Section Licence 4 -->
            <p class="licence">
                <a class="btn btn-primary fs-5" data-bs-toggle="collapse" href="#collapseLicence4" role="button" aria-expanded="false" aria-controls="collapseLicence4">
                    <i class="bi bi-plus-circle me-2"></i> Licence 4
                </a>
            </p>
            <div class="collapse" id="collapseLicence4">
                <div class="card card-body">
                    <div class="table-responsive-sm">
                        <!-- Tableau pour Licence 2 -->
                            <table class="table table-hover table-centered table-bordered mb-0 mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matières</th>
                                        <th>Programmes</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($matieresLicence4 as $k => $matiere)
                                        <tr>
                                            <th>{{ $k+1 }}</th>
                                            <td>{{ $matiere->matiere}}</td>
                                            <td>{{ $matiere->programme->programme}}</td>
                                            <td>{{ $matiere->semestre->semestre}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <div class="alert alert-info text-center">Aucune donnée ne correspond à cette recherche !</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div>
        </div>

        {{-- <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 align-items-start">
                    <p> <strong>Affichage de </strong>{{ $matieres->firstItem() }} - {{ $matieres->lastItem() }}<strong> sur </strong>{{ $matieres->total() }}<strong> éléments </strong> </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $matieres->links('livewire.pagination.bootstrap') }}
                        </ul>
                    </nav>
                </div>
            </div>  
        </div> --}}
    </div>
    
</div>