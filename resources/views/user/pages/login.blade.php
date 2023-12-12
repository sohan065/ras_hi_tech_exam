@extends('user.layout.master')

@section('title', 'LogIn Form')




@section('content')



    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <section id="post-form">
        <div class="container-lg">
            <div class="section-title text-center mt-5">
                <h6>LogIn Form</h6>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" placeholder="enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password </label>
                            <input type="password" class="form-control" name="password" placeholder="type password">
                        </div>
                        <div class="mb-3 d-flex justify-content-between mb-3">
                            <button type="submit" class="btn btn-primary">Log In</button>
                            <a class="btn btn-secondary" href="{{ route('user.create') }}">Dont Have Account</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>


@endsection
