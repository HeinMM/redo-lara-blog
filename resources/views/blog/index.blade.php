@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Post</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h4>Post Lists</h4>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    @if (request('keyword'))
                        <span class="mb-0">Search By : {{ request('keyword') }}</span>
                        <a href="{{ route('blog.index') }}"><i class="bi bi-trash text-dark"></i></a>
                    @endif
                </div>

                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" required>
                        <button class="btn btn-outline-primary"> <i class="bi bi-search"></i> Search</button>
                    </div>
                </form>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="w-25">Title</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>
                                {{ $blog->title }}
                                {{-- <br>
                                <span class="badge bg-secondary">{{ $blog->slag }}</span> --}}
                            </td>
                            <td>
                                {{ App\Models\Category::find($blog->category_id)->title }}
                            </td>
                            <td>
                                {{ App\Models\User::find($blog->user_id)->name }}
                            </td>
                            <td>
                                <a href="{{ route('blog.show',$blog->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{route('blog.destroy',$blog->id)}}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                </form>
                            </td>
                            <td>
                                <p class="small mb-0 text-black-50 ">
                                    <i class="bi bi-calendar"></i>
                                    {{ $blog->created_at->format("d M Y") }}
                                </p>
                                <p class="small mb-0 text-black-50 ">
                                    <i class="bi bi-clock"></i>
                                    {{ $blog->created_at->format("h : m A") }}
                                </p>
                            </td>
                        </tr>
                    @empty
                            <tr>
                                <td colspan="6" class="text-center">There is no post</td>

                            </tr>
                    @endforelse
                </tbody>

            </table>

                <div class="">
                    {{ $blogs->onEachSide(1)->links() }}
                </div>

        </div>
    </div>
@endsection
