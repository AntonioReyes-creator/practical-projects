<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Token CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Archivo CSS propio --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navigation')

    {{-- Header opcional --}}
    @isset($header)
        <header class="bg-light shadow-sm py-3 mb-4">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Contenido principal --}}
    <main class="container py-4">

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset

    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>