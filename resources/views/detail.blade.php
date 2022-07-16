@extends('master')
@section('content')
    <div class="container">
        <div class="col-12 col-lg-8">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ $post->title }}</h3>
                    </div>

                    <div class="text-center mb-3">
                        <a href="#" >
                        <span class="badge bg-secondary">
                            {{ $post->category->title }}
                        </span>
                    </a>
                    </div>

                    <div class="text-center">
                        @foreach ($post->photos as $photo)
                            <img src="{{ asset('storage/' . $photo->name) }}" height="150" class="rounded" alt="">
                        @endforeach
                    </div>

                    <p class="my-3">{{ $post->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">

                            <p class="mb-0">{{ $post->user->name }}</p>
                            <p class="mb-0">{{ $post->created_at->diffforHumans() }}</p>

                        </div>
                        <a class="btn btn-primary" href="{{ route('page.index') }}">All Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
