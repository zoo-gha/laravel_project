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
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="" for="nom">Nom de produit :</label>
                    <input type="text" class="form-control" name="nom"
                        placeholder="Nom de produit" value="{{ $product->nom }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="details">Details :</label>
                    <textarea type="text" class="form-control " name="details">{{ $product->details }}</textarea>
                        @error('details')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="description">Description :</label>
                    <textarea type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="price">Prix :</label>
                    <input type="number" class="form-control" name="price"
                        placeholder="prix" value="{{ $product->price }}"/>
                        @error('price')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="image">Photo :</label>
                    <input type="file" class="form-control " name="image" value="{{ $product->image }}" accept="image/png,image/jpeg"/>
                        @error('image')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="weight">Weight :</label>
                    <input type="text" class="form-control" name="weight"
                        placeholder="weight" value="{{ $product->weight }}"/>
                        @error('weight')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="category_id">Categorie :</label>
                    <select class="form-control"  name="category_id" value="{{ old('category_id') }}">

                        @foreach($categories as $id => $categoryName)
                            <option {{ $id === $product->category->id ? 'selected' : null }} value="{{ $id }}">{{ $categoryName }}</option>
                        @endforeach

                    </select>
                        @error('category_id')
                            <div class="invalid-feedback text-center">
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
