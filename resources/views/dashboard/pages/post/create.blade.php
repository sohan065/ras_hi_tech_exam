@extends('dashboard.layout.master')

@section('title', 'Post')

@section('content')

    <div class="container-lg">
        <div class="section-title text-center text-white">
            <h6>Create Post</h6>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">User Id</label>
                        <input type="text" class="form-control" name="user" value="{{ auth()->user()->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Text</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
