@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catégories Blog</h6>
            <button type="button" onclick="location.href='{{ route('blogCategories.index')}} ' " class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form action="{{ route('blogCategories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="" for="name">Nom de catégorie :</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="Nom de catégorie" value="{{ old('name') }}"/>
                    @error('name')
                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
