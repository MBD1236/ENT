@extends('backoffice.home')

@section('title', $session->id ? "Edition de la '$session->session'" : "Ajout d'une session")

@section('content')
<div class="card m-4">
    <h3 class="page-title text-center f-400 fs-3">@yield('title')</h3>
    <div class="card-body col-lg-10 m-auto">
        <form action="{{ $session->id ? route('admin.session.update', $session) : route('admin.session.store')}}" method="post" class="vstack gap-2">
            @method($session->id ? "put" : "post")
            @csrf
            <div class="col-12">
                <div class="form-floating">
                    <input class="form-control @error('session') is-invalid @enderror" type="text" name="session" id="floatingsession" placeholder="session" value="{{old('session', $session->session)}}">
                    <label for="floatingsession">Sessions</label>
                    <div class="invalid-feedback">@error('session') {{ $message }} @enderror</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                @if ($session->id) Modifier une session
                @else Ajouter une session
                @endif
            </button>
        </form>
    </div>
</div>
@endsection