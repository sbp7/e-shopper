<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.styles')
    <meta name="description" content="{{ $description }}">
    <title> {{ $title }}</title>
    @include('layouts.scripts1')
    @include('layouts.images')
</head><!--/head-->

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts2')
</body>
</html>