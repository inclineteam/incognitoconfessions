@props(['title' => 'Incognito'])

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
   <link rel="shortcut icon" href="{{ asset('images/ai-glass.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/akar-icons-fonts/src/css/akar-icons.css">
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    {{ $slot }}
</body>

</html>
