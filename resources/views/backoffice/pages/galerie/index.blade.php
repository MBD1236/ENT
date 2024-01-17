@extends('backoffice.home')

@section('title', 'Liste des galeries')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="pagetitle">
    <h1>@yield('title')</h1>
</div>

<div class="card mt-2">
    <div class="card-body py-2 px-2">
        <div class="d-flex flex-row justify-end mt-2">
            <a href="{{ route('admin.galerie.create') }}" class="btn btn-primary mt-1"><i class="bi bi-plus-lg"></i>
            <span>Ajouter un galerie</span></a>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered mb-0">
                <tbody>
                    @foreach ($galeries as $k => $galerie )
                    <tr>
                        <th>{{ $k+1 }}</th>
                        @foreach ($galerie->images as $image)
                            <td><img width="20px" src="{{asset('storage/'.$image->imagePath) }}" alt=""></td>                         
                        @endforeach
                        <td class="d-flex gap-1 justify-content-end ">
                            <a href="{{ route('admin.galerie.edit', $galerie) }}" class="btn btn-info p-1 py-lg-0 py-0 p-lg-1 fs-4"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.galerie.destroy', $galerie)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger p-1 py-0 fs-4"><i class="fa fa-trash"></i></button>
                            </form>
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
                    {{$galeries->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
