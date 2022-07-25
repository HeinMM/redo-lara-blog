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
            <h4>Edit MyProfile Email</h4>
            <hr>
            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
               <div class="mb-3">
                    <label for="form-label" for="profile_image">Profile Image</label>
                    <input type="file"
                        class="form-control @error('profile_image') is-invalid @enderror"
                        name="profile_image" id="profile_image" >
                    @error('profile_image')
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
