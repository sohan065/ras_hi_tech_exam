<div class="header">
    <div class="section-title">
        <div class="navbar-left">
            <ul class="d-flex align-items-center">
                <li><a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a></li>
                <div style="background-color: gray;">
                    <form action="{{ route('filter') }}" method="post">
                        @csrf
                        <label for="datepicker-start">Date:</label>
                        <input type="text" id="datepicker-start" name="start_date" required>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>

            </ul>
        </div>
    </div>
    <div class="user-info ">

        <div class="user-img text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" />
            @auth
                <p> {{ auth()->user()->name }}</p>
            @endauth

        </div>
    </div>
</div>
@section('script')
    <script>
        $(function() {
            $("#datepicker-start").datepicker();
            $("#datepicker-end").datepicker();
        });
    </script>
@endsection
