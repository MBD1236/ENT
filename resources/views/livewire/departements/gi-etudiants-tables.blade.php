<div>
    <div class="pagetitle  py-3 text-center">
        <h1>Liste de tous les étudiants</h1>
    </div>

    <div class="mb-0 card">
        <div class="card-body mt-4">
            <div class="row ">               
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
                <div class="col-md-6 col-lg-2 col-sm-12 my-2 text-end">
                    <button class="btn btn-primary" wire:click="generatePDF">
                        <i class="bi bi-file-pdf"></i>
                        <span>Télecharger</span>
                    </button>
                </div>
                <div class="col-md-6 col-lg-2 col-sm-12 my-2">
                    <a href="{{ route('genieinfo.pdf') }}" class="btn btn-light">Imprimer</a>
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
                            <th>Prenom</th>
                            <th>Session</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Programme</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($etudiants as $k => $etudiant)
                            <tr wire:key="{{ $etudiant->id }}">
                                <td>{{ $k+1 }}</td>
                                <td>{{ $etudiant->ine}}</td>
                                <td>{{ $etudiant->nom}}</td>
                                <td>{{ $etudiant->prenom}}</td>
                                <td>{{ $etudiant->session}}</td>
                                <td>{{ $etudiant->telephone}}</td>
                                <td>{{substr( $etudiant->email, 0,10)}}...</td>
                                <td>{{ $etudiant->programme}}</td>
                                <td><img width="40px" height="30px" src="{{asset('storage/'.$etudiant->photo) }}" alt="Mr/Mme"></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-info text-center fs-6 fw-bold">Aucune donnée ne correspond à cette recherche !</div>
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
                        {{-- {{$etudiants->links()}} --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>