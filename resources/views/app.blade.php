<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="/fonts/Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/RegularItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Bold.woff2" as="font" type="font/woff2" crossorigin>
    <title>Trip.ee - {{ $title ?? '' }}</title>
</head>

<body class="min-h-screen font-sans antialiased text-gray-700">
    @inertia
    @routes
   
    @production
    @php
    $manifest = json_decode(file_get_contents(public_path('dist/manifest.json')), true);
    @endphp
    <script type="module" src="/dist/{{ $manifest['resources/js/app.js']['file'] }}"></script>
    <link rel="stylesheet" href="/dist/{{ $manifest['resources/js/app.js']['css'][0] }}">
    @else
    <script type="module" src="http://localhost:3000/@@vite/client"></script>
    <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
    @endproduction
</body>

</html>

