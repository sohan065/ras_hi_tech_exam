@extends('dashboard.layout.master')
@section('title', 'Dashboard')

@section('content')
    <div>
        <h2 class="text-center">Filter Posts</h2>

        @if ($filteredPosts->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($filteredPosts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->text }}</td>
                            <td><img src="{{ $post->image }}" alt="" srcset=""></td>
                            <td>
                                @if ($post->is_active == 1)
                                    <a class="btn btn-primary"
                                        href="{{ route('post.toggleActive', $post->id) }}">InActive</a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('post.toggleActive', $post->id) }}">Active</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <p>You have no posts.</p>
        @endif
    </div>

@endsection
