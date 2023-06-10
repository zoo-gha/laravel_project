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
    <a href="{{route('products.create')}}" class="fs-1 mb-2 btn btn-primary text-white">Ajouter un nouveau produit</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Produit</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td> {{ $product->nom }} </td>
                                <td><img src="images/{{ $product->image }}" style="width: 80px; height: 80px" alt=""></td>
                                <td> {{ $product->details }} </td>
                                <td> {{ $product->description }} </td>
                                <td> {{ $product->price }} Dh</td>
                                <td> {{ $product->weight }} kg</td>
                                <td> {{ $product->category->name }} </td>
                                <td>
                                    <a href="{{ route('products.edit', $product)}}" class="btn btn-success mb-1">Modifier</a>
                                    <a href="{{route('products.destroy', $product)}}"
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
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
