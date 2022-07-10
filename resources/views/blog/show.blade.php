@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h4>{{ $blog->title }}</h4>
            <hr>
            <div class="mb-3">
                <span class="badge bg-secondary"> <i class="bi bi-grid"></i>
                    {{ App\Models\Category::find($blog->category_id)->title }}</span>

                <span class="badge bg-secondary"> <i class="bi bi-person"></i>
                    {{ App\Models\User::find($blog->user_id)->name }}</span>

                <span class="badge bg-secondary ">
                    <i class="bi bi-calendar"></i>
                    {{ $blog->created_at->format('d M Y') }}
                </span>
                <span class="badge bg-secondary  ">
                    <i class="bi bi-clock"></i>
                    {{ $blog->created_at->format('h : m A') }}
                </span>
            </div>
            @isset($blog->featured_image)
                 <div class="text-center mb-3">
                    <img src="{{ asset('storage/'.$blog->featured_image) }}" class="w-25 mt-3" alt="">
                 </div>
            @endisset
            <p>
                {{ $blog->description }}
            </p>
            @foreach ($blog->photos as $photo)
                <img src="{{ asset('storage/'.$photo->name) }}" height="100" class="rounded" alt="">
            @endforeach
            <hr>
            <div class="d-flex justify-content-end">
                <div class="mx-3">
                    <a href="{{ route('blog.create') }}" class="btn btn-dark">Create New Post</a>
                </div>
                 <div class="">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-dark">All Post</a>
                 </div>
            </div>
        </div>
    </div>
@endsection
