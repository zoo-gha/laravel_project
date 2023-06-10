@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>
    @endif
    <!-- Page Heading -->
    <a href='{{route('blogCategories.create')}}' class="fs-1 mb-2 btn btn-primary text-white">Ajouter nouvel catégorie</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catégories Blog</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ( $blogcategories as $blogCategory )
                            <tr>
                                <td>{{ $blogCategory->name }}</td>
                                <td>
                                    <a href="{{ route('blogCategories.edit', $blogCategory) }}" class="btn btn-success mb-1">Modifier</a>
                                    <a href="{{route('blogCategories.destroy', $blogCategory)}}"
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
                    {{$blogcategories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content page -->
@endsection
