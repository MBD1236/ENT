@extends('backoffice.home')

@section('title', $promotion->id ? "Edition de la '$promotion->promotion'" : "Ajout d'une promotion")

@section('content')
<div class="card container">
    <div class="card-body">
        <form action="{{ $promotion->id ? route('admin.promotion.update', $promotion) : route('admin.promotion.store')}}" method="post" class="vstack gap-2">
            @method($promotion->id ? "put" : "post")
            @csrf
            
            <div class="form-group">
                <label for="promotion">Promotion</label>
                <input type="text" name="promotion" id="promotion" value="{{old('promotion', $promotion->promotion)}}" class="form-control @error('promotion') is-invalid @enderror">
                <div class="invalid-feedback">@error('promotion') {{ $message }} @enderror</div>
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