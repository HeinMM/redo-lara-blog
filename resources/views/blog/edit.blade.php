@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test</li>
        </ol>
    </nav>

    <div class="card ">
        <div class="card-body">
            <h4>Edit Post</h4>
            <hr>
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" id="postUpdateForm" enctype="multipart/form-data">
                @csrf
                @method('put')
            </form>
            <div class="mb-3">
                <label for="form-label" for="title">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title', $blog->title) }}" id="title" form="postUpdateForm">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="form-label" for="category">Select Category</label>
                <select type="text" class="form-select @error('category') is-invalid @enderror" name="category"
                    id="category" form="postUpdateForm">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category', $blog->category) ? 'selected' : '' }}>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="d-flex">

                    @foreach ($blog->photos as $photo)
                        <div class="d-md-inline-block position-relative">
                            <img src="{{ asset('storage/' . $photo->name) }}" height="100" class="rounded"
                                alt="">
                            <form action="{{ route('photo.destroy', $photo->id) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn-sm btn-danger position-absolute bottom-0 end-0">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach

                </div>
                <div class="mb-3">
                    <label for="form-label" for="photos">Post Image</label>
                    <input type="file"
                        class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"
                        name="photos[]" id="photos" form="postUpdateForm" multiple>
                    @error('photos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('photos.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="form-label" for="description">Post Description</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" rows="8" form="postUpdateForm">{{ old('description', $blog->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-center align-items-center">

                    @isset($blog->featured_image)
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" class="w-25 mt-3" alt="">
                    @endisset


                    <div class="mb-3">
                        <label for="form-label" for="featured_image">Featured Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                            name="featured_image" id="featured_image" form="postUpdateForm">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>




                <button class="btn btn-lg btn-dark w-25" form="postUpdateForm">Edit Post</button>
            </div>


        </div>
    </div>
@endsection
