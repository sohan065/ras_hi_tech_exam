<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User</title>
    @include('user.partials.style')
</head>

<body>
    <!-- navbar -->
    @include('user.partials.navbar')
    <!-- end of navbar -->

    @yield('content')


    @include('user.partials.scripts')

    @yield('script')
</body>

</html>
