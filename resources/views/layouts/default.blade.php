<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'uni1046')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('layouts._header')
<div class="container">

    @include('shared._messages')
    @yield('content')
    @include('layouts._footer')

</div>
</body>
</html>
