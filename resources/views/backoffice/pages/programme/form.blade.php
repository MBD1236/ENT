@extends('backoffice.home')

@section('title', $programme->id ? "Edition du '$programme->nom'" : "Ajout d'un programme")

@section('content')
<div class="pagetitle"><h1>@yield('title')</h1></div>
<div class="card container">
    <div class="card-body">
        <form action="{{ $programme->id ? route('admin.programme.update', $programme) : route('admin.programme.store')}}" method="post" class="vstack gap-2">
            @method($programme->id ? "put" : "post")
            @csrf

            <div class="col-12 mt-4">
                <div class="form-floating">
                    <input type="text" name="nom" id="floatingnom" value="{{old('nom', $programme->nom)}}" class="form-control @error('nom') is-invalid @enderror">
                    <label for="floatingnom">programme</label>
                    <div class="invalid-feedback">@error('nom') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-floating">
                    <select name="departement_id" id="floatingdepartement" class="form-select @error('departement_id') is-invalid @enderror">
                        <option value=""></option>
                        @foreach($departements as $departement)
                            <option @selected(old('departement_id', $programme->departement_id == $departement->id)) value="{{$departement->id}}">{{ $departement->departement}}</option>
                        @endforeach
                    </select>
                    <label for="floatingdepartement">departements</label>
                    <div class="invalid-feedback">@error('departement_id') {{ $message }} @enderror</div>
                </div>
            </div>

            <button type="submit " class="btn btn-primary">
                @if ($programme->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>

@endsection