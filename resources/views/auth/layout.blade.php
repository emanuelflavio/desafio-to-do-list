<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="bg-blue-600 min-h-screen flex flex-col md:flex-row items-center justify-center gap-10 md:gap-40 p-6">

        
            @yield('content')


    </div>
</body>

</html>