<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog')</title>
    {{-- The asset function will automatically look into the public folder, for this path. --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

    <ul class="nav">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
    </ul>

    <div class="main">
        @yield('content')
    </div>
    
</body>
</html>