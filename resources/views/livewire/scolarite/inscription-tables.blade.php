<div>
    <div class="pagetitle">
         <h1 class=" mt-2">Liste des étudiants inscrits / reinscrits</h1>
    </div>
    @if(session('success'))
    <div class="alert alert-success mt-2">
        {{session('success')}}
    </div>
    @endif

    <div class="row mt-4">
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
                <table class="table table-hover table-bordered mb-0 mt-4">
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
                            <th>{{ $k+1 }}</th>
                            <td>{{ $inscription->etudiant->ine}}</td>
                            <td>{{ $inscription->programme->departement->departement}}</td>
                            <td>{{ $inscription->programme->nom}}</td>
                            <td>{{ $inscription->promotion->promotion}}</td>
                            <td>{{ $inscription->niveau->niveau}}</td>
                            <td>{{ $inscription->session->session}}</td>
                            <td><img width="50px" src="{{asset('storage/'.$inscription->etudiant->photo) }}" alt="">
                            </td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('scolarite.inscription.edit', $inscription) }}" class="btn btn-primary p-1 py-lg-0 py-0 p-lg-1 fs-4"><i
                                        class="bi bi-pencil-square"></i></a>
                                
                                <button wire:click='delete({{ $inscription->id }})' class="btn btn-danger p-1 py-lg-0 py-0 p-lg-1 fs-4"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-primary">Aucune donnée ne correspond à cette recherche !</div>
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