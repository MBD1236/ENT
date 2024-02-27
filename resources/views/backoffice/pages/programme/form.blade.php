@extends('backoffice.home')

@section('title', $programme->exists ? 'Editer un programme/filiere': 'Ajouter un programme/filiere')

@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
</div>
<div class="card mt-2">
    <div class="card-body col-lg-10 m-auto">
        <form class="vstack mt-4  gap-2" action="{{ $programme->id ? route('admin.programme.update',  $programme) : route('admin.programme.store') }}" method="post" enctype="multipart/form-data">

            @method($programme->exists ? 'put' : 'post')
            @csrf

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                    <div class="form-floating">
                        <input class="form-control @error('programme') is-invalid @enderror" type="text" name="programme" id="floatingprogramme" placeholder="Nom du programme" value="{{old('programme', $programme->programme)}}">
                        <label for="floatingprogramme">Programme / Fileres</label>
                        <div class="invalid-feedback">@error('programme') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 my-2">            
                    <div class="form-group">           
                        <select name="departement_id" id="floatingdepartment_id" class="py-3 form-select @error('departement_id') is-invalid @enderror">
                            <option value="">Sélectionner un departement</option>
                            @foreach($departements as $key => $departement)
                                <option @selected(old('departement_id', $programme->departement_id == $departement->id)) value="{{$departement->id}}" class="py-2">{{ $departement->departement}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('departement_id') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                @if ($programme->id) Modifier un programme
                @else Créer un nouveau programme
                @endif
            </button>
        </form>
    </div>
</div>
@endsection
