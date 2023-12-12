@extends('dashboard.layout.master')

@section('title', 'Dashboard')


@section('content')

    <div>
        <h2 class="text-center">All Posts</h2>

        @if ($posts->count() > 0)
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

                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->text }}</td>
                            <td><img src="{{ $post->image }}" alt="" srcset=""></td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">edit</a>
                                @if ($post->is_active == 1)
                                    <a class="btn btn-primary"
                                        href="{{ route('post.toggleActive', $post->id) }}">InActive</a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('post.toggleActive', $post->id) }}">Active</a>
                                @endif
                                <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger"> Delete </a>
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
