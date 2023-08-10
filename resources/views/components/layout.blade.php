<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TPV</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <nav class="h-11 flex justify-center items-center">
        <p class="text-xl bg-blue-200 py-1 px-2 rounded-xl">navbar</p>
    </nav>
    {{ $slot }}
    @livewireScripts
</body>
</html>