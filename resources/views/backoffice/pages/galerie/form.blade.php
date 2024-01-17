@extends('backoffice.home')

@section('title', $galerie->exists ? 'Editer une/des image(s)' : 'Ajouter une/des image(s)')

@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
</div>
<div class="card mt-3">
    <div class="card-body col-lg-10 m-auto">
        <form class="vstack gap-2" action="{{ route($galerie->exists ? 'admin.galerie.update': 'admin.galerie.store', $galerie) }}" method="post" enctype="multipart/form-data">

            @method($galerie->exists ? 'put' : 'post')
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="floatingname" placeholder="name" value="{{ old('name', $galerie->name) }}">
                        <label for="floatingname">Nom de la galerie</label>
                        <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input class="form-control @error('images') is-invalid @enderror" type="file" name="images[]" id="floatingimages" placeholder="images" multiple>
                        <label for="floatingimages">Téléverser des images</label>
                        <div class="invalid-feedback">@error('images') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary fs-4 m-1">
                @if ($galerie->exists) Modifier une/des image(s)
                @else Téléverser une/des image(s)
                @endif
            </button>
        </form>
    </div>
</div>

@endsection
