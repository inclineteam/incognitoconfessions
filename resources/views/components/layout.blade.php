@props(['title' => 'Incognito'])

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <script defer src="https://unpkg.com/@alpinejs/persist@3.10.3/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="shortcut icon" href="{{ asset('images/ai-glass.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/akar-icons-fonts/src/css/akar-icons.css">
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    @include('cookie-consent::index')
    <x-flash-message />

    {{ $slot }}

    <x-footer />

    @yield('script')
</body>

</html>
