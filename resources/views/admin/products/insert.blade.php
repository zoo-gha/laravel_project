@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Produit</h6>
            <button type="button" onclick="location.href='{{ route('products.index') }}' " class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="" for="nom">Nom de produit :</label>
                    <input type="text" class="form-control" name="nom"
                        placeholder="Nom de produit" value="{{ old('nom') }}"/>
                        @error('nom')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="details">Details :</label>
                    <textarea type="text" class="form-control " name="details">{{ old('details') }}</textarea>
                        @error('details')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="description">Description :</label>
                    <textarea type="text" class="form-control" name="description"
                         >{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="price">Prix :</label>
                    <input type="number" class="form-control" name="price"
                        placeholder="prix" value="{{ old('price') }}"/>
                        @error('price')
                            <div class="intext-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="image">Photo :</label>
                    <input type="file" class="form-control " name="image"
                        placeholder="photo" accept="image/png,image/jpeg"/>
                        @error('image')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="weight">Weight :</label>
                    <input type="text" class="form-control" name="weight"
                        placeholder="weight" value="{{ old('weight') }}"/>
                        @error('weight')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="category_id">Categorie :</label>
                    <select class="form-control "  name="category_id" value="{{ old('category_id') }}">
                        @foreach($categories as $id => $categoryName)
                                <option value="{{ $id }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>
                        @error('category_id')
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
