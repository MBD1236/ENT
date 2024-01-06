<div>
    <h3 class="page-title mt-2">Liste des étudiants inscrits / reinscrits</h3>

    @if(session('success'))
    <div class="alert alert-success mt-2">
        {{session('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <form>
                <div class="input-group">
                    <input wire:model.live.debounce.200ms="searchEtudiant" type="search" class="form-control" placeholder="Rechercher par ine,promotion...">
                </div>
            </form>
        </div>

    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INE</th>
                            <th>Departement</th>
                            <th>Programme</th>
                            <th>Promotion</th>
                            <th>Niveau</th>
                            <th>Session</th>
                            <th>Photo</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($inscriptions as $k => $inscription)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $inscription->etudiant->ine}}</td>
                            <td>{{ $inscription->programme->departement->departement}}</td>
                            <td>{{ $inscription->programme->nom}}</td>
                            <td>{{ $inscription->promotion->promotion}}</td>
                            <td>{{ $inscription->niveau->niveau}}</td>
                            <td>{{ $inscription->session->session}}</td>
                            <td><img width="50px" src="{{asset('storage/'.$inscription->etudiant->photo) }}" alt="">
                            </td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('scolarite.inscription.edit', $inscription) }}" class="btn btn-info"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                
                                <button wire:click='delete({{ $inscription->id }})' class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-info">Aucune donnée ne correspond à cette recherche !</div>
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
                        {{$inscriptions->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>