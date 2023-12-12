@extends('dashboard.layout.master')

@section('title', 'Post')

@section('content')

    <div class="container-lg">
        <div class="section-title text-center text-white">
            <h6>LogIn Form</h6>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">User Id</label>
                        <input type="text" class="form-control" name="user" value="{{ $post->user }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Text</label>
                        <input type="text" class="form-control" name="text" value="{{ $post->text }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        <img src="{{ $post->image }}" alt="" srcset="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
