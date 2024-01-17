@extends('backoffice.home')

@section('title', $promotion->id ? "Edition de la '$promotion->promotion'" : "Ajout d'une promotion")

@section('content')
<div class="pagetitle"><h1>@yield('title')</h1></div>
<div class="card container">
    <div class="card-body">
        <form action="{{ $promotion->id ? route('admin.promotion.update', $promotion) : route('admin.promotion.store')}}" method="post" class="vstack gap-2">
            @method($promotion->id ? "put" : "post")
            @csrf
            
            <div class="col-12 mt-4">
                <div class="form-floating">
                    <input class="form-control @error('promotion') is-invalid @enderror type="text" name="promotion" id="floatingpromotion" placeholder="promotion" value="{{old('promotion', $promotion->promotion)}}">
                    <label for="floatingpromotion">Promotions</label>
                    <div class="invalid-feedback">@error('promotion') {{ $message }} @enderror</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                @if ($promotion->id) Modifier
                @else Créer
                @endif
            </button>
        </form>
    </div>
</div>
@endsection