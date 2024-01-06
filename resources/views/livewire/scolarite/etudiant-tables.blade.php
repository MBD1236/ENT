<div class="mt-2">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
    @endif
    <div class="row">
        
        <div class="col-md-3">
                    <input value="" wire:model.live.debounce.200ms='searchIne' type="search" class="form-control"
                        placeholder="Rechercher un etudiant(e) par INE ">
        </div>
        <div class="col-md-4">

                <form action="" wire:submit.prevent='importer'>
                    <div class="input-group">
                        <input type="file" wire:model='fichier' class="form-control @error('fichier') is-invalid @enderror" wire:focus.live.debounce.1ms='clearStatus'>
                        <div class="invalid-feedback">@error('fichier') {{ $message }} @enderror</div>

                        <button type="submit" class="btn btn-primary">
                            Importer
                        </button>
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
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>PV</th>
                            <th>INE</th>
                            <th class="text-end">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $etudiants as $k => $etudiant)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $etudiant->nom}}</td>
                            <td>{{ $etudiant->prenom}}</td>
                            <td>{{ $etudiant->email}}</td>
                            <td>{{ $etudiant->pv}}</td>
                            <td>{{ $etudiant->ine}}</td>
                            <td class="d-flex gap-2 justify-content-end w-100">
                                <a href="{{ route('scolarite.etudiant.edit', $etudiant) }}" class="btn btn-info"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                
                                    <button class="btn btn-danger" wire:click='delete({{ $etudiant->id }})'><i class="fa fa-trash"></i></button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div> <!-- end card body-->
        <div class="card-footer mt-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <ul class="pagination-rounded">
                        {{$etudiants->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>