@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="{{route('blogs.create')}}" class="fs-1 mb-2 btn btn-primary text-white">Ajouter un nouveau Blog</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Auteur</th>
                            <th>Image Auteur</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ( $blogs as $blog )
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td><img src="images/blogs/{{ $blog->photo }}" style="width: 80px; height: 80px" target="_blank" alt=""></td>
                                <td>{{ $blog->content }}</td>
                                <td> {{ $blog->author }} </td>
                                <td><img src="images/blogs/author/{{ $blog->image_auth }}" style="width: 80px; height: 80px"  target="_blank" alt=""></td>
                                <td> {{  $blog->category->name}} </td>
                                <td>
                                    <a href="{{ route('blogs.edit', $blog)}}" class="btn btn-success mb-1">Modifier</a>
                                    <a href="{{route('blogs.destroy', $blog)}}"
                                    onclick="return confirm('Confirmer la suppression!')" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Data to show!!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content page -->
@endsection
