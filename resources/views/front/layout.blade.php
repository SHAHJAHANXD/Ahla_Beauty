<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('front.layouts.heads')
    @yield('extra-heads')
</head>

<body>

    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
    @include('front.layouts.scripts')
    @yield('extra-scripts')

</body>

</html>
