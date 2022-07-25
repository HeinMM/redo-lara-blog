@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">MyProfile</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-body">
            <h4>MyProfile</h4>
            <hr>
            <div class="row">
                <div class="d-flex justify-content-around">

                   <div class="">
                     <img src="{{ asset("storage/".Auth::user()->profile->name) }}" height="150" class="rounded p-3"
                        alt="">
                        <a class="px-3" href="{{ route('profile.edit', Auth::user()->id) }}">Edit Profile Image</a>
                   </div>

                   <div class="p-3">
                     <div class="d-block">
                        <div class="mb-3">
                            <h3 class="">{{ Auth::user()->name }}</h3>
                            <a class="px-3" href="{{ route('user.edit', Auth::user()->id) }}">Edit Profile Name</a>
                        </div>

                        {{-- <div class="">
                            <h3 class="">{{ Auth::user()->email }}</h3>
                            <a class="px-3" href="{{ route('user.emailEdit'),Auth::user()->id }}">Edit Profile Email</a>
                        </div> --}}

                    </div>
                   </div>

                </div>


            </div>
        </div>
    </div>
@endsection
