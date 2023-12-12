@extends('user.layout.master')

@section('title', 'Filter Page')


@section('content')

    <div class="container mt-3">
        <div class="">
            <h3>Filter Posts</h3>
        </div>
        <div class="row">

            @forelse ($filterUserPost as $user)
                @forelse ($user->posts as $post)
                    <div class="col-lg-12 m-3">
                        <span>user : {{ $user->name }}</span>
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $post->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">title : {{ $post->title }}</h5>
                                <p class="card-text">description : {{ $post->text }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- No posts for this user -->
                @endforelse
            @empty
                <div class="col-md-12">
                    <p>No users found.</p>
                </div>
            @endforelse

        </div>
    </div>



@endsection
