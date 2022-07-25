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

                    <form action="" method="POST">
                        <div class="mb-3 ">
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                            <div class="text-end">
                                <button class="mt-3 btn btn-primary ">Upload</button>
                            </div>
                        </div>
                    </form>

                    <div class="border p-3">
                        <h5>User Name</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloribus suscipit
                                corporis nisi. Vel molestiae sunt facere repellat cumque commodi libero,
                                porro, optio quasi exercitationem necessitatibus asperiores alias, unde eveniet?</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
