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
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($messages as $message)
                            <tr>
                                <td> {{ $message->name }} </td>
                                <td> {{ $message->email }} </td>
                                <td> {{ $message->content }} </td>
                                <td>
                                    <a href="{{ route('message.show', $message) }}" class="btn btn-success mb-1">Voir</a>
                                    <a href="{{ route('messages.destroy', $message) }}"
                                    onclick="return confirm('Confirmer la suppression!')" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No DATA to Show!!</td></tr>
                        @endforelse

                    </tbody>
                </table>
                <div>
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content page -->
@endsection
