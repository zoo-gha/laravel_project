@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User</h6>
            <button type="button" onclick="location.href='{{ route('users.index') }}' "  class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="" for="nom">Nom :</label>
                    <input type="text" disabled class="form-control" name="nom"
                        placeholder="Nom de produit" value="{{ $user->name }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="email">Email :</label>
                    <input type="email" disabled class="form-control " name="email" placeholder="email" value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="password">Password :</label>
                    <input type="password" disabled class="form-control" name="password"
                        placeholder="password" value="{{ $user->password }}"/>
                        @error('password')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="usertype">User Type :</label>
                    <input type="text" class="form-control" name="usertype"
                        placeholder="usertype" value="{{ $user->usertype }}"/>
                        @error('usertype')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">As Admin</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
