@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item " aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </nav>

    <div class="card rounded">
        <div class="card-body">
            <div class="gallery">
                @forelse (Auth::user()->photos as $photo)
                    <img src="{{ asset('storage/' . $photo->name) }}"  class="w-100 mb-3 rounded" alt="">
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
