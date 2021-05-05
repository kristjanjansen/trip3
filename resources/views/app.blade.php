<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="{{ $meta['key'] }}" content="{{ $meta['value'] }}">
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
    <title>Trip.ee</title>
</head>

<body class="min-h-screen font-sans antialiased text-gray-700">
    @inertia
</body>

</html>