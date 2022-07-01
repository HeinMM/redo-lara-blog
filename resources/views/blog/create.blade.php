@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h4>Create New Category</h4>
            <hr>
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="form-label" for="title">Post Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" id="title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="form-label" for="category">Select Category</label>
                    <select type="text" class="form-select @error('category') is-invalid @enderror" name="category"
                        id="category">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category') ? "selected" : "" }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="form-label" for="description">Post Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" id="description" rows="8"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <label for="form-label" for="featured_image">Featured Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image"
                            id="featured_image">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-dark">Create Post</button>
                </div>

            </form>
        </div>
    </div>
@endsection
