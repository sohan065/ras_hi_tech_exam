<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Dashboard</title>
    @include('dashboard.partials.style')

</head>

<body>


    <!-- side bar -->
    @include('dashboard.partials.sidebar')
    <!-- end of side bar  -->

    <!-- header -->
    <div class="main-content">

        @include('dashboard.partials.navbar')

        <!-- card section -->
        @yield('content')
        <!-- end of  card section -->
    </div>
    <!-- end of header -->


    @include('dashboard.partials.scripts')
    @yield('script')
</body>

</html>
