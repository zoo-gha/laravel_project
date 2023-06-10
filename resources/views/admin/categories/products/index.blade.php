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
    <a href='{{route('categories.create')}}' class="fs-1 mb-2 btn btn-primary text-white">Ajouter nouvel catégorie</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catégories Produit</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ( $categories as $category )
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><img src="images/{{ $category->image  }}" style="width: 80px; height: 80px" target="_blank" alt=""></td>
                                <td>
                                    <a href="{{ route('categories.edit', $category)}}" class="btn btn-success mb-1">Modifier</a>
                                    <a href="{{route('categories.destroy', $category)}}"
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
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
