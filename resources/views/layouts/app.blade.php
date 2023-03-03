<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="mjWTjEo1tjw5IN-NrsRVz5HYJDtjzT1fT1QcnPP-U6U" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->

    @stack('styles')
</head>
<body>
    <div class="container">
         @yield('content')
    </div>



    @stack('scripts')
</body>
</html>
