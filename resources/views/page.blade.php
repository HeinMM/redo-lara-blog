@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 ">
                <h1 class="text-center">Blog Posts</h1>
                <div class=" d-flex justify-content-center">
                    <form action="" class="my-3" name="keyword">
                        <div class="input-group ">
                            <input type="text" name="keyword" class="form-control" value="{{ request('keyword') }}">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                @isset($category)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p>Filter By : {{ $category->title }}</p>
                        <a href="{{ route('page.index') }}" class="btn btn-outline-primary">See All</a>
                    </div>
                @endisset
                @forelse ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            @isset($post->featured_image)
                                <div class="text-center">
                                    <img src="{{ asset('storage/'.$post->featured_image) }}" class="feature-photo" alt="">
                                </div>
                            @endisset
                            <h3>{{ $post->title }}</h3>
                            <a href="{{ route('page.category', $post->category->slag) }}">
                                <span class="badge bg-secondary">
                                    {{ $post->category->title }}
                                </span>
                            </a>
                            <p>{{ $post->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">

                                    <p class="mb-0">{{ $post->user->name }}</p>
                                    <p class="mb-0">{{ $post->created_at->diffforHumans() }}</p>

                                </div>
                                <a class="btn btn-primary" href="{{ route('page.detail',$post->slag) }}">See More</a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h3>There is no post</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="col-12 col-lg-8">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

    
    </div>
@endsection
