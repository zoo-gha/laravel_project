@extends('admin.adminhome')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Message</h6>
            <button type="button" onclick="location.href='{{ route('messages.index') }}' " class="btn btn-secondary float-right">retour</button>

        </div>
        <div class="card-body">
            <form  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="" for="name">Nom :</label>
                    <input type="text" disabled class="form-control" name="name" value="{{ $message->name }}"/>
                        @error('nom')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="email">Email :</label>
                    <input type="email" disabled class="form-control " name="email" value="{{ $message->email }}">
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="" for="content">Message :</label>
                    <textarea type="text" disabled class="form-control " name="content"> {{ $message->content }} </textarea>
                        @error('message')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end content page -->
@endsection
