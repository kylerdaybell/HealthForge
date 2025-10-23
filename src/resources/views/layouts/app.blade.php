<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'HealthForge')</title>

    @include('layouts._includes')
   

</head>
<body>

    @include('layouts._nav')

    <!-- Page Content -->
    <main class="w3-content w3-padding-16">
        @yield('content')
    </main>

</body>
</html>
