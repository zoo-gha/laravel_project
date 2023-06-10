@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
            <button type="button" onclick="location.href='{{ route('blogs.index') }}' " class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form action="{{ route('blogs.update', $blog)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="" for="title">Nom de Blog :</label>
                    <input type="text" class="form-control" name="title"
                        placeholder="Titre de Blog" value="{{ $blog->title }}"/>
                        @error('title')
                            <div class="itext-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="photo">Photo Blog :</label>
                    <input type="file" class="form-control " name="photo"
                        value="{{ $blog->photo }}" accept="image/png,image/jpeg"/>
                        @error('photo')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="content">Content :</label>
                    <textarea type="text" class="form-control " name="content">{{ $blog->content }}</textarea>
                        @error('content')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="author">Auteur :</label>
                    <input type="text" class="form-control" name="author" value="{{ $blog->author }}"/>
                    @error('author')
                        <div class="itext-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="image_auth">Photo d'autheur :</label>
                    <input type="file" class="form-control " name="image_auth"
                        value="{{ $blog->image_auth }}" accept="image/png,image/jpeg"/>
                        @error('image_auth')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="category_id">Categorie Blog:</label>
                    <select class="form-control "  name="category_id" value="{{ $blog->category_id }}">
                        @foreach($categories as $id => $categoryName)
                        <option {{ $id === $blog->category->id ? 'selected' : null }} value="{{ $id }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>
                        @error('category_id')
                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Modfier</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
