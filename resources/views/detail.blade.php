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
                        <a href="#">
                            <span class="badge bg-secondary">
                                {{ $post->category->title }}
                            </span>
                        </a>
                    </div>

                    <div class="text-center">

                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($post->photos as $key => $photo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <a class="venobox" data-gall="myGallery"
                                            href="{{ asset('storage/' . $photo->name) }}">
                                            <img src="{{ asset('storage/' . $photo->name) }}"
                                                class="detail-photo rounded"alt="">
                                        </a>

                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                    </div>

                    <p class="my-3">{{ $post->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">

                            <p class="mb-0">{{ $post->user->name }}</p>
                            <p class="mb-0">{{ $post->created_at->diffforHumans() }}</p>

                        </div>
                        <div class="">
                            @can('update', $post)
                                <a href="{{ route('blog.edit', $post->id) }}" class="btn  btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            <a class="btn btn-primary" href="{{ route('page.index') }}">All Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3>Comment</h3>

                    @auth()
                        <form action="{{ route('comment.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="mb-3 ">
                            <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                            <div class="text-end">
                                <button class="mt-3 btn btn-primary ">Upload</button>
                            </div>
                        </div>
                    </form>
                    @endauth
                    @guest()
                            <div class="mb-3 text-center">
                                <button class="mt-3 btn btn-primary ">Login</button>
                            </div>
                    @endguest


                    @forelse ($post->comments as $comment)
                        <div class="border p-3">
                            <h5>{{ $comment->name }}</h5>
                            <p>{{ $comment->text }}</p>
                        </div>
                    @empty
                    <div>
                        <p class="">There is no comment</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    @endsection
