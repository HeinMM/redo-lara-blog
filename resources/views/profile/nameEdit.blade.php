@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">MyProfile</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-body">
            <h4>Edit MyProfile Name</h4>
            <hr>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="form-label" for="name">Profile Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $user->name) }}" id="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-end">
                    <button class="btn btn-lg btn-dark w-25">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
