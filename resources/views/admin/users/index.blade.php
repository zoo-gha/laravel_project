@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)
                            <tr>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->password }} </td>
                                <td> {{ $user->usertype }} </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success mb-1">As Admin</a>
                                    <a href="{{route('users.destroy', $user)}}"
                                    onclick="return confirm('Confirmer la suppression!')" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No DATA to Show!!</td></tr>
                        @endforelse

                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content page -->
@endsection
