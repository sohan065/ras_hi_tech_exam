<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('user.index') }}">Home</a>
                </li>
                @if (auth()->check())
                    {{-- User is authenticated --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                @else
                    {{-- User is not authenticated --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.create') }}">Sign Up</a>
                    </li>
                @endif
            </ul>
            <form action="{{ route('user.filter') }}" method="post">
                @csrf
                <label for="datepicker-start">Date:</label>
                <input type="text" id="datepicker-start" name="start_date" required>

                <label for="user_name">User Name:</label>
                <input type="text" id="user_name" name="user_name" required>

                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</nav>
@section('script')
    <script>
        $(function() {
            $("#datepicker-start").datepicker();
            // $("#datepicker-end").datepicker();
        });
    </script>
@endsection
