<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-title>
        @if ($title->isEmpty())
            not found
        @else
            {{ $title }}
        @endif
    </x-title>
    @vite(['resources/sass/app.scss','resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    {{ $slot }}
</body>
</html>