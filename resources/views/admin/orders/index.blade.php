@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Commandes</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User_id</th>
                            <th>Item commande</th>
                            <th>Order date</th>
                            <th>Price</th>
                            <th>Paimant status</th>
                            <th>User email</th>
                            <th>User Phone</th>
                            <th>User City</th>
                            <th>User Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $commande)

                            <tr>
                                <td> {{ $commande->user_id }} </td>
                                <td>
                                        @foreach ($commande->commande_items()->get() as $item)
                                            <li class="list-unstyled"> <span> Id : </span> <span class="fw-bold fs-1 text-danger">{{$item->id }} </span> </li>
                                            <li class="list-unstyled"><span>Nom : </span> <span  class="fw-bold fs-1 text-danger"> {{ $item->name  }}</span>  </li>
                                        @endforeach
                                </td>
                                <td> {{ $commande->status }} </td>
                                <td> {{ $commande->grand_total }} dh</td>
                                <td> {{ $commande->payment_status}} </td>
                                <td> {{ $commande->user_email }} </td>
                                <td> {{ $commande->user_phone }} </td>
                                <td> {{ $commande->user_city }} </td>
                                <td> {{ $commande->user_adresse }} </td>
                                <td>
                                    <a href="{{ route('orders.edit', $commande) }}" class="btn btn-success mb-1">Modifier</a>
                                    <a href="{{route('orders.destroy', $commande)}}"
                                    onclick="return confirm('Confirmer la suppression!')" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
                <div>
                    {{
                        $orders->links()
                    }}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
