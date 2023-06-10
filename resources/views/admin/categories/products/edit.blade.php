@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catégorie</h6>
            <button type="button" onclick="location.href='{{route('categories.index')}}" class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form action="{{route('categories.update', $category)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="" for="name">Nom de catégorie :</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="Nom de produit" value="{{ $category->name }}"/>
                        @error('name')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="image">Photo :</label>
                    <input type="file" class="form-control " name="image"
                        value="{{ $category->image }}" accept="image/png,image/jpeg"/>
                        @error('image')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
