<div>
    <h2 class="page-title">
        <span class="text-uppercase">Liste des matières du departement Génie Informatique</span>
    </h2>
        
    <div class="row ">
            <div class="col-md-2">
                <select class="form-control" type="search" wire:model.live='semestre'>
                    <option value="0">Filtrer par un semestre</option>
                    @foreach ($semestres as $semestre)
                        <option value="{{ $semestre->id }}">{{ $semestre->semestre }}</option>
                    @endforeach
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
    <div class="card mt-1">
        <div class="card-body">
        <div class="bg-primary p-2 white-bg"><span style="color: white">Information sur les matières</span></div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered table-bordered mb-0">
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
                                <td>{{ $k+1 }}</td>
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