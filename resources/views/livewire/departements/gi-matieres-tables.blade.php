<div>
    <div class="pagetitle">
        <h1>Liste des matières du departement Génie Informatique</h1>
    </div>
        
        <div class="row mt-4">
                <div class="col-md-2">
                    <select class="form-select" type="search" wire:model.live='semestre'>
                        <option value="0">semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" type="search" wire:model.live='searchProgramme'>
                        <option value="0">programme</option>
                        @foreach ($programmes as $programme)
                        <option value="{{ $programme->id }}" wire:key="{{ $programme->id }}">{{ $programme->nom }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
    <div class="card mt-1">
        <div class="card-body">
            <div class="table-responsive-sm">
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

                        @forelse ($matieres as $k => $matiere)
                            <tr>
                                <th>{{ $k+1 }}</th>
                                <td>{{ $matiere->matiere}}</td>
                                <td>{{ $matiere->programme->nom}}</td>
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
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$matieres->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>